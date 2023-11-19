<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[user.email]',
            [

                'is_unique' => 'email ini sudah ada.'
            ]
        );
        $this->form_validation->set_rules('user_akses', 'user_akses', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('myform');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'user_akses' => 3,
            ];
            $this->db->insert('user', $data);
            redirect('auth');
        }
    }
}
