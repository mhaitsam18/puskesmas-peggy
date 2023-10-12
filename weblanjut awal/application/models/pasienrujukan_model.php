<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pasienrujukan_model extends CI_Model
{
    private $_table = "pasienrujukan"; //nama table

    //field table
    public $id_rujukan;
    public $no_rujukan;
    public $puskesmas;
    // public $rumahsakit;
    public $kab_kota;
    public $poli;
    public $namapasien;
    public $umur;
    public $alamat;
    public $nopasien;
    public $diagnosa;
    public $tgl_pembuatan;

    public function rules()
    {
        return [
           ['field' => 'id_rujukan',
            'label' => 'ID Rujukan',
            'rules' => 'required|regex_match[/^[\p{L}\s]+$/]'],

            ['field' => 'no_rujukan',
            'label' => 'Nomor Rujukan',
            'rules' => 'required'],

            ['field' => 'puskesmas',
            'label' => 'Puskesmas',
            'rules' => 'required'],

            ['field' => 'rumahsakit',
            'label' => 'Rumah Sakit',
            'rules' => 'required'],

            ['field' => 'kab_kota',
            'label' => 'KAB/KOTA',
            'rules' => 'required'],

            ['field' => 'poli',
            'label' => 'POLI',
            'rules' => 'required'],

            ['field' => 'namapasien',
            'label' => 'Nama Pasien',
            'rules' => 'required'],
            
            ['field' => 'umur',
            'label' => 'Umur',
            'rules' => 'required'],
            
            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
            
            ['field' => 'nopasien',
            'label' => 'No Pasien',
            'rules' => 'required'],
            
            ['field' => 'diagnosa',
            'label' => 'Diagnosa Sementara',
            'rules' => 'required'],

            ['field' => 'tgl_pembuatan',
            'label' => 'Tanggal Pembuatan',
            'rules' => 'required']

        ];
    }
    public function cek_data($id)
    {
        do {
            $query = $this->db->get_where($this->_table, array(
                'id_rujukan' => $id
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
        return $this->db->get_where($this->_table, ["id_rujukan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_rujukan = $post["id_rujukan"];
        $this->no_rujukan = $post["no_rujukan"];
        $this->puskesmas = $post["puskesmas"];
        // $this->rumahsakit = $post["rumahsakit"];
        $this->kab_kota = $post["kab_kota"];
        $this->poli = $post["poli"];
        $this->namapasien = $post["namapasien"];
        $this->umur = $post["umur"];
        $this->alamat = $post["alamat"];
        $this->nopasien = $post["nopasien"];
        $this->diagnosa = $post["diagnosa"];
        $this->tgl_pembuatan = $post["tgl_pembuatan"];
        return $this->db->insert($this->_table, $this);
        
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_rujukan = $post["id_rujukan"];
        $this->no_rujukan = $post["no_rujukan"];
        $this->puskesmas = $post["puskesmas"];
        // $this->rumahsakit = $post["rumahsakit"];
        $this->kab_kota = $post["kab_kota"];
        $this->poli = $post["poli"];
        $this->namapasien = $post["namapasien"];
        $this->umur = $post["umur"];
        $this->alamat = $post["alamat"];
        $this->nopasien = $post["nopasien"];
        $this->diagnosa = $post["diagnosa"];
        $this->tgl_pembuatan = $post["tgl_pembuatan"];
        return $this->db->update($this->_table, $this, array('id_rujukan' => $post['id_rujukan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_rujukan" => $id));
    }
}