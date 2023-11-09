<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_toko extends CI_Model
{
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('toko', $data);
    }

    public function hapus($where, $toko)
    {
        $this->db->where($where);
        $this->db->delete($toko);
    }
}
