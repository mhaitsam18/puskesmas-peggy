<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("regisanak_model");
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->model("Petugas_model");

        if (is_null($this->session->userdata('id_wilayah'))) {
            redirect('home/reza');
        }

    }

    public function create()
    {
        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/daftar/create');
        $this->load->view('layout/foot.php');

    }

    public function create2($id = null)
    {
        $data["noPasien"] = $id;
        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/daftar/create', $data);
        $this->load->view('layout/foot.php');

    }

    public function add()
    {
        $regisanak = $this->regisanak_model;
        $validation = $this->form_validation;
        $validation->set_rules($regisanak->rules());
        if ($validation->run()) {
            $data = $this->input->post("no_pasien");
            $regisanak->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('posyandu/Daftar/create2/' . $data));
        } else {
            $this->session->set_flashdata('error', 'Inputan tidak valid');
        }redirect(site_url('posyandu/Daftar/create'));

    }

    public function edit($id = null)
    {

        if (!isset($id)) {
            redirect('posyandu/Daftar');
        }

        $regisanak = $this->regisanak_model;
        $validation = $this->form_validation;
        $validation->set_rules($regisanak->rules());

        if ($validation->run()) {
            $regisanak->update();
            $this->session->set_flashdata('success', 'Data berhasil diedit');
            redirect(site_url('posyandu/Daftar'));

        }
        $data["pendaftaran"] = $regisanak->getById($id);
        if (!$data["pendaftaran"]) {
            show_404();
        }

        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/daftar/update', $data);
        $this->load->view('layout/foot.php');

    }

    public function detail($id = null)
    {

        if (!isset($id)) {
            redirect('posyandu/Daftar');
        }

        $regisanak = $this->regisanak_model;

        $data["pendaftaran"] = $regisanak->getById($id);
        if (!$data["pendaftaran"]) {
            show_404();
        }

        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/daftar/detail', $data);
        $this->load->view('layout/foot.php');

    }

    public function delete($id = null)
    {
        if (!isset($id)) {
            show_404();
        }

        if ($this->regisanak_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect(site_url('posyandu/Daftar'));
        }
    }

    public function index()
    {
        $data["pendaftaran"] = $this->regisanak_model->getAll();
        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/daftar/index', $data);
        $this->load->view('layout/foot.php');
    }

    public function createPencatatan()
    {
        $data["pendaftaran"] = $this->regisanak_model->getAll();
        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/pencatatan/create', $data);
        $this->load->view('layout/foot.php');
    }

    public function createPencatatan2($id = null)
    {
        $regisanak = $this->regisanak_model;

        $data["pendaftaran"] = $regisanak->getById($id);

        if (!$data["pendaftaran"]) {
            show_404();
        }

        $data['kat_usia'] = $this->db->get('kategori_usia')->result();
        $data['imunisasi'] = $this->db->get('imunisasi')->result();
        $data['vitamin'] = $this->db->get('vitamin')->result();
        $data['obat_cacing'] = $this->db->get('obat_cacing')->result();

        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/Pencatatan/create2', $data);
        $this->load->view('layout/foot');

    }
}