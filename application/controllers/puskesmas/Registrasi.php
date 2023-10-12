<?php defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Petugas_model');

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function index()
    {
        // tampilkan halaman login
        $this->load->view('admin/puskesmas/login/registrasi');
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

    public function wilayah()
    {
        //fungsi default
        $this->load->view('posiandu/petugas/wilayah');
    }

    public function add()
    {
        $petugas = $this->Petugas_model;
        //cek email sudah registrasi atau belum
        $email = $this->input->post('email');
        $cek_email = $petugas->getPetugasPuskesmasByEmail($email);

        //jika email ada
        if ($cek_email) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Mohon Maaf</strong> Email sudah didaftarkan.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>'
            );

            redirect('puskesmas/Registrasi');
        } else {
            // $validation = $this->form_validation;
            // $validation->set_rules($petugas->rules());
            // if ($validation->run()) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time(),
            ];
            $petugas->save2();
            //insert token
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Berhasil</strong> akun kamu sudah dibuat. Tolong aktifasi akun kamu!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  	</div>'
            );

            $this->session->set_userdata('sesi_verify', true);

            redirect(site_url('puskesmas/login_puskesmas'));
        }
        // }else{
        //     redirect(site_url('puskesmas/registrasi/'));
        // }
        // redirect(site_url('puskesmas/registrasi/'));
    }

    public function addWilayah()
    {
        $wilayah = $this->wilayah_model;
        $validation = $this->form_validation;
        $validation->set_rules($wilayah->rules());
        if ($validation->run()) {
            $wilayah->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('posyandu/Home'));
        } else {
            redirect(site_url('posyandu/PetugasPosiandu/wilayah'));
        }
    }

    private function _sendEmail($token, $type)
    {
        $this->load->library('email');
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'rezaayu613@gmail.com',
            'smtp_pass' => 'Telkom!!',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);
        $this->email->from('rezaayu613@gmail.com', 'Admin App');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message(
                'click this link to verify your account : <a href="' .
                base_url() .
                'puskesmas/Registrasi/verify?email=' .
                $this->input->post('email') .
                '&token=' .
                urlencode($token) .
                '">Activate</a>'
            );
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message(
                'click this link to reset your password : <a href="' .
                base_url() .
                'puskesmas/Registrasi/resetpassword?email=' .
                $this->input->post('email') .
                '&token=' .
                urlencode($token) .
                '">Reset Password</a>'
            );
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

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
                        'success',
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
                        'message',
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
                    'message',
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
                'message',
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

    public function forgot_password()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('petugas/forgot_password');
        } else {
            $email = $this->input->post('email');

            $user = $this->db
                ->get_where('petugas', [
                    'username' => $email,
                ])
                ->row_array();

            if (!$user) {
                $this->session->set_flashdata(
                    'alert',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Maaf!</strong> akun kamu belum ada!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			  	</div>'
                );
                redirect('forgot_password');
            } else {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time(),
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata(
                    'alert',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Silahkan cek email kamu untuk ubah sandi!
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>'
                );
                redirect('forgot_password');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db
            ->get_where('petugas', ['username' => $email])
            ->row_array();

        if ($user) {
            $user_token = $this->db
                ->get_where('user_token', ['token' => $token])
                ->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata(
                    'alert',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Reset password gagal! Token salah
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>'
                );
                redirect('forgot_password');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Reset password gagal! Email salah
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>'
            );
            redirect('forgot_password');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('forgot_password');
        }

        $this->form_validation->set_rules(
            'password1',
            'Paassword',
            'trim|required|min_length[3]|matches[password2]',
            [
                'matches' => '',
                'min_length' => '',
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Repeat Paassword',
            'trim|required|min_length[3]|matches[password1]',
            [
                'matches' => 'Password Dont Match!!',
                'min_length' => 'Password To Short!',
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('petugas/change_password');
        } else {
            $password = $this->input->post('password1');

            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('username', $email);
            $this->db->update('petugas');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Password has been change ! Please Login <b><a href="' .
                base_url('home/reza') .
                '">Ke menu utama</a></b>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>'
            );
            redirect('forgot_password');
        }
    }
}