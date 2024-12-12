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
            // Menyiapkan data produk untuk dimasukkan
            $data_input = [
                'kode' => $this->input->post('kode'),
                'merek' => $this->input->post('merek'),
                'tipe' => $this->input->post('tipe'),
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi')
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
            // Memperbarui data produk di database
            $data_input = [
                'merek' => $this->input->post('merek'),
                'tipe' => $this->input->post('tipe'),
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi')
            ];

            $this->Produk_model->ubahDataProduk($id, $data_input);
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
