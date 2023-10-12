<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mpetugas");
        $this->load->model("Petugas_model");

        if (is_null($this->session->userdata('id_wilayah'))) {
            redirect('home/reza');
        }

        $this->load->model("pasienrujukan_model");
        $this->load->library('form_validation');
    }


    public function index()
    {
        $petugas = $this->Mpetugas;
        $data['daftarpetugas'] = $this->db->get_where('petugas', array('status' => 'posyandu'))->result();
        // $data['daftarpetugas'] = $petugas->getAll();

        $this->load->view('layout/posiandu/head.php');

        $this->load->view('admin/_partials/posiandu/petugas/data', $data);

        $this->load->view('layout/foot');
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('home/reza'));
    }

    public function registrasi()
    { //fungsi default
        $this->load->view('posiandu/petugas/registrasi');
    }

    public function add_form()
    {
        $this->load->view('layout/posiandu/head.php');

        $this->load->view('admin/_partials/posiandu/petugas/formTambah');

        $this->load->view('layout/foot.php');
    }



    public function add()
    {
        $petugas = $this->Mpetugas;
        $validation = $this->form_validation;
        $validation->set_rules($petugas->rules());

        $this->session->set_flashdata('error', 'Data gagal ditambahkan');

        if ($validation->run()) {
            $petugas->save();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan');
            $this->session->set_flashdata('error');
        }

        redirect(site_url('posyandu/petugas'));
    }
    // public function add()
    // {
    //     $petugas = $this->Mpetugas;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($petugas->rules());
    //     if ($validation->run()) {
    //         $petugas->save();
    //         $this->session->set_flashdata('success','Berhasil disimpan');
    //         $this->session->set_flashdata('error');
    //     }else{
    //         redirect(site_url('posyandu/petugas'));
    //     }
    // }

    public function edit_form($id = null)
    {
        $data["petugas"] = $this->Mpetugas->getById($id);

        $data["petugas"] = $this->Mpetugas->getById($id);

        $this->load->view('layout/posiandu/head.php');

        $this->load->view("admin/_partials/posiandu/petugas/formEdit", $data);

        $this->load->view('layout/foot.php');
    }

    public function edit($id = null)
    {
        if (!isset($id)) {
            redirect('posyandu/petugas');
        }

        $petugas = $this->Mpetugas;
        // $validation = $this->form_validation;
        // $validation->set_rules($petugas->rules());

        // if ($validation->run()) {
        // $petugas->update();
        // $this->session->set_flashdata('success', 'Berhasil disimpan');
        // redirect(site_url('posyandu/petugas'));
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
        // if (!$data["petugas"]) {
        //     show_404();
        // }

        // $$this->load->view('layout/posiandu/head.php');
        // $this->load->view("posiandu/petugas/formEdit", $data);
        // $this->load->view('layout/foot');
        redirect(site_url('posyandu/petugas/'));

    }

    public function delete($id = null)
    {
        if (!isset($id)) {
            show_404();
        }

        if ($this->Mpetugas->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('posyandu/petugas'));
        }
    }

}