<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Petugas_model');
        $this->load->model('Puskesmas_model');
        $this->load->model('M_Admin');

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function cek_login()
    {
        // if (!$this->session->userdata('sesi_verify')) {
        //     redirect('puskesmas');
        // }

        $email = $this->input->post('email');

        $user = $this->db
            ->get_where('petugas', [
                'username' => $email,
            ])
            ->row_array();
        //cek user ada atau tidak
        if ($user) {
            //ini user ada
            //cek user->email sudah aktif atau belum
            if ($user['status_aktif'] == 1) {
                if ($this->input->post()) {
                    if ($this->Petugas_model->doLogin2()) {
                        $this->session->userdata();
                        $this->session->unset_userdata('sesi_verify');
                        $this->session->set_flashdata(
                            'success',
                            'Selamat Datang di Puskesmas'
                        );
                        //var_dump($this->session->user_logged->username)."<br>".;die;
                        redirect(site_url('puskesmas'));
                    } else {
                        $this->session->set_flashdata(
                            'error',
                            'Username atau Password Salah'
                        );
                    }
                }
            } else {
                //akun belum aktif
                $this->session->set_flashdata(
                    'alert',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Maaf!</strong> akun kamu belum aktif!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			  	</div>'
                );
                redirect('puskesmas/login_puskesmas');
            }
        } else {
            //email belum terdaftar
            // $this->session->set_flashdata(
            //     'alert',
            //     '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            // <strong>Maaf!</strong> akun kamu belum terdaftar!
            // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            // <span aria-hidden="true">&times;</span>
            // </button>
            //   </div>'
            // );
            // redirect('puskesmas/login_puskesmas');
        }

        //jika form login disubmit

        // tampilkan halaman login
        $this->load->view('admin/puskesmas/login/login');
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('home/reza'));
    }

    public function registrasi()
    {
        //fungsi default
        $this->load->view('posiandu/petugas/registrasi');
    }

    public function verifikasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // var_dump($email);die();

        $user = $this->db
            ->get_where('petugas', [
                'username' => $email,
            ])
            ->row_array();

        if ($user) {
            $user_token = $this->db
                ->get_where('user_token', ['token' => $token])
                ->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < 60 * 60 * 24) {
                    $this->db->set('status_aktif', 1);
                    $this->db->where('username', $email);
                    $this->db->update('petugas');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'alert',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            			<strong>Selamat!</strong> ' .
                        $email .
                        ' Sudah aktif. Silahkan Login!
           				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              			<span aria-hidden="true">&times;</span>
            			</button>
          				</div>'
                    );
                    redirect('puskesmas/login_puskesmas');
                } else {
                    $this->db->delete('petugas', ['username' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'alert',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Token expired!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
                    );
                    redirect('puskesmas/login_puskesmas');
                }
            } else {
                $this->session->set_flashdata(
                    'alert',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Account activation failed! Wrong token.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
                );
                redirect('puskesmas/login_puskesmas');
            }
        } else {
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Account activation failed! Wrong email.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
            );
            redirect('puskesmas/login_puskesmas');
        }
    }
}