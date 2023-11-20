<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('siswa', $data);
    }

    public function hapus($where, $siswa)
    {
        $this->db->where($where);
        $this->db->delete($siswa);
    }
}
