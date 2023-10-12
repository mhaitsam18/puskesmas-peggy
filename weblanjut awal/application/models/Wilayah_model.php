<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah_model extends CI_Model
{
    private $_table = "wilayah";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_wilayah" => $id])->row();
    }
}