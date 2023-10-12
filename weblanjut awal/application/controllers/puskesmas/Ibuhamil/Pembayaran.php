<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()) redirect(site_url('puskesmas/login'));
        if($this->Petugas_model->cekStatus()!='puskesmas') redirect(site_url('posyandu'));

        $this->load->model("diagnosa_model");
        $this->load->model("ibuhamil_model");
        $this->load->model("pemeriksaan_model");
        $this->load->library('form_validation');
        // load form and url helpers
        $this->load->helper(array('form', 'url'));
    }
    
    public function index()
    {
        $diagnosa = $this->diagnosa_model;
        
        $data['diagnosa'] = $diagnosa->getAll();

        $this->load->view('layout/head');
        $this->load->view("admin/puskesmas/ibuhamil/pembayaran/formTambah", $data);
        $this->load->view('layout/foot');
    }
    
    public function tambah($id=null)
    {
        $this->load->view('layout/head');
     
        if($id == null)
        {
            $data['ibuhamils'] = $this->ibuhamil_model->getAll();
            $this->load->view("admin/puskesmas/ibuhamil/diagnosa/dataPilih", $data);
        }
        else
        {
            $data['pemeriksaan'] = $this->pemeriksaan_model->getAllById($id);
            $data['diagnosa'] = $this->diagnosa_model->getId();
            $data['ibuhamil'] = $this->ibuhamil_model->getById($id);
            $this->load->view("admin/puskesmas/ibuhamil/diagnosa/formTambah", $data);
        }

        $this->load->view('layout/foot');
    }

    public function add()
    {
        $diagnosa = $this->diagnosa_model;
        $validation = $this->form_validation;
        $validation->set_rules($diagnosa->rules());
        
        $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        
        if ($validation->run()) {
            $diagnosa->save();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan');
            $this->session->set_flashdata('error');    
        }
        
        redirect(site_url('puskesmas/ibuhamil/diagnosa'));
    }

    public function edit($id = null)
    {
        $this->load->view('layout/head');
        
        $data["diagnosa"] = $this->diagnosa_model->getById($id);
        
        $this->load->view("admin/puskesmas/ibuhamil/diagnosa/formEdit", $data);
        
		$this->load->view('layout/foot');
    }

    public function edit_save($id = null)
    {
        if (!isset($id)) redirect('puskesmas/ibuhamil/diagnosa');
       
        $diagnosa = $this->diagnosa_model;

        $validation = $this->form_validation;
        $validation->set_rules($diagnosa->rules());

        $this->session->set_flashdata('error', 'Data gagal diedit');

        if ($validation->run()) {
            $diagnosa->update();
            $this->session->set_flashdata('success', 'Berhasil diedit');
            $this->session->set_flashdata('error');
        }

        redirect(site_url('puskesmas/ibuhamil/diagnosa/edit/'.$id));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->diagnosa_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('puskesmas/ibuhamil/diagnosa'));
        }
    }
}