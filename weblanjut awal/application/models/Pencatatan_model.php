<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pencatatan_model extends CI_Model
{
    private $_table = "pencatatan";

    public $id_pencatatan;
    public $no_pasien;
    public $nama_bidan;
    public $umur;
    public $kategori;
    public $tinggi;
    public $bb;
    public $temperatur;
    public $lingkar;
    public $jenis_imunisasi;
    public $diagnosa;
    public $penyuluhan;
    public $vitamin;
    public $obat;
    public $notelp;
    public $tgl_pencatatan;

    public function rules()
    {
        return [
            ['field' => 'id_pencatatan',
            'label' => 'id_pencatatan',
            'rules' => ''],


            ['field' => 'no_pasien',
            'label' => 'no_pasien',
            'rules' => 'required'],

            ['field' => 'nama_bidan',
            'label' => 'nama_bidan',
            'rules' => 'required'],
            
            ['field' => 'umur',
            'label' => 'umur',
            'rules' => 'required'],

            ['field' => 'kategori',
            'label' => 'kategori',
            'rules' => 'required'],

            ['field' => 'tinggi',
            'label' => 'tinggi',
            'rules' => 'required'],

            ['field' => 'bb',
            'label' => 'bb',
            'rules' => 'required'],

            ['field' => 'temperatur',
            'label' => 'temperatur',
            'rules' => 'required'],

            ['field' => 'lingkar',
            'label' => 'lingkar',
            'rules' => 'required'],

            ['field' => 'jenis_imunisasi',
            'label' => 'jenis_imunisasi',
            'rules' => 'required'],

            ['field' => 'diagnosa',
            'label' => 'diagnosa',
            'rules' => 'required'],

            ['field' => 'penyuluhan',
            'label' => 'penyuluhan',
            'rules' => 'required'],

            ['field' => 'vitamin',
            'label' => 'vitamin',
            'rules' => 'required'],

            ['field' => 'obat',
            'label' => 'obat',
            'rules' => 'required'],

            ['field' => 'notelp',
            'label' => 'notelp',
            'rules' => 'required'],

            ['field' => 'tgl_pencatatan',
            'label' => 'tgl_pencatatan',
            'rules' => 'required']
        ];
    }

    public function get_by_role()
    {
        $this->db->select('pencatatan.*, regisanak.nama_anak');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where('id_wilayah', $this->session->user_logged['wilayah']);
        $query = $this->db->get();
        return $query->result();
        // return $this->db->query("CALL getPencatatan_RegisAnak(".$this->session->user_logged['wilayah'].")")->result();
    }

    public function getCount()
    {
        $this->db->select('COUNT(*) as jml');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where('id_wilayah', $this->session->user_logged['wilayah']);
        $query = $this->db->get();
        return $query->result();
    }

    public function getJoinAll($id)
    {
        $this->db->select('pencatatan.*, regisanak.*');
        $this->db->from('regisanak');
        $this->db->join('pencatatan', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where("pencatatan.no_pasien", $id);
        // $this->db->where("regisanak.status", 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_roleId($id)
    {
        $this->db->select('pencatatan.*, regisanak.nama_anak,regisanak.no_pasien');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where("id_pencatatan", $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pencatatan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->id_pencatatan = '';
        $this->no_pasien = $post["no_pasien"];
        $this->nama_bidan = $post["nama_bidan"];
        $this->umur = $post["umur"];
        $this->kategori = $post["kategori"];
        $this->tinggi = $post["tinggi"];
        $this->bb = $post["bb"];
        $this->temperatur = $post["temperatur"];
        $this->lingkar = $post["lingkar"];
        $this->jenis_imunisasi = $post["jenis_imunisasi"];
        $this->diagnosa = $post["diagnosa"];
        $this->penyuluhan = $post["penyuluhan"];
        $this->vitamin = $post["vitamin"];
        $this->obat = $post["obat"];
        $this->notelp = $post["notelp"];
        $this->tgl_pencatatan = $post["tgl_pencatatan"];
     	   
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pencatatan = $post["id_pencatatan"];
        $this->no_pasien = $post["no_pasien"];
        $this->nama_bidan = $post["nama_bidan"];
        $this->umur = $post["umur"];
        $this->kategori = $post["kategori"];
        $this->tinggi = $post["tinggi"];
        $this->bb = $post["bb"];
        $this->temperatur = $post["temperatur"];
        $this->lingkar = $post["lingkar"];
        $this->jenis_imunisasi = $post["jenis_imunisasi"];
        $this->diagnosa = $post["diagnosa"];
        $this->penyuluhan = $post["penyuluhan"];
        $this->vitamin = $post["vitamin"];
        $this->obat = $post["obat"];
        $this->notelp = $post["notelp"];
        $this->tgl_pencatatan = $post["tgl_pencatatan"];

        return $this->db->update($this->_table, $this, array('id_pencatatan' => $post['id_pencatatan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pencatatan" => $id));
    }

    public function getAllLaporan()
    {
        $this->db->select('pencatatan.*, regisanak.*');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where('id_wilayah', $this->session->user_logged['wilayah']);
        $this->db->where('status', 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllHistory()
    {
        $this->db->select('pencatatan.*, regisanak.*');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where('id_wilayah', $this->session->user_logged['wilayah']);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllHistory2()
    {
        $this->db->select('pencatatan.*, regisanak.*');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function upStatus($datas){
        foreach ($datas as $data) {
            $this->id_pencatatan = $data->id_pencatatan;
            $this->no_pasien = $data->no_pasien;
            $this->nama_bidan = $data->nama_bidan;
            $this->umur = $data->umur;
            $this->kategori = $data->kategori;
            $this->tinggi = $data->tinggi;
            $this->bb = $data->bb;
            $this->temperatur = $data->temperatur;
            $this->lingkar = $data->lingkar;
            $this->jenis_imunisasi = $data->jenis_imunisasi;
            $this->diagnosa = $data->diagnosa;
            $this->penyuluhan = $data->penyuluhan;
            $this->vitamin = $data->vitamin;
            $this->obat = $data->obat;
            $this->notelp = $data->notelp;
            $this->tgl_pencatatan = $data->tgl_pencatatan;
            $this->status = 1;
            $this->db->update($this->_table, $this, array('id_pencatatan' => $data->id_pencatatan));
        }
    }

    public function getCountLaporan()
    {
        $this->db->select('COUNT(*) as jml');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where('regisanak.id_wilayah', $this->session->user_logged['wilayah']);
        $this->db->where('pencatatan.status', 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCountHistory()
    {
        $this->db->select('COUNT(*) as jml');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where('regisanak.id_wilayah', $this->session->user_logged['wilayah']);
        $this->db->where('pencatatan.status', 1);
        $query = $this->db->get();
        return $query->result();
    }
}