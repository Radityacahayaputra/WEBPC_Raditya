<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        
    }

    // Menampilkan halaman dashboard
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['produk'] = $this->Produk_model->getAllProduk(); // Mengambil semua produk
        $data['total_produk'] = $this->Produk_model->getTotalProduk();
        $data['tipe'] = $this->Produk_model->getAllTipe(); // Mengambil semua tipe produk
        

        // Memuat view dashboard
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/index', $data); // Pastikan Anda memiliki view untuk dashboard
        $this->load->view('templates/adminfooter');
    }

    // Menampilkan modal untuk mengubah atau mengedit produk
    public function ubah($id)
{
    // Ambil data produk berdasarkan ID
    $data['produk'] = $this->Produk_model->getProdukById($id);
    if (!$data['produk']) {
        redirect('admincontroller');  // Kembali ke dashboard jika produk tidak ditemukan
    }

    // Set rules untuk validasi form
    $this->form_validation->set_rules('merek', 'Merek', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

    if ($this->form_validation->run() == false) {
        // Jika validasi gagal, tampilkan modal edit produk
        $this->load->view('admin/templates/adminheader', $data);
        $this->load->view('admin/index', $data);  // Tampilkan halaman produk di dashboard
        $this->load->view('admin/templates/adminfooter');
    } else {
        // Jika validasi berhasil, update data produk
        $data_input = [
            'merek' => $this->input->post('merek'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi')
        ];

        $this->Produk_model->ubahDataProduk($id, $data_input); // Update produk

        // Flash message untuk memberi tahu bahwa produk berhasil diubah
        $this->session->set_flashdata('flash', 'diubah');
        redirect('admincontroller');  // Redirect ke dashboard admin setelah update
    }
}

    // Menghapus produk
    public function hapus($id)
    {
        $this->Produk_model->hapusDataProduk($id); // Hapus data produk berdasarkan ID
        $this->session->set_flashdata('flash', 'dihapus'); // Set pesan flash
        redirect('admincontroller'); // Redirect ke halaman admin setelah berhasil
    }
}
