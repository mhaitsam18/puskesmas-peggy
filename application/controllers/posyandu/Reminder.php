<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder extends CI_Controller {
    private $_sender = 'posyandu';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()){ redirect(site_url('posyandu/petugasposiandu'));}
        else if($this->Petugas_model->cekStatus()!='posyandu') redirect(site_url('puskesmas'));

        // load library
        $this->load->library('nexmo');
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');
        //load model  ibu hamil
        $this->load->model('pencatatan_model');
    }
    
    public function send_process($destination = '', $message = '')
    {
        if($destination == ''){
            $this->session->set_flashdata('error', 'No Tujuan Kosong - Gagal Terkirim');
            redirect(site_url('posyandu/reminder'));
        }
        else if($message == ''){
            $this->session->set_flashdata('error', 'Pesan Kosong - Gagal Terkirim');
            redirect(site_url('posyandu/reminder'));
        }else{
            $from = $this->_sender;
            $to = $destination;
            $message = array(
                'text' => $message,
            );
            $response = $this->nexmo->send_message($from, $to, $message);
        }
    }

    public function send()
    {
        $post = $this->input->post();

        $message = $post['pesan'];

        if($message=='')
        {
            $this->session->set_flashdata('error', 'Pesan Kosong - Gagal Terkirim');
        }else{   
            $datas = $this->pencatatan_model->getAll();
            foreach ($datas as $data) {
                $this->send_process($data->notelp, $message);
            }
            $this->session->set_flashdata('success', 'Pesan Terkirim');
        }

        redirect(site_url('posyandu/reminder'));
    }

    public function index(){
    	$this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/reminder');
        $this->load->view('layout/foot.php');
    }
}







    
