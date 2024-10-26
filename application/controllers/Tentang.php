<?php
/** 
 *  summary
 */
class Tentang extends CI_Controller
{
    
    public function  index()
    {
        
     $data['judul']= 'Halaman Tentang';
     $this->load->view('Templates/header',$data);
     $this->load->view('beranda/Tentang',$data);
     $this->load->view('Templates/footer');


    } 
}
 ?>   