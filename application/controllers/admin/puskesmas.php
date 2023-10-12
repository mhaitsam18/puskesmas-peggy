<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Puskesmas extends CI_Controller
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
        $this->load->model('ibuhamil_model');
        $this->load->model('pemeriksaan_model');
        $this->load->model("pasienrujukan_modelP");

        if ($this->Petugas_model->isNotLogin()) {
            redirect(site_url('posyandu/PetugasPosiandu'));
        }

        $this->data['showGraph'] = null;
        $this->load->library('form_validation');

    }

    public function index()
    {
        // $this->Petugas_model->setWilayah();
        $data['ibu'] = $this->ibuhamil_model->countAllData();
        $data['pemeriksaan'] = $this->pemeriksaan_model->countAllData();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas', $data);
        $this->load->view('admin/template/footer', $this->data);
    }

    // public function kodeAkses()
    // {
    //     $data = [
    //         'kodeAkses' => $this->M_Admin->getKodeAkses('Puskesmas')->result(),
    //     ];
    //     $this->load->view('admin/template/header');
    //     $this->load->view('admin/template/sidebar');
    //     $this->load->view('admin/puskesmas_kodeAkses', $data);
    //     $this->load->view('admin/template/footer', $this->data);
    // }

    public function editKodeAkses($id)
    {
        $data = [
            'kodeAkses' => $this->M_Admin->getKode($id)->row(),
        ];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_editkodeAkses', $data);
        $this->load->view('admin/template/footer', $this->data);
    }

    public function updateKode()
    {
        $id = $this->input->post('id_kode');
        $data = [
            'password' => $this->input->post('kode'),
        ];
        $this->M_Admin->update('password_akses', $id, $data);
        redirect('admin/puskesmas/kodeAkses');
    }

    public function ibuHamil()
    {
        $data['ibuhamil'] = $this->ibuhamil_model->getAll();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_ibuHamil', $data);
        $this->load->view('admin/template/footer', $this->data);

    }

    public function tambahIbuhamil()
    {
        // $data["ibuhamil"] = $this->Ibuhamil_model->getAll();
        $data['showGraph'] = null;
        $data['pekerjaan_pasien'] = $this->db->get_where('pekerjaan', ['tipe' => 'pasien'])->result_array();
        $data['pekerjaan_suami'] = $this->db->get_where('pekerjaan', ['tipe' => 'suami'])->result_array();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $this->load->view('admin/puskesmas_tambahIbu', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function prosesUmur($tgl_lahir)
    {
        $birthDate = new DateTime($tgl_lahir);
        $today = new DateTime("today");
        $data['umur'] = $today->diff($birthDate)->y;
        $this->load->view('admin/umur', $data);

    }

    public function tambahRujukan1()
    {

        $pemeriksaan = $this->pemeriksaan_model;

        $data['pemeriksaans'] = $pemeriksaan->getAll();

        // $data["pencatatan"] = $this->M_Admin->get_by_role_pencatatanMedis();
        // $data = ['showGraph' => null];
        $data['showGraph'] = null;

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_tambahRujukan1', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function tambahRujukan2($id)
    {
        // $data["pasienrujukans"] = $this->M_Admin->getAllPasienRujukan();
        $data = ['showGraph' => null];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data['pencatatan'] = $this->pemeriksaan_model->getAllByIdPemeriksaan($id);

        $this->load->view('admin/puskesmas_tambahRujukan2', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function edit_form($id)
    {

        $data["pasienrujukans"] = $this->M_Admin->getAllPasienRujukan();
        $data = ['showGraph' => null];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data["pasienrujukan"] = $this->pasienrujukan_modelP->getById($id);

        $this->load->view('admin/puskesmas_editRujukan', $data);
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
        redirect(site_url('admin/puskesmas/pasienRujukan'));
        // redirect(site_url('puskesmas/bidan_index'.$id));
        // }

        $data["pasienrujukan"] = $pasienrujukan->getById($id);
        if (!$data["pasienrujukan"]) {
            show_404();
        }

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

        redirect('admin/puskesmas/pasienRujukan');

    }

    public function addIbuHamil()
    {
        $ibuhamil = $this->ibuhamil_model;
        $validation = $this->form_validation;
        $validation->set_rules($ibuhamil->rules());

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show" role="alert">Data gagal ditambahkan!
		</div>');

        if ($validation->run()) {
            $ibuhamil->save();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Data berhasil ditambahkan!
			</div>');
            // $this->session->set_flashdata('error');
        }

        redirect('admin/puskesmas/ibuHamil');
    }

    public function editIbuhamil($id)
    {

        $data['showGraph'] = null;
        $data['ibuhamil'] = $this->ibuhamil_model->getById($id);
        // $data["ibuhamil"] = $this->Ibuhamil_model->getById($id);
        $data['pekerjaan_pasien'] = $this->db->get_where('pekerjaan', ['tipe' => 'pasien'])->result_array();
        $data['pekerjaan_suami'] = $this->db->get_where('pekerjaan', ['tipe' => 'suami'])->result_array();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_editIbu', $data);
        $this->load->view('admin/template/footer');
    }

    public function ibuhamil_save_update($id = null)
    {
        $data['showGraph'] = null;

        // if (!isset($id)) {
        //     redirect('puskesmas/ibuhamil');
        // }

        $ibuhamil = $this->ibuhamil_model;
        $validation = $this->form_validation;
        $validation->set_rules($ibuhamil->rules());

        // var_dump($this->input->post());die;

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show" role="alert">Data gagal diedit!
		</div>');

        if ($validation->run()) {
            $ibuhamil->update();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Data sukses diedit!
		</div>');

            // $this->session->set_flashdata('error');
            // redirect(site_url('puskesmas/ibuhamil/'.$id));
            redirect('admin/puskesmas/ibuHamil');
        }

        $data['ibuhamil'] = $ibuhamil->getById($id);
        if (!$data['ibuhamil']) {
            show_404();
        }

        redirect('admin/puskesmas/ibuHamil');

    }

    public function deleteIbuhamil($id = null)
    {
        if (!isset($id)) {
            show_404();
        }

        if ($this->ibuhamil_model->delete($id)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Data berhasil dihapus!
			</div>');
            redirect(site_url('admin/puskesmas/ibuHamil'));
        }
    }

    public function pemeriksaanIbuHamil()
    {
        $pemeriksaan = $this->pemeriksaan_model;

        $data['pemeriksaans'] = $pemeriksaan->getAll();

        $data['showGraph'] = null;

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_pemeriksaanIbuHamil', $data);
        $this->load->view('admin/template/footer');
    }

    public function deletePemeriksaan($id)
    {

        $this->db->delete('pemeriksaan', ['id_pemeriksaan' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> Data pemeriksaan ' . $id . ' berhasil dihapus.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');

        redirect('admin/puskesmas/pemeriksaanIbuHamil');

    }

    public function tambahPemeriksaan1()
    {
        $data['ibuhamil'] = $this->ibuhamil_model->getAll();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_tambahPemeriksaan1', $data);
        $this->load->view('admin/template/footer', $this->data);
    }

    public function tambahPemeriksaan2($id = null)
    {
        // $data["pemeriksaan"] = $this->Pemeriksaan_model->getAll();

        $data = ['showGraph' => null];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data['pemeriksaan_ibuhamil'] = $this->ibuhamil_model->getIbuHamilAndPemeriksaan($id);
        $data['last_pemeriksaan'] = $this->ibuhamil_model->getCountPemeriksaan();

        $data['letakBayi'] = $this->ibuhamil_model->getAllKategori("Letak Bayi");
        $data['hb'] = $this->ibuhamil_model->getAllKategori("HB");
        $data['pembayaran'] = $this->ibuhamil_model->getAllKategori("Jenis Pembayaran");
        $data['count'] = $this->pemeriksaan_model->getId();
        $data['pemeriksaan'] = $this->ibuhamil_model->getById($id);

        $this->load->view('admin/puskesmas_tambahPemeriksaan2', $data);

        // $this->load->view('admin/puskesmas_tambahPemeriksaan2', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function add_pemeriksaan()
    {
        $pemeriksaan = $this->pemeriksaan_model;

        $pemeriksaan->save2();
        $this->session->set_flashdata('success', 'Berhasil ditambahkan');
        $this->session->set_flashdata('error');

        $id_pemeriksaan = $this->input->post('id_pemeriksaan');

        redirect('admin/puskesmas/add_diagnosa/' . $id_pemeriksaan);
    }

    public function add_diagnosa($id_pemeriksaan)
    {

        $data = ['showGraph' => null];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data['pemeriksaan_pasien'] = $this->ibuhamil_model->getIbuHamilAndPemeriksaan2($id_pemeriksaan);
        $data['pembayaran'] = $this->ibuhamil_model->getAllKategori("Jenis Pembayaran");

        $this->load->view('admin/puskesmas_addDiagnosaPembayaran', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function add_pemeriksaan2()
    {

        $id_pemeriksaan = $this->input->post('id_pemeriksaan');
        $hbsag = $this->input->post('hbsag');
        $hiv = $this->input->post('hiv');
        $sypilis = $this->input->post('sypilis');
        $sypilis = $this->input->post('sypilis');
        $pembayaran = $this->input->post('pembayaran');

        $data = [
            'hbsag' => $hbsag,
            'hiv' => $hiv,
            'sypilis' => $sypilis,
            'pembayaran' => $pembayaran,
        ];

        $this->db->update('pemeriksaan', $data, "id_pemeriksaan = $id_pemeriksaan");

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> Data pemeriksaan berhasil ditambahkan.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');

        redirect('admin/puskesmas/pemeriksaanIbuHamil');

    }

    public function editPemeriksaan($id)
    {

        $data['letakBayi'] = $this->ibuhamil_model->getAllKategori("Letak Bayi");
        $data['hb'] = $this->ibuhamil_model->getAllKategori("HB");
        $data['pembayaran'] = $this->ibuhamil_model->getAllKategori("Jenis Pembayaran");
        $data['count'] = $this->pemeriksaan_model->getId();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data["pemeriksaan"] = $this->pemeriksaan_model->getById($id);
        $data["showGraph"] = null;

        $this->load->view('admin/puskesmas_editPemeriksaan', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function pasienRujukan()
    {

        $data["pasienrujukans"] = $this->pasienrujukan_modelP->get_where(array('pasien_rujukan_dari' => 'Puskesmas'));

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_dataPasienRujukan', $data);
        $this->load->view('admin/template/footer', $this->data);
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
            redirect(site_url('admin/puskesmas/pasienRujukan'));
        }
    }

    public function dataPetugas()
    {

        $petugas = $this->Mpetugas;

        $data['daftarpetugas'] = $this->db->get_where('petugas', array('status' => 'puskesmas'))->result();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_dataPetugas', $data);
        $this->load->view('admin/template/footer', $this->data);
    }
    public function editPetugas($id)
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data['showGraph'] = null;

        $data["petugas"] = $this->Mpetugas->getById($id);

        $data["petugas"] = $this->Mpetugas->getById($id);

        $this->load->view('admin/posyandu_ubahPetugas', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function tambahDataPetugas($tipe)
    {

        $petugas = $this->Petugas_model;

        $email = $this->input->post('email');

        $cek_email = $petugas->getPetugasPuskesmasByEmail($email);

        if ($cek_email) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show" role="alert">Email sudah ada, silahkan gunakan email yang lain!</div>');

            redirect('admin/' . $tipe . '/dataPetugas');
        } else {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time(),
            ];

            $digits = 6;
            $password_login = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

            $data = [
                'username' => $this->input->post('email'),
                'nama' => $this->input->post('nama_lengkap'),
                'foto' => 'default.jpg',
                'password' => $password_login,
                'status' => $tipe,
                'id_wilayah' => $this->input->post('id_wilayah'),
                'status_aktif' => 0,
            ];

            $this->db->insert('petugas', $data);

            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify', $password_login, $tipe);

            $this->session->set_userdata('sesi_verify', true);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Berhasil ditambahkan dan email aktivasi telah dikirim!</div>');

            redirect('admin/' . $tipe . '/dataPetugas');

        }

    }

    private function _sendEmail($token, $type, $password_login, $tipe_role)
    {
        $this->load->library('email');
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'rezaayu613@gmail.com',
            'smtp_pass' => 'Telkom!!',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);
        $this->email->from('rezaayu613@gmail.com', 'Admin App');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');

            if ($tipe_role == "puskesmas") {
                $this->email->message(
                    'click this link to verify your account : <a href="' .
                    base_url() .
                    'puskesmas/Login/verifikasi?email=' .
                    $this->input->post('email') .
                    '&token=' .
                    urlencode($token) .
                    '">Activate</a> <br> password login is ' . $password_login
                );
            } else {
                $this->email->message(
                    'click this link to verify your account : <a href="' .
                    base_url() .
                    'posyandu/PetugasPosiandu/verify?email=' .
                    $this->input->post('email') .
                    '&token=' .
                    urlencode($token) .
                    '">Activate</a> <br> password login is ' . $password_login
                );
            }

        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }

    public function ubahPetugas()
    {

        $id_petugas = $this->input->post('id_petugas');
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $foto = $this->input->post('foto');
        $status = $this->input->post('status');

        $filee = "";
        if ($_FILES['file']['name']) {
            $filee = $this->_uploadFile($id_petugas);
        } else {
            $filee = $this->input->post('foto_lama');
        }

        $data = [
            'id_petugas' => $id_petugas,
            'username' => $username,
            'nama' => $nama,
            'foto' => $filee,
            'status' => $status,
        ];

        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">Data berhasil disimpan!</div>');

        $this->db->update('petugas', $data, array('id_petugas' => $id_petugas));

        redirect('admin/puskesmas/editPetugas/' . $id_petugas);

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

    private function _uploadFile($id = null)
    {

        $namaFiles = $_FILES['file']['name'];
        $ukuranFile = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $eror = $_FILES['file']['error'];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['file']['tmp_name'];
        // $nama_folder = "assets_user/file_upload/";
        // $file_baru = $nama_folder . basename($nama_file);

        // if ((($type == "video/mp4") || ($type == "video/3gpp")) && ($ukuranFile < 8000000)) {

        //   move_uploaded_file($tmpName, $file_baru);
        //   return $file_baru;
        // }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show" role="alert">Yang kamu upload bukan gambar!</div>');

            redirect('admin/puskesmas/editPetugas/' . $id);
            return false;
        }

        $namaFilesBaru = uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'upload/petugas_posyandu/' . $namaFilesBaru);

        return $namaFilesBaru;
    }

    public function laporanPuskesmas()
    {

        $data['ibuhamils'] = $this->ibuhamil_model->getAll();
        $this->db->distinct();
        $this->db->select('YEAR(tanggal_daftar) AS tahun_daftar');
        $tahun = $this->db->get('ibuhamil')->result_array();
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $namaGrafik = ['Jumlah Pasien', 'Buku KIA', 'Jumlah Pemeriksaan Pasien'];
        $data['graph'] = $namaGrafik;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['wilayah'] = $this->ibuhamil_model->getWilayah();
        $data['showGraph'] = "puskesmas";

        $bln = $this->input->post('bulan');
        $thn = $this->input->post('tahun');

        $tanggal = $thn . "-" . $bln;

        if (is_null($bln) && is_null($thn) || $bln == "" && $thn == "") {
            $data['graph1'] = $this->ibuhamil_model->getDataGraph(1);
            $data['graph2'] = $this->ibuhamil_model->getDataGraph(1);
            $data['graph3'] = $this->ibuhamil_model->getDataGraph(2);
        } else {
            $data['graph1'] = $this->ibuhamil_model->getDataGraph(1, $tanggal);
            $data['graph2'] = $this->ibuhamil_model->getDataGraph(1, $tanggal);
            $data['graph3'] = $this->ibuhamil_model->getDataGraph(2, $tanggal);
        }

        // if (!is_null($bln)) {
        //     $data['graph1'] = $this->ibuhamil_model->getDataGraph(1, $bln);
        //     $data['graph2'] = $this->ibuhamil_model->getDataGraph(1, $bln);
        //     $data['graph3'] = $this->ibuhamil_model->getDataGraph(2, $bln);
        // } else {
        //     $data['graph1'] = $this->ibuhamil_model->getDataGraph(1);
        //     $data['graph2'] = $this->ibuhamil_model->getDataGraph(1);
        //     $data['graph3'] = $this->ibuhamil_model->getDataGraph(2);
        // }

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_laporan', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function laporanDetail($id)
    {
        $data['ibuhamil'] = $this->ibuhamil_model->getById($id);
        $data['pemeriksaans'] = $this->pemeriksaan_model->getDataPemeriksaanPasien($id);
        $data['rujukans'] = $this->db->get_where('pasienrujukan',['nopasien' => $id])->result();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_laporanDetail', $data);
        $this->load->view('admin/template/footer', $this->data);
    }

    public function kelolaKategori()
    {
        $data['jenisBayar'] = $this->M_Admin->selectAll('jenis_pembayaran', null)->result_array();
        $data['kondisihb'] = $this->M_Admin->selectAll('kondisi_hb', null)->result_array();
        $data['letakbayi'] = $this->M_Admin->selectAll('letak_bayi', null)->result_array();
        $data['Psuami'] = $this->M_Admin->selectAll('pekerjaan', 'suami')->result_array();
        $data['Ppasien'] = $this->M_Admin->selectAll('pekerjaan', 'pasien')->result_array();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_kelolaKategori', $data);
        $this->load->view('admin/template/footer', $this->data);
    }

    public function kelolaPekerjaan()
    {
        $data['Psuami'] = $this->M_Admin->selectAll('pekerjaan', 'suami')->result_array();
        $data['Ppasien'] = $this->M_Admin->selectAll('pekerjaan', 'pasien')->result_array();
        $data['pekerjaan'] = $this->db->get('pekerjaan')->result_array();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_kelolaPekerjaan', $data);
        $this->load->view('admin/template/footer', $this->data);
    }

    public function addPekerjaan()
    {
        $this->db->insert('pekerjaan', [
            'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
            'tipe' => $this->input->post('tipe')
        ]);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
        redirect('admin/puskesmas/kelolaPekerjaan/');
    }
    public function updatePekerjaan()
    {
        $this->db->where('id_pekerjaan', $this->input->post('id_pekerjaan'));
        $this->db->update('pekerjaan', [
            'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
            'tipe' => $this->input->post('tipe')
        ]);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
        redirect('admin/puskesmas/kelolaPekerjaan/');
    }

    public function deletePekerjaan($id_pekerjaan = 0)
    {
        $this->db->delete('pekerjaan', ['id_pekerjaan' => $id_pekerjaan]);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('admin/puskesmas/kelolaPekerjaan/');
    }

    public function getKategori($type, $id)
    {
        if ($type == 'jenisBayar') {
            $data = $this->M_Admin->selectWhere('jenis_pembayaran', ['id_jenis' => $id])->row();
            echo json_encode($data);
        } elseif ($type == 'kondisiHb') {
            $data = $this->M_Admin->selectWhere('kondisi_hb', ['id_hb' => $id])->row();
            echo json_encode($data);
        } elseif ($type == 'letakBayi') {
            $data = $this->M_Admin->selectWhere('letak_bayi', ['id_letak' => $id])->row();
            echo json_encode($data);
        } elseif ($type == 'pekerjaan') {
            $data = $this->M_Admin->selectWhere('pekerjaan', ['id_pekerjaan' => $id])->row();
            echo json_encode($data);
        }
    }

    public function addkategori($type)
    {
        if ($type == 'jenisPembayaran') {
            $data = [
                'pembayaran' => $this->input->post('jenisPembayaran'),
            ];

            $this->M_Admin->insert('jenis_pembayaran', $data);
            redirect('admin/puskesmas/kelolaKategori');
        } elseif ($type == 'kondisiHB') {
            $data = [
                'kondisiHb' => $this->input->post('kondisiHB'),
            ];

            $this->M_Admin->insert('kondisi_hb', $data);
            redirect('admin/puskesmas/kelolaKategori');
        } elseif ($type == 'letakBayi') {
            $data = [
                'letakBayi' => $this->input->post('letakBayi'),
            ];
            $this->M_Admin->insert('letak_bayi', $data);
            redirect('admin/puskesmas/kelolaKategori');
        } elseif ($type == 'pekerjaan') {
            $data = [
                'nama_pekerjaan' => $this->input->post('pekerjaan'),
                'tipe' => $this->input->post('tipe'),
            ];
            $this->M_Admin->insert('pekerjaan', $data);
            redirect('admin/puskesmas/kelolaKategori');
        }
    }

    public function editkategori($type, $id)
    {
        if ($type == 'jenisBayar') {
            $data = [
                'pembayaran' => $this->input->post('jenisPembayaran'),
            ];
            $this->M_Admin->updatekategori('jenis_pembayaran', ['id_jenis' => $id], $data);
            redirect('admin/puskesmas/kelolaKategori');
        } elseif ($type == 'kondisiHb') {
            $data = [
                'kondisiHb' => $this->input->post('kondisiHB'),
            ];
            $this->M_Admin->updatekategori('kondisi_hb', ['id_hb' => $id], $data);
            redirect('admin/puskesmas/kelolaKategori');
        } elseif ($type == 'letakBayi') {
            $data = [
                'letakBayi' => $this->input->post('letakBayi'),
            ];
            $this->M_Admin->updatekategori('letak_bayi', ['id_letak' => $id], $data);
            redirect('admin/puskesmas/kelolaKategori');
        } elseif ($type == 'pekerjaan') {
            $data = [
                'nama_pekerjaan' => $this->input->post('pekerjaan'),
            ];
            $this->M_Admin->updatekategori('pekerjaan', ['id_pekerjaan' => $id], $data);
            redirect('admin/puskesmas/kelolaKategori');
        }
    }

    public function hapusKategori($type, $id)
    {
        if ($type == 'jenisBayar') {
            $this->M_Admin->deleteKategori('jenis_pembayaran', ['id_jenis' => $id]);
            redirect('admin/puskesmas/kelolaKategori');
        } elseif ($type == 'kondisiHb') {
            $this->M_Admin->deleteKategori('kondisi_hb', ['id_hb' => $id]);
            redirect('admin/puskesmas/kelolaKategori');
        } elseif ($type == 'letakBayi') {
            $this->M_Admin->deleteKategori('letak_bayi', ['id_letak' => $id]);
            redirect('admin/puskesmas/kelolaKategori');
        } elseif ($type == 'pekerjaan') {
            $this->M_Admin->deleteKategori('pekerjaan', ['id_pekerjaan' => $id]);
            redirect('admin/puskesmas/kelolaKategori');
        }
    }

    public function edit_save_pemeriksaan()
    {

        // $validation = $this->form_validation;

        // var_dump($this->input->post());die;

        $pemeriksaan_id = $this->input->post('id_pemeriksaan');

        $data = [
            'id_pemeriksaan' => $this->input->post('id_pemeriksaan'),
            'id_pasien' => $this->input->post('id_pasien'),
            'id_petugas' => $this->input->post('id_petugas'),
            'tgl_periksa' => $this->input->post('tgl_periksa'),
            'gravida' => $this->input->post('gravida'),
            'partes' => $this->input->post('partes'),
            'abortus' => $this->input->post('abortus'),
            'jarak_kehamilan' => $this->input->post('jarak_kehamilan'),
            'usia_kehamilan' => $this->input->post('usia_kehamilan'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'lila' => $this->input->post('lila'),
            'sistol' => $this->input->post('sistol'),
            'diastol' => $this->input->post('diastol'),
            'tetanus_toksoid' => $this->input->post('tetanus_toksoid'),
            'fe' => $this->input->post('fe'),
            'tfu' => $this->input->post('tfu'),
            'letak_bayi' => $this->input->post('letak_bayi'),
            'detak_jantung' => $this->input->post('detak_jantung'),
            'hpht' => $this->input->post('hpht'),
            'tp' => $this->input->post('tp'),
            'hb' => $this->input->post('hb'),
            'namaobat' => $this->input->post('namaobat'),
            'tindakanmedis' => $this->input->post('tindakanmedis'),
        ];

        $this->db->update('pemeriksaan', $data, array('id_pemeriksaan' => $pemeriksaan_id));

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> data pemeriksaan berhasil diubah.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>');

        // redirect(site_url('puskesmas/ibuhamil/pemeriksaan/edit/'.$id));
        redirect('admin/puskesmas/editPemeriksaan/' . $pemeriksaan_id);
    }

    public function edit_save_diagnosis()
    {
        $id_pemeriksaan = $this->input->post('id_pemeriksaan');
        $hbsag = $this->input->post('hbsag');
        $hiv = $this->input->post('hiv');
        $sypilis = $this->input->post('sypilis');

        $data = [
            'hbsag' => $hbsag,
            'hiv' => $hiv,
            'sypilis' => $sypilis,
        ];

        $this->db->update('pemeriksaan', $data, "id_pemeriksaan = $id_pemeriksaan");

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> data pemeriksaan berhasil diubah.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>');

        // redirect(site_url('puskesmas/ibuhamil/pemeriksaan/edit/'.$id));
        redirect('admin/puskesmas/editPemeriksaan/' . $id_pemeriksaan);
    }

    public function edit_save_pembayaran()
    {
        $id_pemeriksaan = $this->input->post('id_pemeriksaan');
        $pembayaran = $this->input->post('pembayaran');

        // var_dump($pembayaran);die();

        $data = [
            'pembayaran' => $pembayaran,
        ];

        $this->db->update('pemeriksaan', $data, "id_pemeriksaan = $id_pemeriksaan");

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> data pemeriksaan berhasil diubah.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>');

        // redirect(site_url('puskesmas/ibuhamil/pemeriksaan/edit/'.$id));
        redirect('admin/puskesmas/editPemeriksaan/' . $id_pemeriksaan);

    }
}