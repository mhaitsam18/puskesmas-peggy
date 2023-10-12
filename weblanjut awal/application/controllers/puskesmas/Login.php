<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
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
        //jika form login disubmit
        if($this->input->post()){
            if($this->petugas_model->doLogin2()){
                $this->session->userdata();
                $this->session->set_flashdata('success',"Selamat Datang di Puskesmas");
                //var_dump($this->session->user_logged->username)."<br>".;die;
                redirect(site_url('puskesmas'));  
            }else{
                $this->session->set_flashdata('error',"Username atau Password Salah");
            } 
        }
        // tampilkan halaman login
        $this->load->view('admin/puskesmas/login/login');
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
}







    
    