<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Produk';
        $data['produk'] = $this->Produk_model->getAllProduk();
        $data['tipe'] = $this->Produk_model->getAllTipe();

        // Set rules form validation
        $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[produk.kode]');
        $this->form_validation->set_rules('merek', 'Merek', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('produk/index', $data);
            $this->load->view('templates/footer');
        } else {
            // Menangani upload gambar
            $upload_data = [];
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './uploads/produk/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 2048;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $upload_data = $this->upload->data();
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admincontroller');
                    return;
                }
            }

            // Menyiapkan data produk untuk dimasukkan
            $data_input = [
                'kode' => $this->input->post('kode'),
                'merek' => $this->input->post('merek'),
                'tipe' => $this->input->post('tipe'),
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => isset($upload_data['file_name']) ? $upload_data['file_name'] : null
            ];

            // Memasukkan data ke database
            $this->Produk_model->insertProduk($data_input);
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('admincontroller');
        }
    }

    public function ubah($id)
    {
        $data['produk'] = $this->Produk_model->getProdukById($id);
        $data['tipe'] = $this->Produk_model->getAllTipe();

        // Set rules form validation
        $this->form_validation->set_rules('merek', 'Merek', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('produk/index', $data);
            $this->load->view('templates/footer');
        } else {
            // Menangani upload gambar
            $this->Produk_model->ubahDataProduk($id);
            $this->session->set_flashdata('flash', 'diubah');
            redirect('admincontroller');
        }
    }

    public function hapus($id)
    {
        $this->Produk_model->hapusDataProduk($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('admincontroller');
    }
}