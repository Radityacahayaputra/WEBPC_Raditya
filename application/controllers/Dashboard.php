<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Memuat model Produk_model
        $this->load->model('Produk_model');
    }

    public function index() {
        // Mengambil total produk
        $data['total_produk'] = $this->Produk_model->countTotalProduk(); 

        // Mengambil data produk dan tipe jika diperlukan
        $data['produk'] = $this->Produk_model->getAllProduk(); // Mengambil semua produk
        $data['tipe'] = $this->Produk_model->getAllTipe(); // Mengambil semua tipe produk

        // Memuat view dengan data
        
        $this->load->view('admin/dashboard', $data); // Pastikan Anda memiliki file view 'dashboard.php'
       
    }
}
