<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Posyandu extends CI_Controller
{

    public function index()
    {
        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/dashboard');
        $this->load->view('layout/foot.php');

        $this->load->model("Petugas_model");
        if ($this->Petugas_model->isNotLogin()) {redirect(site_url('posyandu/PetugasPosiandu'));} else if ($this->Petugas_model->cekStatus() != 'posyandu') {
            redirect(site_url('puskesmas'));
        }

    }
    public function dashboard()
    {
        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/dashboard');
        $this->load->view('layout/foot.php');
    }
}