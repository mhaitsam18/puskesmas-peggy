<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()) redirect(site_url('puskesmas/login'));
        if($this->Petugas_model->cekStatus()!='puskesmas') redirect(site_url('posyandu'));


        $this->load->model("ibuhamil_model");
        $this->load->model("pemeriksaan_model");
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $this->load->view('layout/head');
		
        $data["ibuhamils"] = $this->ibuhamil_model->getAll();
        
		$this->load->view('admin/puskesmas/ibuhamil/data', $data);

		$this->load->view('layout/foot');
    }

    public function add_form()
    {
        $this->load->view('layout/head');
        
		$this->load->view('admin/puskesmas/ibuhamil/formtambah');

		$this->load->view('layout/foot');
    }

    public function add()
    {
        $ibuhamil = $this->ibuhamil_model;
        $validation = $this->form_validation;
        $validation->set_rules($ibuhamil->rules());

        $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        
        if ($validation->run()) {
            $ibuhamil->save();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan');
            $this->session->set_flashdata('error');    
        }
        
        redirect(site_url('puskesmas/ibuhamil'));
    }

    public function edit_form($id)
    {
        $this->load->view('layout/head');
        
        $data["ibuhamil"] = $this->ibuhamil_model->getById($id);
        
        $this->load->view("admin/puskesmas/ibuhamil/formEdit", $data);
        
		$this->load->view('layout/foot');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('puskesmas/ibuhamil');
       
        $ibuhamil = $this->ibuhamil_model;
        $validation = $this->form_validation;
        $validation->set_rules($ibuhamil->rules());

        $this->session->set_flashdata('error', 'Data gagal diedit');

        if ($validation->run()) {
            $ibuhamil->update();
            $this->session->set_flashdata('success', 'Berhasil diedit');
            $this->session->set_flashdata('error');
            redirect(site_url('puskesmas/ibuhamil/edit/'.$id));
        }

        $data["ibuhamil"] = $ibuhamil->getById($id);
        if (!$data["ibuhamil"]) show_404();

        $this->load->view('layout/head');
        $this->load->view("admin/puskesmas/ibuhamil/formEdit", $data);
        $this->load->view('layout/foot');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->ibuhamil_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('puskesmas/ibuhamil'));
        }
    }
}