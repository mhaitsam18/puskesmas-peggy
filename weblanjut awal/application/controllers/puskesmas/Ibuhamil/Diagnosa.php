<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller
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
        // load form and url helpers
        $this->load->helper(array('form', 'url'));
    }
    
    public function index()
    {
        $pemeriksaan = $this->pemeriksaan_model;
        
        $data['pemeriksaans'] = $pemeriksaan->getAll();

        $this->load->view('layout/head');
        $this->load->view("admin/puskesmas/ibuhamil/diagnosa/data", $data);
        $this->load->view('layout/foot');
    }

    public function add()
    {
        $pemeriksaan = $this->pemeriksaan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pemeriksaan->rules());
        
        $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        
        if ($validation->run()) {
            $pemeriksaan->save();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan');
            $this->session->set_flashdata('error');    
        }
        
        redirect(site_url('puskesmas/ibuhamil/diagnosa'));
    }

    public function edit($id = null)
    {
        $this->load->view('layout/head');
        
        $data["pemeriksaan"] = $this->pemeriksaan_model->getById($id);
        
        $this->load->view("admin/puskesmas/ibuhamil/pemeriksaan/formEdit", $data);
        
		$this->load->view('layout/foot');
    }
    
    public function edit_save($id = null)
    {
        if (!isset($id)) redirect('puskesmas/ibuhamil/pemeriksaan');
       
        $pemeriksaan = $this->pemeriksaan_model;

        $validation = $this->form_validation;
        $validation->set_rules($pemeriksaan->rules());

        $this->session->set_flashdata('error', 'Data gagal diedit');

        if ($validation->run()) {
            $pemeriksaan->update();
            $this->session->set_flashdata('success', 'Berhasil diedit');
            $this->session->set_flashdata('error');
        }

        redirect(site_url('puskesmas/ibuhamil/pemeriksaan/edit/'.$id));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pemeriksaan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('puskesmas/ibuhamil/pemeriksaan'));
        }
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
            $data['pemeriksaan'] = $this->pemeriksaan_model->getById($id);
            $this->load->view("admin/puskesmas/ibuhamil/diagnosa/formTambah", $data);
        }

        $this->load->view('layout/foot');
    }
}