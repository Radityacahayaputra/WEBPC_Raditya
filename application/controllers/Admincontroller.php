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
        $data['tipe'] = $this->Produk_model->getAllTipe(); // Mengambil semua tipe produk

        // Memuat view dashboard
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/index', $data); // Pastikan Anda memiliki view untuk dashboard
        $this->load->view('templates/adminfooter');
    }

    // Menampilkan form untuk menambah atau mengubah produk
    public function form($id = null)
    {
        $data['judul'] = $id ? 'Edit Produk' : 'Tambah Produk';
        $data['tipe'] = $this->Produk_model->getAllTipe(); // Mengambil semua tipe produk

        // Jika ID ada, ambil data produk untuk diedit
        if ($id) {
            $data['produk'] = $this->Produk_model->getProdukById($id);
            if (!$data['produk']) {
                show_404(); // Menampilkan halaman 404 jika produk tidak ditemukan
            }
        }

        // Set rules form validation
        $this->setValidationRules($id);

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, kembali ke view form produk
            $this->load->view('admin/templates/adminheader', $data);
            $this->load->view('admin/form', $data); // Pastikan Anda memiliki view untuk form produk
            $this->load->view('admin/templates/adminfooter');
        } else {
            // Menangani upload gambar
            $upload_data = $this->handleImageUpload();

            // Menyiapkan data produk untuk dimasukkan atau diupdate
            $data_input = [
                'kode' => $this->input->post('kode'),
                'merek' => $this->input->post('merek'),
                'tipe' => $this->input->post('tipe'),
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => isset($upload_data['file_name']) ? $upload_data['file_name'] : null
            ];

            // Memasukkan atau memperbarui data produk di database
            if ($id) {
                $this->Produk_model->ubahDataProduk($id, $data_input);
                $this->session->set_flashdata('flash', 'diubah');
            } else {
                $this->Produk_model->insertProduk($data_input);
                $this->session->set_flashdata('flash', 'ditambahkan');
            }

            redirect('admin/index'); // Redirect ke dashboard setelah berhasil menambah atau mengubah produk
        }
    }

    // Menghapus produk
    public function hapus($id)
    {
        $this->Produk_model->hapusDataProduk($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('admin/dashboard'); // Redirect ke dashboard setelah berhasil menghapus produk
    }

    // Method untuk mengatur aturan validasi
    private function setValidationRules($id = null)
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required' . ($id ? '' : '|is_unique[produk.kode]'));
        $this->form_validation->set_rules('merek', 'Merek', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    }

    // Method untuk menangani upload gambar
    private function handleImageUpload()
    {
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
                redirect('admin/form'); // Redirect ke form jika upload gagal
                return;
            }
        }
        return $upload_data;
    }
}