<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Petugas_model");
        $this->load->model("Regisanak_model");
        $this->load->model("Pencatatan_model");
        
        if($this->Petugas_model->isNotLogin()) redirect(site_url('posyandu/PetugasPosiandu'));

    }

    public function index()
    {
        $this->Petugas_model->setWilayah();

        $tamp["jmlDaftar"] = $this->Regisanak_model->getCount();
        $tamp["jmlPencatatan"] = $this->Pencatatan_model->getCount();
        $tamp["jmlLaporan"] = $this->Pencatatan_model->getCountLaporan();
        $tamp["jmlHistory"] = $this->Pencatatan_model->getCountHistory();
        $tamp["cek"] = array();
        $bln = "";
        $tahun = gmdate("Y", time()+60*60*8);
        for ($i=0; $i <12 ; $i++) { 
            if ($i+1<=9) {
                $bln = "0".($i+1);                
            }else{
                $bln = ($i+1);
            }$cek = $this->Regisanak_model->getlike($tahun,$bln);
                $tamp["cek"][$i]=$cek[0]->jml;
                //echo $tamp["cek"][$i]."<br>";
        }

        $ubah = gmdate("Y-m-d", time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tahun = $pecah[0];

        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/dashboard',$tamp);
        $this->load->view('layout/foot.php');
    }

    public function dashboard()
    {        
        $tamp["jmlDaftar"] = $this->Regisanak_model->getCount();
        $tamp["jmlPencatatan"] = $this->Pencatatan_model->getCount();
        $tamp["jmlLaporan"] = $this->Pencatatan_model->getCountLaporan();
        $tamp["jmlHistory"] = $this->Pencatatan_model->getCountHistory();
        $tamp["cek"] = array();
        $bln = "";
        $tahun = gmdate("Y", time()+60*60*8);
        for ($i=0; $i <12 ; $i++) { 
            if ($i+1<=9) {
                $bln = "0".($i+1);                
            }else{
                $bln = ($i+1);
            }$cek = $this->Regisanak_model->getlike($tahun,$bln);
                $tamp["cek"][$i]=$cek[0]->jml;
                //echo $tamp["cek"][$i]."<br>";
        }
        $this->load->view('layout/posiandu/head.php');
        $this->load->view('posiandu/dashboard',$tamp);
        $this->load->view('layout/foot.php');
    }
}
