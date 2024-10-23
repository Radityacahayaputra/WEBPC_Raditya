<?php

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model'); // Memuat model Produk_model
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Produk';
        $data['produk'] = $this->Produk_model->getAllProduk(); // Mengambil semua produk
        $data['tipe'] = $this->Produk_model->getAllTipe();
        // Pencarian produk
        if ($this->input->post('keyword')) {
            $data['produk'] = $this->Produk_model->cariDataProduk();
        }

        // Aturan validasi
        $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[produk.kode]');
        $this->form_validation->set_rules('merek', 'Merek', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        // Cek apakah validasi gagal
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('produk/index', $data); // Ganti dengan view produk
            $this->load->view('templates/footer');
        } else {
            // Menyimpan data produk baru
            $data = [
                'kode' => $this->input->post('kode'),
                'merek' => $this->input->post('merek'),
                'tipe' => $this->input->post('tipe'),
                'harga' => $this->input->post('harga'),
            ];
            $this->Produk_model->insertProduk($data); // Memanggil model untuk menyimpan data produk
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('produk'); // Redirect ke halaman produk
        }
    }

    public function ubah($id)
    {
        $this->Produk_model->ubahDataProduk($id);
        $this->session->set_flashdata('flash', 'diubah');
        redirect('produk');
    }

    public function hapus($id)
    {
        $this->Produk_model->hapusDataProduk($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('produk');
    }
}
