<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProfile extends CI_Controller
{
    // Menampilkan halaman profil admin
    public function index()
    {
        // Memuat view halaman profil tanpa mengirimkan data judul
        $this->load->view('templates/adminheader');
        $this->load->view('admin/profile'); // View untuk menampilkan profil admin
        $this->load->view('templates/adminfooter');
    }
}
