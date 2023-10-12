<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mjadwal extends CI_Model {

    public function selectData(){
        //menampilkan data keseluruhan
        return $this->db->get('jadwal')->result();//mengkonversi data ke resault
      
    }
    public function insertMk(){
        $this->db->insert('jadwal',[
            'id_jadwal'=>$this->input->post('id_jadwal'),
            'nama'=>$this->input->post('nama'),
            'bln'=>$this->input->post('bln'),
            'thn'=>$this->input->post('thn'),
            'wilayah'=>$this->input->post('wilayah')
        ]);
    }
    public function deleteMk($id_jadwal){
        $this->db->where('id_jadwal',$id_jadwal);
        $this->db->delete('jadwal');
    }
    public function getMkByIdMk($id_jadwal){
        $this->db->where('id_jadwal',$id_jadwal);
        return $this->db->get('jadwal')->row();//mengembalikan nilai getmkbyidmk 
    }
    public function updateMk(){
        $this->db->where('id_jadwal',$this->input->post('id_jadwal'));
        $this->db->update('jadwal',[
            'id_jadwal'=>$this->input->post('id_jadwal'),
            'nama'=>$this->input->post('nama'),
            'bln'=>$this->input->post('bln'),
            'thn'=>$this->input->post('thn'),
            'wilayah'=>$this->input->post('wilayah')
        ]);
    }




}
