<?php defined('BASEPATH') or exit('No direct script access allowed');

// require '../puskesmas/Registrasi.php';

class PetugasPosiandu extends CI_Controller
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
                    if ($this->petugas_model->doLogin()) {
                        $a = $this->session->userdata();
                        $this->session->set_flashdata(
                            'success',
                            'Berhasil Login'
                        );

                        $data = [
                            'id_wilayah' => $user['id_wilayah'],
                        ];

                        $this->session->set_userdata($data);

                        //var_dump($this->session->user_logged->username)."<br>".;die;
                        redirect(site_url('posyandu/home'));
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Maaf!</strong> username atau password salah!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                              </div>'
                        );
                        redirect('posyandu/login_posyandu');
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
                redirect('posyandu/login_posyandu');
            }
        } else {

            // $this->session->set_flashdata(
            //     'message',
            //     '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            //     <strong>Maaf!</strong> username password salah!
            //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //     <span aria-hidden="true">&times;</span>
            //     </button>
            //       </div>'
            // );
            // $this->session->sess_destroy();

            // redirect('posyandu/PetugasPosiandu');
        }

        // tampilkan halaman login
        $this->load->view('posiandu/petugas/login', $data);
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('posyandu/PetugasPosiandu'));
    }

    public function registrasi()
    {
        //fungsi default

        $data['wilayah'] = $this->wilayah_model->getAll();

        $this->load->view('posiandu/petugas/registrasi', $data);
    }

    public function wilayah()
    {
        //fungsi default
        $this->load->view('posiandu/petugas/wilayah');
    }

    // public function add()
    // {
    //     // $registrasi = new Registrasi();

    //     // $registrasi->_sendEmail();
    //     $petugas = $this->petugas_model;

    //     $email = $this->input->post('email');
    //     $cek_email = $petugas->getPetugasPuskesmasByEmail($email);

    //     if ($cek_email) {
    //         $this->session->set_flashdata(
    //             'pesan',
    //             '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //             <strong>Mohon Maaf</strong> Email sudah didaftarkan.
    //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //             </button>
    //             </div>'
    //         );

    //         redirect('posyandu/PetugasPosiandu/registrasi');
    //     } else {
    //         $validation = $this->form_validation;
    //         $validation->set_rules($petugas->rules());
    //         if ($validation->run()) {
    //             $token = base64_encode(random_bytes(32));
    //             $user_token = [
    //                 'email' => $email,
    //                 'token' => $token,
    //                 'date_created' => time(),
    //             ];

    //             $petugas->save();
    //             $this->db->insert('user_token', $user_token);
    //             $this->_sendEmail($token, 'verify');

    //             $this->session->set_userdata('sesi_verify', true);

    //             $this->session->set_flashdata(
    //                 'message',
    //                 '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //                 <strong>Berhasil</strong> akun kamu sudah dibuat. Tolong aktifasi akun kamu!
    //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                   <span aria-hidden="true">&times;</span>
    //                 </button>
    //                   </div>'
    //             );

    //             redirect('posyandu/login_posyandu');
    //         } else {
    //             redirect(site_url('posyandu/PetugasPosiandu/registrasi'));
    //         }
    //     }
    // }

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

    // private function _sendEmail($token, $type)
    // {
    //     $this->load->library('email');
    //     $config = [
    //         'protocol' => 'smtp',
    //         'smtp_host' => 'ssl://smtp.googlemail.com',
    //         'smtp_user' => 'rezaayu613@gmail.com',
    //         'smtp_pass' => 'Telkom!!',
    //         'smtp_port' => 465,
    //         'mailtype' => 'html',
    //         'charset' => 'utf-8',
    //         'newline' => "\r\n",
    //     ];

    //     $this->email->initialize($config);
    //     $this->email->from('rezaayu613@gmail.com', 'Admin App');
    //     $this->email->to($this->input->post('email'));

    //     if ($type == 'verify') {
    //         $this->email->subject('Account Verification');
    //         $this->email->message(
    //             'click this link to verify your account : <a href="' .
    //             base_url() .
    //             'posyandu/PetugasPosiandu/verify?email=' .
    //             $this->input->post('email') .
    //             '&token=' .
    //             urlencode($token) .
    //             '">Activate</a>'
    //         );
    //     } elseif ($type == 'forgot') {
    //         $this->email->subject('Reset Password');
    //         $this->email->message(
    //             'click this link to reset your password : <a href="' .
    //             base_url() .
    //             'puskesmas/Registrasi/resetpassword?email=' .
    //             $this->input->post('email') .
    //             '&token=' .
    //             urlencode($token) .
    //             '">Reset Password</a>'
    //         );
    //     }

    //     if ($this->email->send()) {
    //         return true;
    //     } else {
    //         echo $this->email->print_debugger();
    //         die();
    //     }
    // }

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
                        'message',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> ' .
                        $email .
                        ' Sudah aktif. Silahkan Login!
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                          </div>'
                    );
                    redirect('posyandu/login_posyandu');
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
                    redirect('posyandu/login_posyandu');
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
                redirect('posyandu/login_posyandu');
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
            redirect('posyandu/login_posyandu');
        }
    }
}