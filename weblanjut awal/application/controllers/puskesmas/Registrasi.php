<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("petugas_model");
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
    }
 
    public function index()
    {
        // tampilkan halaman login
        $this->load->view('admin/puskesmas/login/registrasi');
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

    public function wilayah(){//fungsi default
        $this->load->view('posiandu/petugas/wilayah');
    }

    public function add()
    {
        $petugas = $this->petugas_model;
        $validation = $this->form_validation;
        $validation->set_rules($petugas->rules());
        if ($validation->run()) {
            $petugas->save2();
            $this->session->set_flashdata('success','Berhasil disimpan Silahkan Login');
            redirect(site_url('puskesmas/Login'));
        }else{
            redirect(site_url('puskesmas/Login/registrasi'));
        }
    }

    public function addWilayah()
    {
        $wilayah = $this->wilayah_model;
        $validation = $this->form_validation;
        $validation->set_rules($wilayah->rules());
        if ($validation->run()) {
            $wilayah->save();
            $this->session->set_flashdata('success','Berhasil disimpan');
            redirect(site_url('posyandu/Home'));
        }else{
            redirect(site_url('posyandu/PetugasPosiandu/wilayah'));
        }
    }
}







    
    