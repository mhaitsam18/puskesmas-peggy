<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Regisanak_model extends CI_Model
{
    private $_table = "regisanak";

    public $no_pasien;
    public $id_wilayah;
    public $nama_anak;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jk;
    public $nama_ibu;
    public $p_ibu;
    public $nama_ayah;
    public $p_ayah;
    public $alamat;
    public $tgl_daftar;

    public function rules()
    {
        return [
            ['field' => 'no_pasien',
            'label' => 'no_pasien',
            'rules' => 'numeric|required'],

            ['field' => 'nama_anak',
            'label' => 'nama_anak',
            'rules' => 'required'],
            
            ['field' => 'tempat_lahir',
            'label' => 'tempat_lahir',
            'rules' => 'required'],

            ['field' => 'tanggal_lahir',
            'label' => 'tanggal_lahir',
            'rules' => 'required'],

            ['field' => 'jk',
            'label' => 'jk',
            'rules' => 'required'],

            ['field' => 'nama_ibu',
            'label' => 'nama_ibu',
            'rules' => 'required'],

            ['field' => 'p_ibu',
            'label' => 'p_ibu',
            'rules' => 'required'],

            ['field' => 'nama_ayah',
            'label' => 'nama_ayah',
            'rules' => 'required'],

            ['field' => 'p_ayah',
            'label' => 'p_ayah',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required'],

            ['field' => 'tgl_daftar',
            'label' => 'tgl_daftar',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->where('id_wilayah', $this->session->user_logged['wilayah']);
        return $this->db->get($this->_table)->result();
    }

    public function getlike($tahun,$bulan)
    {
        $this->db->select('COUNT(*) as jml');
        $this->db->where('tgl_daftar LIKE',$tahun.'-'.$bulan.'%');
        $this->db->where('id_wilayah',$this->session->user_logged['wilayah']);
        return $this->db->get($this->_table)->result();
    }

    public function getCount()
    {
        $this->db->select('COUNT(*) as jml');
        $this->db->where('id_wilayah',$this->session->user_logged['wilayah']);
        return $this->db->get($this->_table)->result();
    }    
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no_pasien" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
     	  
        $this->no_pasien = $post["no_pasien"];
	    $this->nama_anak = $post["nama_anak"];
	    $this->tempat_lahir = $post["tempat_lahir"];
	    $this->tanggal_lahir = $post["tanggal_lahir"];
	    $this->jk = $post["jk"];
	    $this->nama_ibu = $post["nama_ibu"];
	    $this->p_ibu = $post["p_ibu"];
	    $this->nama_ayah = $post["nama_ayah"];
	    $this->p_ayah = $post["p_ayah"];
	    $this->alamat = $post["alamat"];
	    $this->tgl_daftar = $post["tgl_daftar"];
        $this->id_wilayah = $this->session->user_logged['wilayah'];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $this->no_pasien = $post["no_pasien"];
	    $this->nama_anak = $post["nama_anak"];
	    $this->tempat_lahir = $post["tempat_lahir"];
	    $this->tanggal_lahir = $post["tanggal_lahir"];
	    $this->jk = $post["jk"];
	    $this->nama_ibu = $post["nama_ibu"];
	    $this->p_ibu = $post["p_ibu"];
	    $this->nama_ayah = $post["nama_ayah"];
	    $this->p_ayah = $post["p_ayah"];
	    $this->alamat = $post["alamat"];
	    $this->tgl_daftar = $post["tgl_daftar"];
        $this->id_wilayah = $this->session->user_logged['wilayah'];
        return $this->db->update($this->_table, $this, array('no_pasien' => $post['no_pasien']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("no_pasien" => $id));
    }

}