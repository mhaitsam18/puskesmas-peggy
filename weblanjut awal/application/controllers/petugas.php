<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class petugas extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpetugas');  
    }

    public function index(){//fungsi default
        $tugas=$this->Mpetugas->selectData();
        $this->load->view('layout/header');
        
        $this->load->view('tugas/page_index',[
            'data'=>$tugas//model ke view
        ]);

        $this->load->view('layout/footer');
        
    }
    public function addForm(){
        if($_POST){
            $this->form_validation->set_rules('id_petugas','ID Petugas','required');
            $this->form_validation->set_rules('username','Email','required');
            $this->form_validation->set_rules('nama','Nama Lengkap','required');
            $this->form_validation->set_rules('password','password','required');
            if ($this->form_validation->run() == TRUE){
                $this->Mpetugas->insertMk();
                $this->session->set_flashdata('success','Berhasil Disimpan');
                redirect('petugas/index');
            
        }
      
    }
        $this->load->view('layout/header');
        $this->load->view('tugas/page_addform');// menampilkan view
        $this->load->view('layout/footer');
        
    }
    public function delete($id_petugas){
        $petugas=$this->Mpetugas->deleteMK($id_petugas);
       
        
        redirect('petugas/index');//untuk kembalikan proses kontroler
        
        
    }

   
   
    public function updateForm($id_petugas){
        $tugas=$this->Mpetugas->getMkByIdMk($id_petugas);//menampilkan query 1 row
        $this->load->view('tugas/page_updateForm',[
            'data'=>$tugas
        ]);
    }
    public function updateMk(){
        $this->Mpetugas->updateMk();
        redirect('petugas/index');
    }
}







    
    