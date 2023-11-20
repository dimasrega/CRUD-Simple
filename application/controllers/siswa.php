<?php

class siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function siswa()
    {
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $this->load->view('siswa/siswa', $data);
    }


    public function tambah()
    {

        $data['siswa'] = $this->db->get('siswa')->result_array();

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nisn', 'nisn', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('siswa/tambah', $data);
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'password' => $this->input->post('password'),
                'nisn' => $this->input->post('nisn'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->db->insert('siswa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Toko ditambah!</div>');
            redirect('siswa/siswa');
        }
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_siswa->hapus($where, 'toko');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Toko dihapus!</div>');
        redirect('siswa/siswa');
    }

    public function edit($id)
    {
        $data['siswa'] = $this->user_model->($id);

        $data = [
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'password' => $this->input->post('password'),
            'nisn' => $this->input->post('nisn'),
            'alamat' => $this->input->post('alamat')
        ];

        $this->M_siswa->edit($data);
        $this->load->view('siswa/edit' $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    edit berhasil.</div>');
        redirect('siswa/siswa');
    }
}
