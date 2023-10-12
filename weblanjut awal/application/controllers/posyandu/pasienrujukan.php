<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pasienrujukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()){redirect(site_url('posyandu/PetugasPosiandu'));}
        else if($this->Petugas_model->cekStatus()!='posyandu') redirect(site_url('puskesmas'));
        
        $this->load->model("pasienrujukan_model");
        $this->load->library('form_validation');
    }
    
    public function index()
    {
    	$this->load->view('layout/posiandu/head.php');
		
        $data["pasienrujukans"] = $this->pasienrujukan_model->getAll();

		$this->load->view('posiandu/pasienrujukan/data', $data);

		$this->load->view('layout/foot.php');
    }

    public function add_form()
    {
        $this->load->view('layout/posiandu/head.php');
        
		$this->load->view('posiandu/pasienrujukan/formtambah');

		$this->load->view('layout/foot.php');
    }

    public function add()
    {
        $pasienrujukan = $this->pasienrujukan_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($bidan->rules());

        // $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        
        // if ($validation->run()) {
            $pasienrujukan->save();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan');
        //     $this->session->set_flashdata('error');    
        // }
        
        redirect(site_url('posyandu/pasienrujukan'));
    }

    public function edit_form($id)
    {
        $this->load->view('layout/posiandu/head.php');
        
        $data["pasienrujukan"] = $this->pasienrujukan_model->getById($id);
        
        $this->load->view("posiandu/pasienrujukan/formEdit", $data);
        
		$this->load->view('layout/foot.php');
    }

    public function edit_save($id = null)
    {
        if (!isset($id)) redirect('posyandu/pasienrujukan');
       
        $pasienrujukan = $this->pasienrujukan_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($bidan->rules());

        // var_dump($this->input->post());die;

        // $this->session->set_flashdata('error', 'Data gagal diedit');

        // if ($validation->run()) {
            $pasienrujukan->update();
            $this->session->set_flashdata('success', 'Berhasil diedit');
            // $this->session->set_flashdata('error');
            redirect(site_url('posyandu/pasienrujukan'));
            // redirect(site_url('puskesmas/bidan_index'.$id));
        // }

        $data["pasienrujukan"] = $pasienrujukan->getById($id);
        if (!$data["pasienrujukan"]) show_404();

        $$this->load->view('layout/posiandu/head.php');
        $this->load->view("posiandu/pasienrujukan/formEdit", $data);
        $this->load->view('layout/foot.php');
    }

    public function detail($id = null)
    {

        if (!isset($id)) redirect('posyandu/pasienrujukan');
       
        $pasienrujukan = $this->pasienrujukan_model;
        
        $data["pasienrujukan"] = $pasienrujukan->getById($id);
        if (!$data["pasienrujukan"]) show_404();

        $this->load->view('layout/posiandu/head.php');
    	$this->load->view('posiandu/pasienrujukan/detail',$data);
    	$this->load->view('layout/foot.php');

    }


    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pasienrujukan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('posyandu/pasienrujukan'));
        }
    }


}