<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()) redirect(site_url('puskesmas/login'));
        if($this->Petugas_model->cekStatus()!='puskesmas') redirect(site_url('posyandu'));

        $this->load->model("ibuhamil_model");
        $this->load->model("pemeriksaan_model");
        $this->load->model("regisanak_model");
        $this->load->model("pencatatan_model");
        $this->load->library('form_validation');
        // load form and url helpers
        $this->load->helper(array('form', 'url'));
    }
    
    public function index()
    {
        $data['ibuhamils'] = $this->ibuhamil_model->getAll();

        $this->load->view('layout/head');
        $this->load->view("admin/puskesmas/laporan/pemeriksaanpasien", $data);
        $this->load->view('layout/foot');
    }

    public function detail($key = null)
    {
        if(!isset($key))redirect(site_url('puskesmas/laporan'));
        
        $data['ibuhamil'] = $this->ibuhamil_model->getById($key);
        $data['pemeriksaans'] = $this->pemeriksaan_model->getDataPemeriksaanPasien($key);

        $this->load->view('layout/head');
        $this->load->view("admin/puskesmas/laporan/detailpemeriksaan", $data);
        $this->load->view('layout/foot');
    }

    public function posyandu(){
        $data["pendaftaran"] = $this->pencatatan_model->getAllHistory2();
        $this->load->view('layout/head.php');
        $this->load->view('admin/puskesmas/laporan/posyandu',$data);
        $this->load->view('layout/foot.php');
    }

    public function posyandu_detail($id=null){
    
        if (!isset($id)) redirect('puskesmas/Laporan');
       
        $pencatatan = $this->pencatatan_model;
        $regisanak = $this->regisanak_model;
        
        $data2["pendaftaran"] = $regisanak->getById($id);
        $data["pencatatan"] = $pencatatan->getJoinAll($id);
    
        $this->load->view('layout/head.php');
        $this->load->view('admin/puskesmas/laporan/detail',$arrayName = array('pencatatan' => $pencatatan->getJoinAll($id),
            'pendaftaran' => $regisanak->getById($id)));
        $this->load->view('layout/foot.php');
    }
}