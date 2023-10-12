<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("regisanak_model");
        $this->load->model("pencatatan_model");
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()) redirect(site_url('posyandu/PetugasPosiandu'));

    }

    public function index(){
        $data["pendaftaran"] = $this->pencatatan_model->getAllLaporan();
    	$this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/laporan/index',$data);
        $this->load->view('layout/foot.php');
    }

    public function history(){
        $data["pendaftaran"] = $this->pencatatan_model->getAllHistory();
        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/laporan/history',$data);
        $this->load->view('layout/foot.php');
    }

    public function detail($id = null)
    {

        if (!isset($id)) redirect('posiandu/Laporan');
       
        $pencatatan = $this->pencatatan_model;
        $regisanak = $this->regisanak_model;
        
        $data2["pendaftaran"] = $regisanak->getById($id);
        $data["pencatatan"] = $pencatatan->getJoinAll($id);
        
            $this->load->view('layout/posiandu/head.php');
            $this->load->view('posiandu/laporan/detail',$arrayName = array('pencatatan' => $pencatatan->getJoinAll($id),
            'pendaftaran' => $regisanak->getById($id)));
            $this->load->view('layout/foot.php'); 
    }

    public function kirim()
    {
        $pencatatan = $this->pencatatan_model;
        $data = $pencatatan->getAllLaporan();

        if ($data!=null) {
            $this->pencatatan_model->upStatus($data);
            $this->session->set_flashdata('success', 'Data berhasil dikirim');
        }else{
            $this->session->set_flashdata('error', 'Data tidak ada  untuk dikirim');
        }
        redirect(site_url('posyandu/Laporan'));
    }
}


?>



    
