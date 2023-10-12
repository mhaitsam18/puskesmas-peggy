<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mreza extends CI_Model {

    public function selectData(){
        //menampilkan data keseluruhan
        return $this->db->get('reza')->result();//mengkonversi data ke resault
      
    }

}