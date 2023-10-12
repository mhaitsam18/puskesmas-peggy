<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
        // $this->load->model('Petugas_model');

        $this->data['showGraph'] = null;
    }

    public function index()
    {
        // $this->Petugas_model->setWilayah();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/template/footer', $this->data);
    }

    public function editPassword()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/editPassword');
        $this->load->view('admin/template/footer', $this->data);
    }

    public function ubahPw()
    {
        $pw1 = $this->input->post('pw1');
        $pw2 = $this->input->post('pw2');

        $val = $this->session->userdata('user_logged');

        if ($pw1 == $pw2) {

            $this->db->set('password', $pw2);
            $this->db->where('id_petugas', $val['id_petugas']);
            $this->db->update('petugas'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2

            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
            Sukses mengubah password!
        	</div>');

            redirect('admin/dashboard/editPassword');

        }

    }

    public function editKodeAkses($id)
    {
        $data = [
            'kodeAkses' => $this->M_Admin->getKode($id)->row(),
            'showGraph' => null,
        ];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/superadmin_editkodeAkses', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function updateKode()
    {
        $id = $this->input->post('id_kode');
        $data = [
            'password' => $this->input->post('kode'),
        ];
        $this->M_Admin->update('password_akses', $id, $data);

        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Password Berhasil Diubah.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');

        redirect('admin/dashboard/editPwAkses');
    }
}