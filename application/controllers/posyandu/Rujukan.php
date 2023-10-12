<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rujukan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

        $this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()){redirect(site_url('posyandu/PetugasPosiandu'));}
        else if($this->Petugas_model->cekStatus()!='posyandu') redirect(site_url('puskesmas'));
    }

    public function index(){
    	$this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/rujukan/index');
        $this->load->view('layout/foot.php');
    }

    public function show()
    {
        var_dump($this->input->post());die;
        redirect(site_url('posyandu/Daftar/create'));
        
    }

    public function aksi_upload(){
        $config['upload_path']          = './upload/rujukan/';
        $config['allowed_types']        = 'pdf';
        $config['overwrite']            = true;
        $config['max_size']             = 1024;
     

        $this->load->library('upload', $config);

        $data=$_FILES['berkas']['name'];
        if ( ! $this->upload->do_upload('berkas')){
            $error = array('error' => $this->upload->display_errors());
            redirect(site_url('posyandu/Rujukan'));
        }else{

            $data = array('upload_data' => $this->upload->data());
            $nama = array('upload_data' =>$this->upload->data("file_name"));
            //var_dump($nama);die;
            //$this->load->view('posiandu/rujukan/printFoto', $nama);

            
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan-petanikode.pdf";
            $this->pdf->load_view('posiandu/rujukan/laporan_pdf', $nama);
        }
    }
}
