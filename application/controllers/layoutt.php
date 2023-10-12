<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class layoutt extends CI_Controller{

    public function index()
    {
    $this->load->view('layouttt/header');
        
     $this->load->view('layoutt/temp'); 

     $this->load->view('layoutt/footer');
     
    }
}
?>