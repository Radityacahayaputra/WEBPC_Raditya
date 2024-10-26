<?php
/** 
 *  summary
 */
class Kontak extends CI_Controller
{
    
    public function  index()
    {
        
     $data['judul']= 'Halaman Kontak';
     $this->load->view('Templates/header',$data);
     $this->load->view('beranda/Kontak',$data);
     $this->load->view('Templates/footer');


    } 
}
 ?>   