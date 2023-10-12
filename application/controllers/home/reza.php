<?php
defined('BASEPATH') or exit('No direct script access allowed');

class reza extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mreza');
    }

    public function index()
    {

        $this->session->unset_userdata('id_wilayah');

        $this->session->sess_destroy();
        $this->load->view('reza/header');
    }
}