<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rujukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()) redirect(site_url('puskesmas/login'));
        if($this->Petugas_model->cekStatus()!='puskesmas') redirect(site_url('posyandu'));
    }
    
    public function index()
    {
        $this->load->view('layout/head');
        $this->load->view("admin/puskesmas/surat_rujukan/show");
        $this->load->view('layout/foot');
    }
}