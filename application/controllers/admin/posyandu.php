<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Posyandu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Petugas_model");
        $this->load->model("Regisanak_model");
        $this->load->model("Pencatatan_model");
        $this->load->model('Mjadwal');
        $this->load->model('Wilayah_model');
        $this->load->model("Mpetugas");
        $this->load->model("Petugas_model");
        $this->load->model('pasienrujukan_model');
        $this->load->model('M_Admin');
        $this->load->model("pasienrujukan_modelP");

        $this->load->library('form_validation');

        if ($this->Petugas_model->isNotLogin()) {
            redirect(site_url('posyandu/PetugasPosiandu'));
        }

        $this->foot['showGraph'] = null;

    }

    public function index()
    {
        // $this->Petugas_model->setWilayah();

        $tamp["jmlDaftar"] = $this->M_Admin->getCountJmlDaftar();
        $tamp["jmlPencatatan"] = $this->M_Admin->getCountJmlPencatatan();
        $tamp["jmlLaporan"] = $this->M_Admin->getCountJmlLaporan();
        $tamp["jmlHistory"] = $this->M_Admin->getCountJmlHistory();
        $tamp["cek"] = array();
        $bln = "";
        $tahun = gmdate("Y", time() + 60 * 60 * 8);
        for ($i = 0; $i < 12; $i++) {
            if ($i + 1 <= 9) {
                $bln = "0" . ($i + 1);
            } else {
                $bln = ($i + 1);
            }
            $cek = $this->M_Admin->getlike($tahun, $bln);
            $tamp["cek"][$i] = $cek[0]->jml;
            //echo $tamp["cek"][$i]."<br>";
        }

        $ubah = gmdate("Y-m-d", time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tahun = $pecah[0];

        $tamp['showGraph'] = null;

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu', $tamp);
        $this->load->view('admin/template/footer', $tamp);
    }

    public function kodeAkses()
    {
        $data = [
            'kodeAkses' => $this->M_Admin->getKodeAkses('Posyandu')->result(),
            'showGraph' => null,
        ];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_kodeAkses', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function editKodeAkses($id)
    {
        $data = [
            'kodeAkses' => $this->M_Admin->getKode($id)->row(),
            'showGraph' => null,
        ];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_editkodeAkses', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function updateKode()
    {
        $id = $this->input->post('id_kode');
        $data = [
            'password' => $this->input->post('kode'),
        ];
        $this->M_Admin->update('password_akses', $id, $data);
        redirect('admin/posyandu/kodeAkses');
    }

    public function jadwalPosyandu()
    {
        //fungsi default
        $jadwal = $this->Mjadwal->selectData();

        $data = ['showGraph' => null];

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $this->load->view('admin/posyandu_jadwal', [
            'data' => $jadwal, //model ke view
        ]);
        $this->load->view('admin/template/footer', $data);
    }

    public function tambahJadwal()
    {

        $data = ['showGraph' => null];

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data = [
            'data' => $this->Mjadwal->selectData(),
            'login' => $this->session->userdata(),
            'petugas' => $this->M_Admin->getAllPetugas()->result_array(),
            'wilayah' => $this->M_Admin->getAllWilayah(),
            'showGraph' => null, //model ke view
        ];
        $this->load->view('admin/posyandu_tambahJadwal', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function editJadwal($id)
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data = [
            'data' => $this->Mjadwal->selectData(),
            'current' => $this->M_Admin->getJadwal($id)->row(),
            'petugas' => $this->M_Admin->getAllPetugas()->result_array(),
            'wilayah' => $this->M_Admin->getAllWilayah(), //model ke view
        ];
        $this->load->view('admin/posyandu_ubahJadwal', $data);
        $this->load->view('admin/template/footer', $this->foot);
    }

    public function addJadwal()
    {
        $data = [
            'id_jadwal' => $this->input->post('id_jadwal'),
            'nama' => $this->input->post('nama_petugas'),
            'bln' => $this->input->post('bulan'),
            'thn' => $this->input->post('tahun'),
            'wilayah' => $this->input->post('wilayah'),
        ];
        $this->M_Admin->insert('jadwal', $data);
        redirect('admin/posyandu/jadwalPosyandu');
    }

    public function ubahJadwal()
    {
        $id = $this->input->post('id_jadwal');
        $data = [
            'nama' => $this->input->post('nama_petugas'),
            'bln' => $this->input->post('bulan'),
            'thn' => $this->input->post('tahun'),
            'wilayah' => $this->input->post('wilayah'),
        ];

        $this->M_Admin->update('jadwal', $id, $data);
        redirect('admin/posyandu/jadwalPosyandu');
    }

    public function deleteJadwal($id)
    {
        $this->M_Admin->delete('jadwal', ['id_jadwal' => $id]);
        redirect('admin/posyandu/jadwalPosyandu');
    }

    public function wilayahPosyandu()
    {
        //fungsi default
        $wilayah = $this->Wilayah_model->getAll();

        $data = ['showGraph' => null];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $this->load->view('admin/posyandu_wilayah', [
            'data' => $wilayah, //model ke view
        ]);
        $this->load->view('admin/template/footer', $data);
    }

    public function tambahWilayah()
    {
        $wilayah = $this->Wilayah_model->getAll();
        $data = ['showGraph' => null];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $this->load->view('admin/posyandu_tambahWilayah', [
            'data' => $wilayah, //model ke view
        ]);
        $this->load->view('admin/template/footer', $data);
    }

    public function addWilayah()
    {
        $data = [
            'nama_wilayah' => $this->input->post('nama_wilayah'),
            'kelurahan' => $this->input->post('kelurahan'),
            'rw' => $this->input->post('rw'),
            'rt' => $this->input->post('rt'),
            'nama_posyandu' => $this->input->post('nama_posyandu'),
        ];
        $this->M_Admin->insert('wilayah', $data);

        redirect('admin/posyandu/wilayahPosyandu');
    }

    public function editWilayah($id)
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data = [
            'data' => $this->Mjadwal->selectData(),
            'current' => $this->M_Admin->getwilayah($id)->row(),
            'petugas' => $this->M_Admin->getAllPetugas()->result_array(),
            'wilayah' => $this->M_Admin->getAllWilayah(), //model ke view
            'showGraph' => null,
        ];
        $this->load->view('admin/posyandu_ubahWilayah', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function ubahWilayah()
    {
        $id = $this->input->post('id_wilayah');
        $data = [
            'nama_wilayah' => $this->input->post('nama_wilayah'),
            'kelurahan' => $this->input->post('kelurahan'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'nama_posyandu' => $this->input->post('nama_posyandu'),
        ];

        $this->M_Admin->update('wilayah', $id, $data);
        redirect('admin/posyandu/wilayahPosyandu');
    }

    public function dataPetugas()
    {
        $petugas = $this->Mpetugas;
        $data['daftarpetugas'] = $this->db->get_where('petugas', array('status' => 'posyandu'))->result();

        $data['showGraph'] = null;

        $data['wilayah'] = $this->db->get('wilayah')->result();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $this->load->view('admin/posyandu_petugas', $data);
        $this->load->view('admin/template/footer', $data);
    }
    public function tambahPetugas()
    {
        $petugas = $this->Mpetugas->getAll();
        $data = ['showGraph' => null];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $this->load->view('admin/posyandu_tambahPetugas', [
            'data' => $petugas, //model ke view
        ]);
        $this->load->view('admin/template/footer', $data);
    }

    public function editPetugas($id)
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data["petugas"] = $this->Mpetugas->getById($id);

        $data["petugas"] = $this->Mpetugas->getById($id);

        $this->load->view('admin/posyandu_ubahPetugas', $data);
        $this->load->view('admin/template/footer', $this->foot);
    }

    public function deletePetugas($id = null, $tipe = "")
    {
        if (!isset($id)) {
            show_404();
        }

        if ($this->Mpetugas->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');

            if ($tipe == "puskesmas") {

                $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Petugas berhasil dihapus!</div>');

                redirect(site_url('admin/puskesmas/dataPetugas'));
            } else {
                redirect(site_url('admin/posyandu/dataPetugas'));
            }

        }
    }

    public function daftarPasien()
    {
        $data["pendaftaran"] = $this->M_Admin->getAllPasienPosyandu();
        $data["showGraph"] = null;
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_daftarPasien', $data);
        $this->load->view('admin/template/footer', $data);
    }
    public function tambahPendaftaran()
    {
        $data["pendaftaran"] = $this->M_Admin->getAllPasienPosyandu();
        $data = ['showGraph' => null];

        $data['wilayah'] = $this->db->get('wilayah')->result();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $this->load->view('admin/posyandu_tambahPendaftaran', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function editPendaftaran($id)
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data["pendaftaran"] = $this->Regisanak_model->getById($id);

        $data["pendaftaran"] = $this->Regisanak_model->getById($id);

        $this->load->view('admin/posyandu_ubahPendaftaran', $data);
        $this->load->view('admin/template/footer', $this->foot);
    }

    public function deletePendaftaran($id = null)
    {
        if (!isset($id)) {
            show_404();
        }

        $this->db->where('no_pasien', $id);
        $this->db->delete('regisanak');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Data berhasil dihapus!
		</div>');

        redirect('admin/posyandu/daftarPasien');

    }

    public function pencatatanMedis()
    {
        $data["pencatatan"] = $this->M_Admin->get_by_role_pencatatanMedis();
        // $data = ['showGraph' => null];
        $data['showGraph'] = null;
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_pencatatanMedis', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function tambahPencatatan1()
    {
        $data["pendaftaran"] = $this->M_Admin->getAllPasienPosyandu();
        $data["showGraph"] = null;

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_tambahPencatatan1', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function tambahPencatatan2($id)
    {

        $data["pencatatan"] = $this->M_Admin->getAllPasienPosyandu();

        $data = ['showGraph' => null];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data['pasien'] = $this->db->get_where('regisanak', ['no_pasien' => $id])->row_array();
        $data['kat_usia'] = $this->db->get('kategori_usia')->result();
        $data['imunisasi'] = $this->db->get('imunisasi')->result();
        $data['vitamin'] = $this->db->get('vitamin')->result();
        $data['obat_cacing'] = $this->db->get('obat_cacing')->result();
        $data['wilayah'] = $this->db->get('wilayah')->result();

        $this->load->view('admin/posyandu_tambahPencatatan2', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function editPencatatan($id)
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data["pencatatan"] = $this->Pencatatan_model->getById($id);

        $data['pasien'] = $this->Pencatatan_model->getNamaAnak($id)->row_array();
        $data['kat_usia'] = $this->db->get('kategori_usia')->result();
        $data['imunisasi'] = $this->db->get('imunisasi')->result();
        $data['vitamin'] = $this->db->get('vitamin')->result();
        $data['obat_cacing'] = $this->db->get('obat_cacing')->result();

        // $data["pencatatan"] = $this->Pencatatan_model->getById($id);

        $this->load->view('admin/posyandu_ubahPencatatan', $data);
        $this->load->view('admin/template/footer', $this->foot);
    }

    public function deletePencatatan($id = null)
    {
        if (!isset($id)) {
            show_404();
        }

        if ($this->pencatatan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('posyandu/pencatatan'));
        }
    }

    public function laporan()
    {
        $data["pendaftaran"] = $this->M_Admin->getAllLaporanPosyandu();

        $data['showGraph'] = 'posyandu';

        $this->db->distinct();
        $this->db->select('YEAR(tgl_daftar) AS tahun_daftar');
        $tahun = $this->db->get('regisanak')->result_array();
        
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $namaGrafik = ['Jumlah Pasien', 'Buku Posyandu', 'Jumlah Pemeriksaan Pasien'];
        $data['graph'] = $namaGrafik;

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $data['wilayah'] = $this->M_Admin->selectAllWilayah('wilayah');

        $bln = $this->input->post('bulan');
        $thn = $this->input->post('tahun');

        $tanggal = $thn . "-" . $bln;
        // if (isset($_POST['cari'])) {
        //     var_dump($tanggal);die();
        // }

        if (is_null($bln) && is_null($thn) || $bln == "" && $thn == "") {
            $data['graph1'] = $this->Regisanak_model->getDataGraph(1);
            $data['graph2'] = $this->Regisanak_model->getDataGraph(1);
            $data['graph3'] = $this->Regisanak_model->getDataGraph(2);
        } else{
            $data['graph1'] = $this->Regisanak_model->getDataGraph(1, $tanggal);
            $data['graph2'] = $this->Regisanak_model->getDataGraph(1, $tanggal);
            $data['graph3'] = $this->Regisanak_model->getDataGraph(2, $tanggal);
        }

        // if (!is_null($bln)) {
        //     $data['graph1'] = $this->Regisanak_model->getDataGraph(1, $bln);
        //     $data['graph2'] = $this->Regisanak_model->getDataGraph(1, $bln);
        //     $data['graph3'] = $this->Regisanak_model->getDataGraph(2, $bln);
        // } else {
        //     $data['graph1'] = $this->Regisanak_model->getDataGraph(1);
        //     $data['graph2'] = $this->Regisanak_model->getDataGraph(1);
        //     $data['graph3'] = $this->Regisanak_model->getDataGraph(2);
        // }

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_laporan', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function laporanDetail($id)
    {
        $data["pendaftaran"] = $this->M_Admin->getById($id);
        $data["pencatatan"] = $this->M_Admin->getJoinAll($id);
        $data['rujukans'] = $this->db->get_where('pasienrujukan',['nopasien' => $id])->result();
        $data["showGraph"] = null;

        // $data = ['showGraph' => null];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_laporanDetail', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function historyLaporan()
    {
        $data["history"] = $this->M_Admin->getAllHistoryPosyandu();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_historyLaporan', $data);
        $this->load->view('admin/template/footer', $this->foot);
    }

    public function pasienRujukan()
    {
        $data["pasienrujukans"] = $this->db->get_where('pasienrujukan', array('pasien_rujukan_dari' => 'Posyandu'))->result();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_pasienRujukan', $data);
        $this->load->view('admin/template/footer', $this->foot);
    }

    public function delete($id = null)
    {
        if (!isset($id)) {
            show_404();
        }

        if ($this->pasienrujukan_modelP->delete($id)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Berhasil!</strong> ID Rujukan ' . $id . ' Berhasil dihapus.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');
            redirect(site_url('admin/posyandu/pasienRujukan'));
        }
    }

    public function edit_form($id)
    {

        $data["pasienrujukans"] = $this->M_Admin->getAllPasienRujukan();
        $data = ['showGraph' => null];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data["pasienrujukan"] = $this->pasienrujukan_modelP->getById($id);

        $this->load->view('admin/posyandu_editRujukan', $data);
        $this->load->view('admin/template/footer', $data);

    }

    public function rujukan_edit_save($id = null)
    {
        if (!isset($id)) {
            redirect('puskesmas/pasienrujukan');
        }

        $pasienrujukan = $this->pasienrujukan_modelP;
        // $validation = $this->form_validation;
        // $validation->set_rules($bidan->rules());

        // var_dump($this->input->post());die;

        // $this->session->set_flashdata('error', 'Data gagal diedit');

        // if ($validation->run()) {
        $pasienrujukan->update();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> ID Rujukan ' . $id . ' Berhasil diedit.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>');

        // $this->session->set_flashdata('error');
        redirect(site_url('admin/posyandu/pasienRujukan'));
        // redirect(site_url('puskesmas/bidan_index'.$id));
        // }

        $data["pasienrujukan"] = $pasienrujukan->getById($id);
        if (!$data["pasienrujukan"]) {
            show_404();
        }

    }

    public function tambahRujukan1()
    {
        $data["pencatatan"] = $this->M_Admin->get_by_role_pencatatanMedis();
        // $data = ['showGraph' => null];
        $data['showGraph'] = null;

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_tambahRujukan1', $data);
        $this->load->view('admin/template/footer', $data);
    }
    public function tambahRujukan2($id)
    {
        $data["pasienrujukans"] = $this->M_Admin->getAllPasienRujukan();
        $data = ['showGraph' => null];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data['pencatatan'] = $this->M_Admin->getDataCatatAnak($id);

        $this->load->view('admin/posyandu_tambahRujukan2', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function editRujukan($id)
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data["pasienrujukans"] = $this->Regisanak_model->getById($id);

        $data["pasienrujukans"] = $this->Regisanak_model->getById($id);

        $this->load->view('admin/posyandu_ubahRujukan', $data);
        $this->load->view('admin/template/footer', $this->foot);
    }

    public function deleteRujukan($id = null)
    {
        if (!isset($id)) {
            show_404();
        }

        if ($this->Mpetugas->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('admin/posyandu_Pasienrujukan'));
        }
    }

    public function deleteWilayah($id_wilayah)
    {

        $this->db->where('id_wilayah', $id_wilayah);
        $this->db->delete('wilayah');
        // $this->Mjadwal->deleteMk($id_jadwal);
        redirect('admin/posyandu/wilayahPosyandu');
    }

    public function detailPasien($id)
    {

        $regisanak = $this->Regisanak_model;

        $data["pendaftaran"] = $regisanak->getById($id);

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_detailPasien', $data);
        $this->load->view('admin/template/footer', $this->foot);
    }

    public function kelolaKategori()
    {
        $data['kategoriUsia'] = $this->M_Admin->selectAll('kategori_usia')->result_array();
        $data['imunisasi'] = $this->M_Admin->selectAll('imunisasi')->result_array();
        $data['vitamin'] = $this->M_Admin->selectAll('vitamin')->result_array();
        $data['obatCacing'] = $this->M_Admin->selectAll('obat_cacing')->result_array();

        $data['showGraph'] = null;

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_KategoriMedis', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function getKategori($type, $id)
    {
        if ($type == 'kategoriUsia') {
            $data = $this->M_Admin->selectWhere('kategori_usia', ['id_usia' => $id])->row();
            echo json_encode($data);
        } elseif ($type == 'imunisasi') {
            $data = $this->M_Admin->selectWhere('imunisasi', ['id_imunisasi' => $id])->row();
            echo json_encode($data);
        } elseif ($type == 'vitamin') {
            $data = $this->M_Admin->selectWhere('vitamin', ['id_vitamin' => $id])->row();
            echo json_encode($data);
        } elseif ($type == 'obatCacing') {
            $data = $this->M_Admin->selectWhere('obat_cacing', ['id_obat' => $id])->row();
            echo json_encode($data);
        }

    }

    public function addKategori($type)
    {
        if ($type == 'kategoriUsia') {
            $data = [
                'usia' => $this->input->post('kategoriUsia'),
            ];

            $this->M_Admin->insert('kategori_usia', $data);
            redirect('admin/posyandu/kelolaKategori');
        } elseif ($type == 'imunisasi') {
            $data = [
                'imunisasi' => $this->input->post('jenisImunisasi'),
            ];

            $this->M_Admin->insert('imunisasi', $data);
            redirect('admin/posyandu/kelolaKategori');
        } elseif ($type == 'vitamin') {
            $data = [
                'vitamin' => $this->input->post('vitamin'),
            ];

            $this->M_Admin->insert('vitamin', $data);
            redirect('admin/posyandu/kelolaKategori');
        } elseif ($type == 'obatCacing') {
            $data = [
                'obatCacing' => $this->input->post('obatCacing'),
            ];

            $this->M_Admin->insert('obat_cacing', $data);
            redirect('admin/posyandu/kelolaKategori');
        }
    }

    public function editKategori($type, $id)
    {
        if ($type == 'kategoriUsia') {
            $data = [
                'usia' => $this->input->post('kategoriUsia'),
            ];
            $this->M_Admin->updatekategori('kategori_usia', ['id_usia' => $id], $data);
            redirect('admin/posyandu/kelolaKategori');
        } elseif ($type == 'imunisasi') {
            $data = [
                'imunisasi' => $this->input->post('jenisImunisasi'),
            ];
            $this->M_Admin->updatekategori('imunisasi', ['id_imunisasi' => $id], $data);
            redirect('admin/posyandu/kelolaKategori');
        } elseif ($type == 'vitamin') {
            $data = [
                'vitamin' => $this->input->post('vitamin'),
            ];
            $this->M_Admin->updatekategori('vitamin', ['id_vitamin' => $id], $data);
            redirect('admin/posyandu/kelolaKategori');
        } elseif ($type == 'obatCacing') {
            $data = [
                'obatCacing' => $this->input->post('obatCacing'),
            ];
            $this->M_Admin->updatekategori('obat_cacing', ['id_obat' => $id], $data);
            redirect('admin/posyandu/kelolaKategori');
        }
    }

    public function hapusKategori($type, $id)
    {
        if ($type == 'kategoriUsia') {
            $this->M_Admin->deleteKategori('kategori_usia', ['id_usia' => $id]);
            redirect('admin/posyandu/kelolaKategori');
        } elseif ($type == 'imunisasi') {
            $this->M_Admin->deleteKategori('imunisasi', ['id_imunisasi' => $id]);
            redirect('admin/posyandu/kelolaKategori');
        } elseif ($type == 'vitamin') {
            $this->M_Admin->deleteKategori('vitamin', ['id_vitamin' => $id]);
            redirect('admin/posyandu/kelolaKategori');
        } elseif ($type == 'obatCacing') {
            $this->M_Admin->deleteKategori('obat_cacing', ['id_obat' => $id]);
            redirect('admin/posyandu/kelolaKategori');
        }
    }

    public function add_data_pendaftar()
    {

        $data = [
            'no_pasien' => $this->input->post('no_pasien'),
            'id_wilayah' => $this->input->post('id_wilayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nama_anak' => $this->input->post('nama_anak'),
            'p_ibu' => $this->input->post('p_ibu'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'jk' => $this->input->post('jk'),
            'p_ayah' => $this->input->post('p_ayah'),
            'alamat' => $this->input->post('alamat'),
            'tgl_daftar' => $this->input->post('tgl_daftar'),
        ];

        $this->db->insert('regisanak', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Data berhasil ditambahkan! </div>');

        redirect('admin/posyandu/daftarPasien');

    }

    public function ubahPendaftaran()
    {
        $data = [
            'no_pasien' => $this->input->post('no_pasien'),
            // 'id_wilayah' => $this->input->post('id_wilayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nama_anak' => $this->input->post('nama_anak'),
            'p_ibu' => $this->input->post('p_ibu'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'jk' => $this->input->post('jk'),
            'p_ayah' => $this->input->post('p_ayah'),
            'alamat' => $this->input->post('alamat'),
            'tgl_daftar' => $this->input->post('tgl_daftar'),
        ];

        $this->db->update('regisanak', $data, array('no_pasien' => $this->input->post('no_pasien')));

        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Data berhasil diperbarui! </div>');

        redirect('admin/posyandu/daftarPasien');
    }

    public function addPencatatan_medis()
    {
        $pencatatan = $this->Pencatatan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pencatatan->rules());

        if ($validation->run()) {
            $pencatatan->save();

            $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Data berhasil ditambah! </div>');

            redirect('admin/posyandu/pencatatanMedis');
        } else {
            redirect('admin/posyandu/pencatatanMedis');
        }
    }

    public function ubahPencatatan()
    {
        $pencatatan = $this->Pencatatan_model;
        $pencatatan->update();

        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Data berhasil diubah! </div>');

        redirect('admin/posyandu/pencatatanMedis/');

    }

    public function addRujukan()
    {
        $pasienrujukan = $this->pasienrujukan_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($bidan->rules());

        // $this->session->set_flashdata('error', 'Data gagal ditambahkan');

        // if ($validation->run()) {
        $pasienrujukan->save();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Data berhasil ditambah! </div>');

        redirect('admin/posyandu/pasienRujukan');

    }
}