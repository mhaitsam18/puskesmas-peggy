<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()) redirect(site_url('puskesmas/login'));
        if($this->Petugas_model->cekStatus()!='puskesmas') redirect(site_url('posyandu'));

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function index()
    {
        $petugas = $this->petugas_model;

        $data['daftarpetugas'] = $petugas->getAll();

        $this->load->view('layout/head');

        $this->load->view('admin/puskesmas/petugas/data', $data);
        
		$this->load->view('layout/foot');
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('home/reza'));
    }

    public function registrasi(){//fungsi default
        $this->load->view('posiandu/petugas/registrasi');
    }


    public function add_form()
    {
        $this->load->view('layout/head');

        $this->load->view('admin/puskesmas/petugas/formtambah');
        
		$this->load->view('layout/foot');
    }

    public function add()
    {
        $petugas = $this->petugas_model;
        $validation = $this->form_validation;
        $validation->set_rules($petugas->rules());

        if ($validation->run()) {
            $petugas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('puskesmas/petugas'));
        }

        redirect(site_url('puskesmas/petugas/add'));
    }

    public function edit_form($id = null)
    {
        $petugas = $this->petugas_model;
        
        $data["petugas"] = $petugas->getById($id);

        $this->load->view('layout/head');
        $this->load->view("admin/puskesmas/petugas/formEdit", $data);
        $this->load->view('layout/foot');
    }
    
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/puskesmas/petugas');
       
        $petugas = $this->petugas_model;
        $validation = $this->form_validation;
        $validation->set_rules($petugas->rules());

        if ($validation->run()) {
            $petugas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('puskesmas/petugas'));
        }

        $data["petugas"] = $petugas->getById($id);
        if (!$data["petugas"]) show_404();

        redirect(site_url('puskesmas/petugas/edit_form/'.$id));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->petugas_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('puskesmas/petugas'));
        }
    }
}