<?php defined('BASEPATH') or exit('No direct script access allowed');

class Puskesmas_model extends CI_Model
{
    public function getVerifyCode($role)
    {
        return $this->db
            ->get_where('password_akses', [
                'role' => $role,
            ])
            ->row_array();
    }
}