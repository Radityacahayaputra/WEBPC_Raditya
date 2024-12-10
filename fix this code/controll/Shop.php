<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProductModel');  // Memuat model produk
    }

    // Fungsi untuk menampilkan daftar produk di halaman shop
    public function index() {
        $data['products'] = $this->ProductModel->getAllProducts();
        $this->load->view('shop/shop_index');
        $this->load->view('shop/add_product', $data);

    }

    // Fungsi untuk menampilkan form tambah produk
    public function add() {
        $this->load->view('add_product');
    }

    // Fungsi untuk menyimpan produk baru ke database
    public function save() {
        $this->ProductModel->saveProduct();
        redirect('shop');  // Setelah disimpan, arahkan kembali ke halaman shop
    }

    // Fungsi untuk menghapus produk berdasarkan ID
    public function delete($id) {
        $this->ProductModel->deleteProduct($id);
        redirect('shop');  // Setelah dihapus, kembali ke halaman shop
    }

    // Fungsi untuk menampilkan form edit produk
    public function edit($id) {
        $data['product'] = $this->ProductModel->getProductById($id);
        $this->load->view('edit_product', $data);
    }

    // Fungsi untuk memperbarui data produk
    public function update($id) {
        $this->ProductModel->updateProduct($id);
        redirect('shop');  // Setelah diperbarui, kembali ke halaman shop
    }
}
