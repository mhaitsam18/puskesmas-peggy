<?php defined('BASEPATH') or exit('No direct script access allowed');

// require '../puskesmas/Registrasi.php';

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('petugas_model');
        $this->load->model('wilayah_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function index()
    {
        // jika form login disubmit
        $data['wilayah'] = $this->wilayah_model->getAll();
        $email = $this->input->post('email');

        $user = $this->db
            ->get_where('petugas', [
                'username' => $email,
            ])
            ->row_array();

        if ($user) {
            //ini user ada
            //cek user->email sudah aktif atau belum
            if ($user['status_aktif'] == 1) {
                if ($this->input->post()) {
                    if ($this->petugas_model->doLogin3()) {
                        $a = $this->session->userdata();
                        $this->session->set_flashdata(
                            'success',
                            'Berhasil Login'
                        );
                        //var_dump($this->session->user_logged->username)."<br>".;die;
                        redirect(site_url('admin/dashboard'));
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Maaf!</strong> Password salah!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
							  </div>'
                        );
                        redirect('admin/login');
                    }
                }
            } else {
                //akun belum aktif
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Maaf!</strong> akun kamu belum aktif!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					  </div>'
                );
                redirect('admin/login');
            }
        } else {
            //email belum terdaftar
            // var_dump($user);die();
            // redirect('admin/login');
        }

        // tampilkan halaman login
        $this->load->view('admin/login_superadmin', $data);
    }
}