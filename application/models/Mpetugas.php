<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mpetugas extends CI_Model
{
    private $_table = "petugas";

    public $id_petugas;
    public $username;
    public $nama;
    public $foto;
    public $password;
    public $status;
    // public $pekerjaan;

    public function rules()
    {
        return [
            ['field' => 'id_petugas',
                'label' => 'id_petugas',
                'rules' => 'required'],

            ['field' => 'username',
                'label' => 'username',
                'rules' => 'required'],

            ['field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'],

            ['field' => 'foto',
                'label' => 'foto',
                'rules' => 'required'],

            ['field' => 'password',
                'label' => 'password',
                'rules' => 'required'],

            ['field' => 'status',
                'label' => 'status',
                'rules' => 'required'],

            // ['field' => 'pekerjaan',
            // 'label' => 'pekerjaan',
            // 'rules' => 'required']
        ];
    }
    //  public function cek_data($id)
    //  {
    //      do {
    //          $query = $this->db->get_where($this->_table, array(
    //              'id_petugas' => $id
    //          ));
    //      } while ($query->num_rows()>0);
    //      return $query->num_rows();
    //  }

    //  public function getAll()
    //  {
    //      return $this->db->get($this->_table)->result();
    //  }

    //  public function countAllData()
    //  {
    //      return $this->db->count_all($this->_table);
    //  }

    //  public function getById($id)
    //  {
    //      return $this->db->get_where($this->_table, ["id_petugas" => $id])->row();
    //  }
    
    

    public function save()
    {

        $this->foto = 'img_' . uniqid();
        $post = $this->input->post();

        //  $this->id_petugas = '';
        $this->id_petugas = $post["id_petugas"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->nama = $post["nama"];
        $this->foto = $this->_uploadImage();
        // $this->foto = $this->_uploadImage();
        // 'filecover' => $gambar
        $this->status = "posyandu";

        return $this->db->insert($this->_table, $this);
    }

    public function save2()
    {
        $this->foto = 'img_' . uniqid();
        $post = $this->input->post();

        //  $this->id_petugas = '';
        $this->id_petugas = $post["id_petugas"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->nama = $post["nama"];
        // $this->foto = $this->_uploadImage();
        $this->foto = $post["foto"];
        $this->status = "puskesmas";

        return $this->db->insert($this->_table, $this);
    }

    public function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('status', "posyandu");
        $this->db->where('nama', $post["username"])
            ->or_where('username', $post["username"]);
        $user = $this->db->get($this->_table)->row();

        $data['id_petugas'] = $user->id_petugas;
        $data['username'] = $user->username;
        $data['nama'] = $user->nama;
        $data['foto'] = $user->foto;
        $data['password'] = $user->password;
        $data['status'] = $user->status;

        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            //$isPasswordTrue = password_verify($post["password"], $user->password);
            $isPasswordTrue = $post["password"] == $user->password ? 'True' : '';
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
        $this->db->where('status', "puskesmas");
        $this->db->where('nama', $post["username"])
            ->or_where('username', $post["username"]);
        $user = $this->db->get($this->_table)->row();

        $data['id_petugas'] = $user->id_petugas;
        $data['username'] = $user->username;
        $data['nama'] = $user->nama;
        $data['foto'] = $user->foto;
        $data['password'] = $user->password;
        $data['status'] = $user->status;

        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            //$isPasswordTrue = password_verify($post["password"], $user->password);
            $isPasswordTrue = $post["password"] == $user->password ? 'True' : '';
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
    public function setWilayah()
    {

        $post = $this->input->post();

        $temp = $this->session->userdata('user_logged');

        $temp['wilayah'] = $post['wilayah'];

        //var_dump($temp);

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
        $config['allowed_types'] = 'gif|jpg|png|JPG';
        $config['file_name'] = $this->foto;
        $config['overwrite'] = true;
        $config['max_size'] = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
        return "default.png";
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_petugas" => $id])->row();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function countAllData()
    {
        return $this->db->count_all($this->_table);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_petugas = $post["id_petugas"];
        $this->username = $post["username"];
        $this->nama = $post["nama"];
        // $this->foto = $post["foto"];
        $this->foto = $this->_uploadImage();
        $this->password = $post["password"];
        $this->status = $post["status"];
        return $this->db->update($this->_table, $this, array('id_petugas' => $post['id_petugas']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_petugas" => $id));
    }
}