<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_toko');
    }

    public function index()
    {

        $data['toko'] = $this->db->get('toko')->result_array();

        $this->form_validation->set_rules('nama_toko', 'nama_toko', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('toko', $data);
        } else {
            $data = [
                'nama_toko' => $this->input->post('nama_toko'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->db->insert('toko', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Toko ditambah!</div>');
            redirect('auth');
        }
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_toko->hapus($where, 'toko');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Toko dihapus!</div>');
        redirect('auth');
    }

    public function edit($id)
    {
        $data = [
            'id' => $id,
            "nama_toko" => $this->input->post('nama_toko'),
            "no_telp" => $this->input->post('no_telp'),
            "alamat" => $this->input->post('alamat')
        ];

        $this->M_toko->edit($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            edit berhasil.</div>');
        redirect('auth');
    }
}
