<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pencatatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("pencatatan_model");
        $this->load->model("regisanak_model");
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->model("Petugas_model");
        if (is_null($this->session->userdata('id_wilayah'))) {
            redirect('home/reza');
        }

    }

    public function index()
    {
        $data["pencatatan"] = $this->pencatatan_model->get_by_role();
        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/pencatatan/index', $data);
        $this->load->view('layout/foot.php');
    }

    public function add()
    {
        $pencatatan = $this->pencatatan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pencatatan->rules());

        if ($validation->run()) {
            $pencatatan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('posyandu/Daftar/createPencatatan/create'));
        } else {
            redirect(site_url('posyandu/Daftar/createPencatatan'));
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) {
            show_404();
        }

        if ($this->pencatatan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect(site_url('posyandu/Pencatatan'));
        }
    }

    public function edit($id = null)
    {

        if (!isset($id)) {
            redirect('posyandu/Pencatatan');
        }

        $pencatatan = $this->pencatatan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pencatatan->rules());

        if ($validation->run()) {
            // $regisanak_model->update();
            $this->session->set_flashdata('success', 'Data berhasil diedit');
            redirect(site_url('posyandu/Pencatatan'));

        }

        $data["pencatatan"] = $pencatatan->get_by_roleId($id);
        if (!$data["pencatatan"]) {
            show_404();
        }

        $data['kat_usia'] = $this->db->get('kategori_usia')->result();
        $data['imunisasi'] = $this->db->get('imunisasi')->result();
        $data['vitamin'] = $this->db->get('vitamin')->result();
        $data['obat_cacing'] = $this->db->get('obat_cacing')->result();

        $this->load->view('layout/posiandu/head');
        $this->load->view('posiandu/pencatatan/update', $data);
        $this->load->view('layout/foot');

    }

    public function update()
    {
        $pencatatan = $this->pencatatan_model;
        $pencatatan->update();

        redirect('posyandu/Pencatatan');

    }

    //     $data["pencatatan"] = $pencatatan->get_by_roleId($id);
    //     if (!$data["pencatatan"]) show_404();
    //     //var_dump($data);die;
    //     $this->load->view('layout/posiandu/head.php');
    //     $this->load->view('posiandu/pencatatan/update',$data);
    //     $this->load->view('layout/foot.php');

    // }

}