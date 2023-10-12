<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{

    public function getAllPetugas()
    {
        return $this->db->get('petugas');
    }

    public function getAllWilayah()
    {
        return $this->db->get('wilayah')->result_array();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function getJadwal($id)
    {
        return $this->db->get_where('jadwal', array('id_jadwal' => $id));
    }

    public function getwilayah($id)
    {
        return $this->db->get_where('wilayah', array('id_wilayah' => $id));
    }

    public function update($table, $id, $data)
    {
        if ($table == 'jadwal') {
            $this->db->where('id_jadwal', $id);
            $this->db->update($table, $data);
        } elseif ($table == 'wilayah') {
            $this->db->where('id_wilayah', $id);
            $this->db->update($table, $data);
        } elseif ($table == 'password_akses') {
            $this->db->where('id_password', $id);
            $this->db->update($table, $data);
        }

    }

    public function delete($table, $id)
    {
        if ($table == 'jadwal') {
            $this->db->delete($table, $id);
        }
    }

    public function cekKodeAdmin()
    {
        return $this->db->get_where('password_akses', [
            'role' => 'Admin',
        ])
            ->row_array();
    }

    public function getKodeAkses($role)
    {
        if ($role == 'Posyandu') {
            return $this->db->get_where('password_akses', ['role' => $role]);
        } elseif ($role == 'Puskesmas') {
            return $this->db->get_where('password_akses', ['role' => $role]);
        } else {
            return $this->db->get_where('password_akses', ['role' => $role]);
        }
    }

    public function getKode($id)
    {
        return $this->db->get_where('password_akses', ['id_password' => $id]);
    }

    public function getCountJmlDaftar()
    {
        $this->db->select('COUNT(*) as jml');
        return $this->db->get('regisanak')->result();
    }

    public function getCountJmlPencatatan()
    {
        $this->db->select('COUNT(*) as jml');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCountJmlLaporan()
    {
        $this->db->select('COUNT(*) as jml');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where('pencatatan.status', 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCountJmlHistory()
    {
        $this->db->select('COUNT(*) as jml');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where('pencatatan.status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_role_pencatatanMedis()
    {
        $this->db->select('pencatatan.*, regisanak.nama_anak');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $query = $this->db->get();
        return $query->result();
        // return $this->db->query("CALL getPencatatan_RegisAnak(".$this->session->user_logged['wilayah'].")")->result();
    }

    public function getAllPasienPosyandu()
    {
        return $this->db->get('regisanak')->result();
    }

    public function getAllPasienRujukan()
    {
        return $this->db->get('pasienrujukan')->result();
    }

    public function getAllHistoryPosyandu()
    {
        $this->db->select('pencatatan.*, regisanak.*');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllLaporanPosyandu()
    {
        $this->db->select('pencatatan.*, regisanak.*');
        $this->db->from('pencatatan');
        $this->db->join('regisanak', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where('status', 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function selectAll($table, $where = null)
    {
        if ($where == null) {
            return $this->db->get($table);
        } elseif ($table == 'pekerjaan') {
            return $this->db->get_where($table, array('tipe' => $where));
        }
    }

    public function selectAllWilayah($tabel)
    {
        return $this->db->get($tabel);
    }

    public function selectWhere($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function select($table, $where)
    {
        $this->db->select('pembayaran');
        $this->db->from($table);
        $this->db->where('id_jenis', $where);
        return $this->db->get();
    }

    public function updatekategori($table, $id, $set)
    {
        $this->db->where($id);
        $this->db->update($table, $set);
    }

    public function deleteKategori($table, $id)
    {
        $this->db->delete($table, $id);
    }

    public function getlike($tahun, $bulan)
    {
        $this->db->select('COUNT(*) as jml');
        $this->db->where('tgl_daftar LIKE', $tahun . '-' . $bulan . '%');
        return $this->db->get('regisanak')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('regisanak', ["no_pasien" => $id])->row();
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

    public function getDataCatatAnak($id_catat)
    {
        $this->db->select('pencatatan.*, regisanak.*');
        $this->db->from('regisanak');
        $this->db->join('pencatatan', 'pencatatan.no_pasien = regisanak.no_pasien');
        $this->db->where("pencatatan.id_pencatatan", $id_catat);
        // $this->db->where("regisanak.status", 0);
        $query = $this->db->get();
        return $query->row_array();
    }

}