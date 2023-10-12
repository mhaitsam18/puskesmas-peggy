<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ibuhamil_model extends CI_Model
{
    private $_table = "ibuhamil"; //nama table

    //field table
    public $id_reg;
    public $nama;
    public $pekerjaan;
    public $gol_dar;
    public $nama_suami;
    public $pekerjaan_suami;
    public $tgl_lahir;
    public $umur;
    public $alamat;
    public $kelurahan;
    public $notelp;

    public function rules()
    {
        return [
            [
                'field' => 'id_reg',
                'label' => 'ID Pasien',
                'rules' => 'required',
            ],

            [
                'field' => 'nama',
                'label' => 'Nama Pasien',
                'rules' => 'required|regex_match[/^[\p{L}\s]+$/]',
            ],

            [
                'field' => 'pekerjaan',
                'label' => 'Pekerjaan Pasien',
                'rules' => 'required',
            ],

            [
                'field' => 'gol_dar',
                'label' => 'Golongan Darah Pasien',
                'rules' => 'required',
            ],

            [
                'field' => 'nama_suami',
                'label' => 'Nama Suami',
                'rules' => 'required',
            ],

            [
                'field' => 'pekerjaan_suami',
                'label' => 'Pekerjaan Suami',
                'rules' => 'required',
            ],

            [
                'field' => 'tgl_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required',
            ],

            [
                'field' => 'kelurahan',
                'label' => 'Kelurahan',
                'rules' => 'required',
            ],

            [
                'field' => 'notelp',
                'label' => 'Phone Number',
                'rules' => 'required|numeric',
            ],
        ];
    }
    public function cek_data($id)
    {
        do {
            $query = $this->db->get_where($this->_table, array(
                'id_reg' => $id,
            ));
        } while ($query->num_rows() > 0);
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
        // $this->id_reg = '';
        $this->id_reg = $post["id_reg"];
        $this->nama = $post["nama"];
        $this->pekerjaan = $post["pekerjaan"];
        $this->gol_dar = $post["gol_dar"];
        $this->nama_suami = $post["nama_suami"];
        $this->pekerjaan_suami = $post["pekerjaan_suami"];
        $this->tgl_lahir = $post["tgl_lahir"];
        $this->umur = $post["umur"];
        $this->alamat = $post["alamat"];
        $this->kelurahan = $post["kelurahan"];
        $this->notelp = $post["notelp"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $this->id_reg = $post["id_reg"];
        $this->nama = $post["nama"];
        $this->pekerjaan = $post["pekerjaan"];
        $this->gol_dar = $post["gol_dar"];
        $this->nama_suami = $post["nama_suami"];
        $this->pekerjaan_suami = $post["pekerjaan_suami"];
        $this->tgl_lahir = $post["tgl_lahir"];
        $this->umur = $post["umur"];
        $this->alamat = $post["alamat"];
        $this->kelurahan = $post["kelurahan"];
        $this->notelp = $post["notelp"];

        return $this->db->update($this->_table, $this, array('id_reg' => $post['id_reg']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_reg" => $id));
    }

    public function getAllKategori($kategori)
    {

        $query = "";
        $tabel = "";

        if ($kategori == "Letak Bayi") {
            $tabel = "letak_bayi";
        } elseif ($kategori == "HB") {
            $tabel = "kondisi_hb";
        } else {
            $tabel = "jenis_pembayaran";
        }

        $query = $this->db->get($tabel);

        return $query->result();
    }

    public function getWilayah()
    {
        $query = $this->db->get('wilayah');
        return $query->result();
    }

    public function getDataGraph($jg, $bulan = null)
    {
        $query = "";

        if (!is_null($bulan)) {
            if ($jg == 1) {
                $query = "SELECT count(id_reg) as jml FROM `ibuhamil` WHERE substr(tanggal_daftar,1,7) = substr('$bulan',1,7) GROUP by kelurahan";
            } else {
                $query = "SELECT count(id_pemeriksaan) as jml FROM `pemeriksaan` WHERE SUBSTR(tgl_periksa,1,7) = substr('$bulan',1,7) GROUP by idWilayah";
            }
        } else {
            if ($jg == 1) {
                $query = "SELECT count(id_reg) as jml FROM `ibuhamil` GROUP by kelurahan";
            } else {
                $query = "SELECT count(id_pemeriksaan) as jml FROM `pemeriksaan` GROUP by idWilayah";
            }
        }

        // SELECT substr("2020-10-31",6)

        $result = $this->db->query($query);

        return $result->result();
    }

    public function getIbuHamilAndPemeriksaan($id)
    {
        $this->db->select('ibuhamil.*, pemeriksaan.*');
        $this->db->from('pemeriksaan');
        $this->db->join('ibuhamil', 'pemeriksaan.id_pasien = ibuhamil.id_reg');
        $this->db->where('pemeriksaan.id_pasien', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getIbuHamilAndPemeriksaan2($id)
    {
        $this->db->select('*');
        $this->db->from('pemeriksaan');
        $this->db->join('ibuhamil', 'pemeriksaan.id_pasien = ibuhamil.id_reg');
        $this->db->where('id_pemeriksaan', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getCountPemeriksaan()
    {
        // SELECT id_pemeriksaan FROM `pemeriksaan` ORDER by id_pemeriksaan desc limit 1
        $this->db->select('id_pemeriksaan');
        $this->db->from('pemeriksaan');
        $this->db->order_by('id_pemeriksaan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

}