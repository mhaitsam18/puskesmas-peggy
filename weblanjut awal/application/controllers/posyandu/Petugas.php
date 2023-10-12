<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mpetugas");
        $this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()){redirect(site_url('posyandu/PetugasPosiandu'));}
        else if($this->Petugas_model->cekStatus()!='posyandu') redirect(site_url('puskesmas'));
        
        $this->load->model("pasienrujukan_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $petugas = $this->Mpetugas;
        $data['daftarpetugas'] = $petugas->getAll();
        
        $this->load->view('layout/posiandu/head.php');

        $this->load->view('admin/_partials/posiandu/petugas/data', $data);
        
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
        $this->load->view('layout/posiandu/head.php');
        
		$this->load->view('admin/_partials/posiandu/petugas/formTambah');

		$this->load->view('layout/foot.php');
    }

    public function add()
    {
        $petugas = $this->Mpetugas;
        $validation = $this->form_validation;
        $validation->set_rules($petugas->rules());

        $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        
        if ($validation->run()) {
            $petugas->save();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan');
            $this->session->set_flashdata('error');    
        }
        
        redirect(site_url('posyandu/petugas'));
    }
    // public function add()
    // {
    //     $petugas = $this->Mpetugas;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($petugas->rules());
    //     if ($validation->run()) {
    //         $petugas->save();
    //         $this->session->set_flashdata('success','Berhasil disimpan');
    //         $this->session->set_flashdata('error'); 
    //     }else{
    //         redirect(site_url('posyandu/petugas'));
    //     }
    // }


    public function edit_form($id = null)
    {
        $data["petugas"] = $this->Mpetugas->getById($id);

        $data["petugas"] = $this->Mpetugas->getById($id);

        $this->load->view('layout/posiandu/head.php');
        
        $this->load->view("admin/_partials/posiandu/petugas/formEdit", $data);
        
		$this->load->view('layout/foot.php');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('posyandu/petugas');
       
        $petugas = $this->Mpetugas;
        // $validation = $this->form_validation;
        // $validation->set_rules($petugas->rules());

        // if ($validation->run()) {
            $petugas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('posyandu/petugas'));
        // }

        $data["petugas"] = $petugas->getById($id);
        if (!$data["petugas"]) show_404();

        $$this->load->view('layout/posiandu/head.php');
        $this->load->view("posiandu/petugas/formEdit", $data);
        $this->load->view('layout/foot');
        // redirect(site_url('puskesmas/petugas/'));

    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Mpetugas->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('posyandu/petugas'));
        }
    }


}