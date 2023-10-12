<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan_model extends CI_Model
{
    private $_table = "pemeriksaan"; //nama table

    //field table
    public $id_pemeriksaan;
    public $id_pasien;
    // public $id_reg;
    public $id_petugas;
    public $tgl_periksa;
  
    public $gravida;
    public $partes;
    public $abortus;
    public $jarak_kehamilan;
    public $usia_kehamilan;
    public $tinggi_badan;
    public $lila;
    public $sistol;
    public $diastol;
    public $tetanus_toksoid;
    public $fe;
    public $tfu;
    public $letak_bayi;
    public $hpht;
    public $tp;
    public $hb;    
    public $gol_dar;
    public $namaobat;
    public $tindakanmedis;
    public $hbsag;
    public $hiv;
    public $sypilis;

    public $pembayaran;

    public function rules()
    {
        return [
            ['field' => 'id_pasien',
            'label' => 'ID Pasien',
            'rules' => 'required'],

            // ['field' => 'id_reg',
            // 'label' => 'ID Reg',
            // 'rules' => 'required'],

            ['field' => 'id_petugas',
            'label' => 'ID petugas',
            'rules' => 'required'],

            ['field' => 'tgl_periksa',
            'label' => 'Tanggal Periksa',
            'rules' => 'required'],


            ['field' => 'gravida',
            'label' => 'Gravida',
            'rules' => 'required'],

            ['field' => 'gravida',
            'label' => 'Gravida',
            'rules' => 'required'],
            
            ['field' => 'partes',
            'label' => 'Partes',
            'rules' => 'required'],
            
            ['field' => 'abortus',
            'label' => 'Abortus',
            'rules' => 'required'],
            
            ['field' => 'jarak_kehamilan',
            'label' => 'Jarak Kehamilan',
            'rules' => 'required'],
            
            ['field' => 'usia_kehamilan',
            'label' => 'Usia Kehamilan',
            'rules' => 'required'],
            
            ['field' => 'tinggi_badan',
            'label' => 'Tinggi Badan',
            'rules' => 'required'],
            
            ['field' => 'lila',
            'label' => 'Lingkar Lengan Atas',
            'rules' => 'required'],
            
            ['field' => 'sistol',
            'label' => 'Sistol',
            'rules' => 'required'],
            
            ['field' => 'diastol',
            'label' => 'Diastol',
            'rules' => 'required'],
            
            ['field' => 'tetanus_toksoid',
            'label' => 'Tetanus Toksoid',
            'rules' => 'required'],
            
            ['field' => 'fe',
            'label' => 'Zat Besi (Fe)',
            'rules' => 'required'],
            
            ['field' => 'tfu',
            'label' => 'Tinggi Fundus Uteri',
            'rules' => 'required'],
            
            ['field' => 'letak_bayi',
            'label' => 'Letak Bayi',
            'rules' => 'required'],
            
            ['field' => 'hpht',
            'label' => 'Hari Pertama Haid Terakhir',
            'rules' => 'required'],
            
            ['field' => 'tp',
            'label' => 'Taksiran Persalinan',
            'rules' => 'required'],
            
            ['field' => 'hb',
            'label' => 'Hemoglobin (hb)',
            'rules' => 'required'],
            
            ['field' => 'gol_dar',
            'label' => 'Golongan Darah',
            'rules' => 'required'],

            ['field' => 'namaobat',
            'label' => 'Nama Obat',
            'rules' => 'required'],

            ['field' => 'tindakanmedis',
            'label' => 'Tindakan Medis',
            'rules' => 'required'],
            
            ['field' => 'hbsag',
            'label' => 'HBSAG',
            'rules' => 'required'],
            
            ['field' => 'hiv',
            'label' => 'HIV',
            'rules' => 'required'],
            
            ['field' => 'sypilis',
            'label' => 'Sypilis',
            'rules' => 'required'],
            
            ['field' => 'pembayaran',
            'label' => 'Pembayaran',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->join('ibuhamil', 'pemeriksaan.id_pasien = ibuhamil.id_reg','inner');
        return $this->db->get($this->_table)->result();
    }
    
    public function countAllData()
    {
        return $this->db->count_all($this->_table);
    }

    public function getAllById($id=null)
    {
        $this->db->join('ibuhamil', 'pemeriksaan.id_pasien = ibuhamil.id_reg','inner');
        $this->db->where('ibuhamil.id_reg',$id);
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        $this->db->join('ibuhamil', 'pemeriksaan.id_pasien = ibuhamil.id_reg','inner');
        return $this->db->get_where($this->_table, ["id_pemeriksaan" => $id])->row();
    }

    public function getDataPemeriksaanPasien($key='')
    {
        $this->db->join('ibuhamil', 'pemeriksaan.id_pasien = ibuhamil.id_reg','inner');
        $this->db->where('ibuhamil.id_reg',$key);
        return $this->db->get($this->_table)->result();
    }

    public function getId()
    {
        $this->db->select_max('id_pemeriksaan', 'pemeriksaan');
        $temp = $this->db->get($this->_table)->row();
        return gettype($temp->pemeriksaan)==NULL?1:(int)$temp->pemeriksaan+1;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pemeriksaan = '';
        $this->id_pasien = $post['id_pasien'];
        // $this->id_reg = $post['id_reg'];
        $this->id_petugas = $post['id_petugas'];
        $this->tgl_periksa = $post['tgl_periksa'];
    
        $this->gravida = $post['gravida'];
        $this->partes = $post['partes'];
        $this->abortus = $post['abortus'];
        $this->jarak_kehamilan = $post['jarak_kehamilan'];
        $this->usia_kehamilan = $post['usia_kehamilan'];
        $this->tinggi_badan = $post['tinggi_badan'];
        $this->lila = $post['lila'];
        $this->sistol = $post['sistol'];
        $this->diastol = $post['diastol'];
        $this->tetanus_toksoid = $post['tetanus_toksoid'];
        $this->fe = $post['fe'];
        $this->tfu = $post['tfu'];
        $this->letak_bayi = $post['letak_bayi'];
        $this->hpht = $post['hpht'];
        $this->tp = $post['tp'];
        $this->hb = $post['hb'];
        $this->gol_dar = $post['gol_dar'];
        $this->namaobat = $post['namaobat'];
        $this->tindakanmedis = $post['tindakanmedis'];
        $this->hbsag = $post['hbsag'];
        $this->hiv = $post['hiv'];
        $this->sypilis = $post['sypilils'];

        $this->pembayaran = $post['pembayaran'];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pemeriksaan = $post['id_pemeriksaan'];
        $this->id_pasien = $post['id_pasien'];
        // $this->id_reg = $post['id_reg'];
        $this->id_petugas = $post['id_petugas'];
        $this->tgl_periksa = $post['tgl_periksa'];
     
        $this->gravida = $post['gravida'];
        $this->partes = $post['partes'];
        $this->abortus = $post['abortus'];
        $this->jarak_kehamilan = $post['jarak_kehamilan'];
        $this->usia_kehamilan = $post['usia_kehamilan'];
        $this->tinggi_badan = $post['tinggi_badan'];
        $this->lila = $post['lila'];
        $this->sistol = $post['sistol'];
        $this->diastol = $post['diastol'];
        $this->tetanus_toksoid = $post['tetanus_toksoid'];
        $this->fe = $post['fe'];
        $this->tfu = $post['tfu'];
        $this->letak_bayi = $post['letak_bayi'];
        $this->hpht = $post['hpht'];
        $this->tp = $post['tp'];
        $this->hb = $post['hb'];
        $this->gol_dar = $post['gol_dar'];
        $this->namaobat = $post['namaobat'];
        $this->tindakanmedis = $post['tindakanmedis'];
        $this->hbsag = $post['hbsag'];
        $this->hiv = $post['hiv'];
        $this->sypilis = $post['sypilis'];

        $this->pembayaran = $post['pembayaran'];

        return $this->db->update($this->_table, $this, array('id_pemeriksaan' => $post['id_pemeriksaan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pemeriksaan" => $id));
    }
}