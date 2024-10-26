<?php
/** 
 *  summary
 */
class Beranda extends CI_Controller
{   
    
    
    public function  index()
    { 
    $this->load->model('Produk_model'); // Load model produk
    $data['produk'] = $this->Produk_model->getallproduk(); // Ambil semua data produk
    
     $data['judul']= 'Halaman Beranda';
     $this->load->view('Templates/header',$data);
     $this->load->view('Beranda/index',$data);
     $this->load->view('Templates/footer');


    } 
}
 ?>   