<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mrujukan extends CI_Model {

    public function selectData(){
        //menampilkan data keseluruhan
        return $this->db->get('pasienrujukan')->result();//mengkonversi data ke resault
      
    }
    public function insertMk(){
        $this->db->insert('pasienrujukan',[
            'id_rujukan'=>$this->input->post('id_rujukan'),
            'namapasien'=>$this->input->post('namapasien'),
            'umur'=>$this->input->post('umur'),
            'alamat'=>$this->input->post('alamat'),
            'nopasien'=>$this->input->post('nopasien'),
            'diagnosa'=>$this->input->post('diagnosa'),
            'rumahsakit'=>$this->input->post('rumahsakit')
        ]);
    }
    public function deleteMk($id_rujukan){
        $this->db->where('id_rujukan',$id_rujukan);
        $this->db->delete('pasienrujukan');
    }
    public function getMkByIdMk($id_rujukan){
        $this->db->where('id_rujukan',$id_rujukan);
        return $this->db->get('pasienrujukan')->row();//mengembalikan nilai getmkbyidmk 
    }
    public function updateMk(){
        $this->db->where('id_rujukan',$this->input->post('id_rujukan'));
        $this->db->update('pasienrujukan',[
            'id_rujukan'=>$this->input->post('id_rujukan'),
            'namapasien'=>$this->input->post('namapasien'),
            'umur'=>$this->input->post('umur'),
            'alamat'=>$this->input->post('alamat'),
            'nopasien'=>$this->input->post('nopasien'),
            'diagnosa'=>$this->input->post('diagnosa'),
            'rumahsakit'=>$this->input->post('rumahsakit')
        ]);
    }




}
