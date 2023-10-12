<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("petugasindex_model");
        if($this->petugasindex_model->isNotLogin()) redirect(site_url('puskesmas/login'));
        if($this->petugasindex_model->cekStatus()!='puskesmas') redirect(site_url('posyandu'));

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function index()
    {
        $petugas = $this->petugasindex_model;

        $data['daftarpetugas'] = $petugas->getByStatus('puskesmas');
        

        $this->load->view('layout/head');

        $this->load->view('admin/puskesmas/petugas/data', $data);
        
		$this->load->view('layout/foot');
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


    public function add_form()
    {
        $this->load->view('layout/head');

        $this->load->view('admin/puskesmas/petugas/formtambah');
        
		$this->load->view('layout/foot');
    }

    public function add()
    {
        $petugas = $this->petugasindex_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($petugas->rules());

        // if ($validation->run()) {
            $petugas->save2();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        //     redirect(site_url('puskesmas/petugas'));
        // }

        redirect(site_url('puskesmas/petugas'));
    }

    public function edit_form($id = null)
    {
        $petugas = $this->petugasindex_model;
        
        $data["petugas"] = $this->petugasindex_model->getById($id);

        $this->load->view('layout/head');
        $this->load->view("admin/puskesmas/petugas/formEdit", $data);
        $this->load->view('layout/foot');
    }
    
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/puskesmas/petugas');
       
        $petugas = $this->petugasindex_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($petugas->rules());

        // if ($validation->run()) {
            // $petugas->update();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            // redirect(site_url('puskesmas/petugas'));
        // }
        $petugas = $this->db->get_where('petugas', ['id_petugas' => $this->input->post('id_petugas')])->row_array();
        $upload_image = $_FILES['foto']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['upload_path'] = './upload/petugas_posyandu';
            $config['max_size']     = '2048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $old_image = $petugas['foto'];
                if ($old_image !='default.jpg') {
                    unlink(FCPATH.'upload/petugas_posyandu/'.$old_image);
                } 
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else{
                $this->session->set_flashdata('flash_error', $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                redirect('puskesmas/edit_form');
            }
        }
        $this->db->where('id_petugas', $this->input->post('id_petugas'));
        $this->db->update('petugas', [
            // 'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama' => $this->input->post('nama'),
            'status' => $this->input->post('status')
        ]);
        

        // $data["petugas"] = $petugas->getById($id);
        // if (!$data["petugas"]) show_404();

        // $this->load->view('layout/head');
        // $this->load->view("admin/puskesmas/petugas/formEdit", $data);
        // $this->load->view('layout/foot');
        redirect('puskesmas/petugas/');

    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->petugasindex_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('puskesmas/petugas'));
        }
    }
  
}