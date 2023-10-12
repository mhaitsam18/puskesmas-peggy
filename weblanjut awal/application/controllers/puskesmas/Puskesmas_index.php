<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puskesmas_index extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
		parent::__construct();
		$this->load->model("Petugas_model");
        if($this->Petugas_model->isNotLogin()) redirect(site_url('puskesmas/login'));
        if($this->Petugas_model->cekStatus()!='puskesmas') redirect(site_url('posyandu'));

		$this->load->model("ibuhamil_model");
		$this->load->model('pemeriksaan_model');
        $this->load->library('form_validation');
    }	

	public function index()
	{
		$data['ibu'] = $this->ibuhamil_model->countAllData();
		$data['pemeriksaan'] = $this->pemeriksaan_model->countAllData();

		$this->load->view('layout/head');

		$this->load->view('admin/puskesmas/dashboard', $data);

		$this->load->view('layout/foot');
	}

    public function login()
    {
        $this->load->view('admin/puskesmas/login');
    }

    public function registrasi()
    {
        $this->load->view('admin/puskesmas/registrasi');
	}

	public function petugas()
	{
		$this->load->view('layout/head');

		$data["daftarpetugas"] = $this->petugas_model->getAll();

		$this->load->view('admin/puskesmas/petugas/data', $data);

		$this->load->view('layout/foot');
	}
}
