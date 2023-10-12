<?php defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_Model
{
    private $_table = 'petugas';

    public $id_petugas;
    public $username;
    public $password;
    public $nama;
    public $foto;
    public $status_aktif;
    public $id_wilayah;

    public function rules()
    {
        return [
            ['field' => 'email', 'label' => 'email', 'rules' => 'required'],

            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required',
            ],

            ['field' => 'nama', 'label' => 'nama', 'rules' => 'required'],
        ];
    }

    public function save()
    {
        $this->foto = 'img_' . uniqid();
        $post = $this->input->post();

        // $this->id_petugas = '';
        $this->username = $post['email'];
        $this->password = $post['password'];
        $this->nama = $post['nama'];
        $this->foto = $this->_uploadImage();
        $this->status = 'posyandu';
        $this->status_aktif = 0;
        $this->id_wilayah = $post['wilayah'];
        //  $this->pekerjaan = $post["pekerjaan"];

        return $this->db->insert($this->_table, $this);
    }

    public function save2()
    {
        $this->foto = 'img_' . uniqid();
        $post = $this->input->post();

        // $this->id_petugas = '';
        $this->username = $post['email'];
        $this->password = $post['password'];
        $this->nama = $post['nama'];
        $this->foto = $this->_uploadImage();
        $this->status = 'puskesmas';
        $this->status_aktif = 0;
        //  $this->pekerjaan = $post["pekerjaan"];

        return $this->db->insert($this->_table, $this);
    }

    public function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('status', 'posyandu');
        $this->db
            ->where('nama', $post['email'])
            ->or_where('username', $post['email']);
        $user = $this->db->get($this->_table)->row();

        $data['id_petugas'] = $user->id_petugas;
        $data['username'] = $user->username;
        $data['nama'] = $user->nama;
        $data['foto'] = $user->foto;
        $data['password'] = $user->password;
        $data['status'] = $user->status;
        //  $data['pekerjaan'] = $user->pekerjaan;

        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            //$isPasswordTrue = password_verify($post["password"], $user->password);
            $isPasswordTrue =
            $post['password'] == $user->password ? 'True' : '';
            // periksa role-nya
            //$isAdmin = $user->role == "admin";
            $isAdmin = 'admin';

            // jika password benar dan dia admin
            if ($isPasswordTrue && $isAdmin && $user->status == 'posyandu') {
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $data]);
                return true;
            } else {
                return false;
            }
        }

        // login gagal
        return false;
    }

    public function doLogin2()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('status', 'puskesmas');
        $this->db
            ->where('nama', $post['email'])
            ->or_where('username', $post['email']);
        $user = $this->db->get($this->_table)->row();

        $data['id_petugas'] = $user->id_petugas;
        $data['username'] = $user->username;
        $data['nama'] = $user->nama;
        $data['foto'] = $user->foto;
        $data['password'] = $user->password;
        $data['status'] = $user->status;
        //  $data['pekerjaan'] = $user->pekerjaan;

        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            //$isPasswordTrue = password_verify($post["password"], $user->password);
            $isPasswordTrue =
            $post['password'] == $user->password ? 'True' : '';
            // periksa role-nya
            //$isAdmin = $user->role == "admin";
            $isAdmin = 'admin';

            // jika password benar dan dia admin
            if ($isPasswordTrue && $isAdmin && $user->status == 'puskesmas') {
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $data]);
                return true;
            } else {
                return false;
            }
        }

        // login gagal
        return false;
    }

    public function doLogin3()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('status', 'puskesmas');
        $this->db
            ->where('nama', $post['email'])
            ->or_where('username', $post['email']);
        $user = $this->db->get($this->_table)->row();

        $data['id_petugas'] = $user->id_petugas;
        $data['username'] = $user->username;
        $data['nama'] = $user->nama;
        $data['foto'] = $user->foto;
        $data['password'] = $user->password;
        $data['status'] = $user->status;
        //  $data['pekerjaan'] = $user->pekerjaan;

        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            //$isPasswordTrue = password_verify($post["password"], $user->password);
            $isPasswordTrue =
            $post['password'] == $user->password ? 'True' : '';
            // periksa role-nya
            //$isAdmin = $user->role == "admin";
            $isAdmin = 'admin';

            // jika password benar dan dia admin
            if ($isPasswordTrue && $isAdmin && $user->status == 'superadmin') {
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $data]);
                return true;
            } else {
                return false;
            }
        }

        // login gagal
        return false;
    }

    public function setWilayah()
    {

        // $post = $this->input->post();

        $temp = $this->session->userdata('user_logged');

        $temp['wilayah'] = $this->session->userdata('id_wilayah');

        // var_dump($temp);die;

        $this->session->set_userdata('user_logged', $temp);
    }

    public function isNotLogin()
    {
        return $this->session->userdata('user_logged') === null;
    }

    public function cekStatus()
    {
        $a = $this->session->userdata();
        $t = '';
        foreach ($a as $e) {
            $t = $e;
        }
        return $t['status'];
    }

    private function _uploadImage()
    {
        $config['upload_path'] = './upload/petugas_posyandu/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->foto;
        $config['overwrite'] = true;
        $config['max_size'] = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        }
        return 'default.png';
    }

    public function getById($id)
    {
        return $this->db
            ->get_where($this->_table, ['id_petugas' => $id])
            ->row();
    }

    public function getPetugasPuskesmasByEmail($email)
    {
        return $this->db
            ->get_where('petugas', [
                'username' => $email,
            ])
            ->row_array();
    }
}