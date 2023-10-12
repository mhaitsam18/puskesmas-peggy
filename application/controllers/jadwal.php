<?php

defined('BASEPATH') or exit('No direct script access allowed');

class jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mjadwal');
    }

    public function index()
    {
        //fungsi default
        $jadwal = $this->Mjadwal->selectData();
        $this->load->view('layoutt/header');

        $this->load->view('jadwal/page_index', [
            'data' => $jadwal, //model ke view
        ]);
        $this->load->view('layoutt/footer');
    }
    public function addForm()
    {
        if ($_POST) {
            $this->form_validation->set_rules(
                'id_jadwal',
                'ID Jadwal',
                'required'
            );
            $this->form_validation->set_rules(
                'nama',
                'Nama Petugas',
                'required'
            );
            $this->form_validation->set_rules('bln', 'Bulan', 'required');
            $this->form_validation->set_rules('thn', 'Tahun', 'required');
            $this->form_validation->set_rules(
                'wilayah',
                'Wilayah Posyandu',
                'required'
            );
            if ($this->form_validation->run() == true) {
                $this->Mjadwal->insertMk();
                $this->session->set_flashdata('success', 'Berhasil Disimpan');
                redirect('jadwal/index');
            }
        }

        $this->load->view('layoutt/header');
        $this->load->view('jadwal/page_addform'); // menampilkan view
        $this->load->view('layoutt/footer');
    }
    public function delete($id_jadwal)
    {
        $this->Mjadwal->deleteMk($id_jadwal);
        redirect('jadwal/index'); //menampilkan data terbaru
    }
    public function updateForm($id_jadwal)
    {
        $jadwal = $this->Mjadwal->getMkByIdMk($id_jadwal); //menampilkan query 1 row
        $this->load->view('jadwal/page_updateForm', [
            'data' => $jadwal,
        ]);
    }
    public function updateMk()
    {
        $this->Mjadwal->updateMk();
        redirect('jadwal/index');
    }
}