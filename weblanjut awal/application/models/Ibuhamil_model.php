<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ibuhamil_model extends CI_Model
{
    private $_table = "ibuhamil"; //nama table

    //field table
    public $id_reg;
    public $nama;
    public $pekerjaan;
    public $nama_suami;
    public $pekerjaan_suami;
    public $umur;
    public $alamat;
    public $notelp;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|regex_match[/^[\p{L}\s]+$/]'],

            ['field' => 'pekerjaan',
            'label' => 'Pekerjaan',
            'rules' => 'required'],
            
            ['field' => 'nama_suami',
            'label' => 'Nama Suami',
            'rules' => 'required'],
            
            ['field' => 'pekerjaan_suami',
            'label' => 'Pekerjaan Suami',
            'rules' => 'required'],
            
            ['field' => 'umur',
            'label' => 'Umur',
            'rules' => 'numeric'],
            
            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
            
            ['field' => 'notelp',
            'label' => 'Phone Number',
            'rules' => 'required|min_length[10]|max_length[13]|numeric']
        ];
    }
    public function cek_data($id)
    {
        do {
            $query = $this->db->get_where($this->_table, array(
                'id_reg' => $id
            ));
        } while ($query->num_rows()>0);
        return $query->num_rows(); 
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function countAllData()
    {
        return $this->db->count_all($this->_table);
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_reg" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_reg = '';
        $this->nama = $post["nama"];
        $this->pekerjaan = $post["pekerjaan"];
        $this->nama_suami = $post["nama_suami"];
        $this->pekerjaan_suami = $post["pekerjaan_suami"];
        $this->umur = $post["umur"];
        $this->alamat = $post["alamat"];
        $this->notelp = $post["notelp"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_reg = $post["id_reg"];
        $this->nama = $post["nama"];
        $this->pekerjaan = $post["pekerjaan"];
        $this->nama_suami = $post["nama_suami"];
        $this->pekerjaan_suami = $post["pekerjaan_suami"];
        $this->umur = $post["umur"];
        $this->alamat = $post["alamat"];
        $this->notelp = $post["notelp"];
        $this->nama = $post["nama"];
        return $this->db->update($this->_table, $this, array('id_reg' => $post['id_reg']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_reg" => $id));
    }
}