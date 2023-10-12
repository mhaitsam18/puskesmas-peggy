<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pasienrujukan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mrujukan');  

        $this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()){redirect(site_url('posyandu/PetugasPosiandu'));}
        else if($this->Petugas_model->cekStatus()!='posyandu') redirect(site_url('puskesmas'));
    }

    public function index(){//fungsi default
        $rujuk=$this->Mrujukan->selectData();
        $this->load->view('layout/posiandu/head.php');
        
        $this->load->view('rujuk/page_index',[
            'data'=>$rujuk//model ke view
        ]);

        $this->load->view('layout/foot.php');
        
    }
    public function addForm(){
        if($_POST){
            $this->form_validation->set_rules('id_rujukan','id_rujukan','required');
            $this->form_validation->set_rules('namapasien','nama pasien','required');
            $this->form_validation->set_rules('umur','umur pasien','required');
            $this->form_validation->set_rules('alamat','alamat pasien','required');
            $this->form_validation->set_rules('nopasien','Nomor pasien','required');
            $this->form_validation->set_rules('diagnosa','diagnosa pasien','required');
            $this->form_validation->set_rules('rumahsakit','Puskesmas','required');
            if ($this->form_validation->run() == TRUE){
                $this->Mrujukan->insertMk();
                $this->session->set_flashdata('success','Berhasil Disimpan');
                redirect('pasienrujukan/index');
            
        }
      
    }
        $this->load->view('layout/posiandu/head.php');
        $this->load->view('rujuk/page_addform');// menampilkan view
        $this->load->view('layout/foot.php');
        
    }

    public function delete($id_rujukan){
        $this->Mrujukan->deleteMk($id_rujukan);
        redirect('pasienrujukan/index');//menampilkan data terbaru
    }
    public function updateForm($id_rujukan){
        $rujuk=$this->Mrujukan->getMkByIdMk($id_rujukan);//menampilkan query 1 row
        $this->load->view('rujuk/page_updateForm',[
            'data'=>$rujuk
        ]);
    }
    public function updateMk(){
        $this->Mrujukan->updateMk();
        redirect('pasienrujukan/index');
    }
}







    
    