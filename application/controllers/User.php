<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->load->model('UserModel');
        }

        public function login() {
            $data = [
                'username' => $this->input->post('email', true),
                'password' => $this->input->post('password', true)
            ];

            if ($this->Account_model->checkUser($data)) {
                $account = $this->UserModel->getUser($data['email']);
                $this->session->set_userdata('email', $account['email']);
                redirect('home');
            } else {
                $this->session->set_flashdata('error_message', 'Email/password salah!');
                redirect('home');
            }
        }

        public function register() {
            $data = [
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                'nama' => $this->input->post('nama', true),
                'telepom' => $this->input->post('telepon', true),
                'alamat' => $this->input->post('alamat', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            ];
            if ($this->UserModel->inserUsert($data)) {
                $this->session->set_flashdata('success_message', 'Silahkan login!');
                redirect('user/register');
            } else {
                $this->session->set_flashdata('error_message', 'Registrasi gagal!');
                redirect('user/register');
            }
        }
    
    }

?>
