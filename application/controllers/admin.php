<?php

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['kandidat'] = $this->db->get('kandidat')->result_array();

        $this->load->view('admin/admin', $data);
    }
}
