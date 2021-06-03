<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->load->model('UserModel');
        }

        public function login_pemesan() {
            $data = [
                'email' => $this->input->post('email', true),
                'password' => $this->input->post('password', true)
            ];

            if ($this->UserModel->checkUser($data)) {
                $user = $this->UserModel->getUser($data['email']);
                $this->session->set_userdata('id_user', $user['id_user']);
                $this->session->set_userdata('email', $user['email']);
                $this->session->set_userdata('nama', $user['nama']);
                $this->session->set_userdata('telepon', $user['telepon']);
                $this->session->set_userdata('alamat', $user['alamat']);
                $this->session->set_userdata('tanggal_lahir', $user['tanggal_lahir']);
                redirect('home');
            } else {
                $this->session->set_flashdata('error_message', 'Email/password salah!');
                redirect('home');
            }
        }


        public function registrasi_pemesan() {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('telepon', 'Telepon', 'required');
            if ($this->form_validation->run() == false){
                $this->load->view('registrasi_pemesan');
			}
			else{
                $data = [
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                    'nama' => $this->input->post('nama', true),
                    'telepon' => $this->input->post('telepon', true),
                    'id_role' => 3,
                ];
                if ($this->UserModel->inserUsert($data)) {
                    $this->session->set_flashdata('success_message', 'Silahkan login!');
                    redirect('user/registrasi_pemesan');
                } else {
                    $this->session->set_flashdata('error_message', 'Registrasi gagal!');
                    redirect('user/registrasi_pemesan');
                }
            }
        }

        public function login_admin() {
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == false){
                $this->load->view('login_admin');
			}
			else{
                $data = [
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                    'nama' => $this->input->post('nama', true),
                    'telepon' => $this->input->post('telepon', true),
                ];
                if ($this->UserModel->inserUsert($data)) {
                    $this->session->set_flashdata('success_message', 'Silahkan login!');
                    redirect('user/login_admin');
                } else {
                    $this->session->set_flashdata('error_message', 'Registrasi gagal!');
                    redirect('user/login_admin');
                }
            }
        }

        public function login_maskapai() {
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == false){
                $this->load->view('login_maskapai');
			}
			else{
                $data = [
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                    'nama' => $this->input->post('nama', true),
                    'telepon' => $this->input->post('telepon', true),
                ];
                if ($this->UserModel->inserUsert($data)) {
                    $this->session->set_flashdata('success_message', 'Silahkan login!');
                    redirect('user/login_maskapai');
                } else {
                    $this->session->set_flashdata('error_message', 'Registrasi gagal!');
                    redirect('user/login_maskapai');
                }
            }
        }
    
    }

?>
