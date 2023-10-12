<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasPosiandu extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("petugas_model");
        $this->load->model("wilayah_model");
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function index()
    {
        // jika form login disubmit
        $data["wilayah"] = $this->wilayah_model->getAll();
        if($this->input->post()){
            if($this->petugas_model->doLogin()){
                $a=$this->session->userdata();
                $this->session->set_flashdata('success',"Berhasil Login");
                //var_dump($this->session->user_logged->username)."<br>".;die;
                redirect(site_url('posyandu/PetugasPosiandu'));  
            }else{
                $this->session->set_flashdata('error',"Ussername atau Password Salah");
            } 
        }

        // tampilkan halaman login
        $this->load->view('posiandu/petugas/login',$data);
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('posyandu/PetugasPosiandu'));
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
            $petugas->save();
            $this->session->set_flashdata('successRegis','Berhasil disimpan');
            redirect(site_url('posyandu/PetugasPosiandu'));
        }else{
            redirect(site_url('posyandu/PetugasPosiandu/registrasi'));
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







    
    