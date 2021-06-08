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
                if ($this->UserModel->checkRole($data['email'], 3)) {
                    $user = $this->UserModel->getUser($data['email']);
                    $this->session->set_userdata('id_user', $user['id_user']);
                    $this->session->set_userdata('email', $user['email']);
                    $this->session->set_userdata('nama', $user['nama']);
                    $this->session->set_userdata('telepon', $user['telepon']);
                    $this->session->set_userdata('alamat', $user['alamat']);
                    $this->session->set_userdata('tanggal_lahir', $user['tanggal_lahir']);
                    $this->session->set_userdata('id_role', $user['id_role']);
                    $this->session->set_userdata('nama_role', $user['nama_role']);
                    redirect('home/pemesan');
                } else {
                    $this->session->set_flashdata('error_message', 'Anda tidak bisa login di sini!');
                    redirect('home');
                }
                
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
                if ($this->UserModel->insertUser($data)) {
                    $this->session->set_flashdata('success_message', 'Silahkan login!');
                    redirect('user/registrasi_pemesan');
                } else {
                    $this->session->set_flashdata('error_message', 'Registrasi gagal!');
                    redirect('user/registrasi_pemesan');
                }
            }
        }

        public function registrasi_admin() {
            if ($this->session->userdata('id_role') != 1) {
                redirect('home');
            } else {
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('telepon', 'Telepon', 'required');
                if ($this->form_validation->run() == false){
                    $this->load->view('registrasi_admin');
                } else{
                    $data = [
                        'email' => $this->input->post('email', true),
                        'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                        'nama' => $this->input->post('nama', true),
                        'telepon' => $this->input->post('telepon', true),
                        'id_role' => 1,
                    ];
                    if ($this->UserModel->insertUser($data)) {
                        $this->session->set_flashdata('success_message', 'Silahkan login!');
                        redirect('user/registrasi_admin');
                    } else {
                        $this->session->set_flashdata('error_message', 'Registrasi gagal!');
                        redirect('user/registrasi_admin');
                    }
                }
            }
        }

        public function registrasi_maskapai() {
            if ($this->session->userdata('id_role') != 1) {
                redirect('home');
            } else {
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('telepon', 'Telepon', 'required');
                if ($this->form_validation->run() == false){
                    $this->load->view('registrasi_maskapai');
                } else{
                    $data = [
                        'email' => $this->input->post('email', true),
                        'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                        'nama' => $this->input->post('nama', true),
                        'telepon' => $this->input->post('telepon', true),
                        'id_role' => 2,
                    ];
                    if ($this->UserModel->insertUser($data)) {
                        $this->session->set_flashdata('success_message', 'Silahkan login!');
                        redirect('user/registrasi_maskapai');
                    } else {
                        $this->session->set_flashdata('error_message', 'Registrasi gagal!');
                        redirect('user/registrasi_maskapai');
                    }
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
                    'password' => $this->input->post('password', true)
                ];
    
                if ($this->UserModel->checkUser($data)) {
                    if ($this->UserModel->checkRole($data['email'], 1)) {
                        $user = $this->UserModel->getUser($data['email']);
                        $this->session->set_userdata('id_user', $user['id_user']);
                        $this->session->set_userdata('email', $user['email']);
                        $this->session->set_userdata('nama', $user['nama']);
                        $this->session->set_userdata('telepon', $user['telepon']);
                        $this->session->set_userdata('alamat', $user['alamat']);
                        $this->session->set_userdata('tanggal_lahir', $user['tanggal_lahir']);
                        $this->session->set_userdata('id_role', $user['id_role']);
                        $this->session->set_userdata('nama_role', $user['nama_role']);
                        redirect('home/admin');
                    } else {
                        $this->session->set_flashdata('error_message', 'Anda tidak bisa login di sini!');
                        redirect('user/login_admin');
                    }
                    
                } else {
                    $this->session->set_flashdata('error_message', 'Email/password salah!');
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
                    'password' => $this->input->post('password', true)
                ];
    
                if ($this->UserModel->checkUser($data)) {
                    if ($this->UserModel->checkRole($data['email'], 2)) {
                        $user = $this->UserModel->getUser($data['email']);
                        $this->session->set_userdata('id_user', $user['id_user']);
                        $this->session->set_userdata('email', $user['email']);
                        $this->session->set_userdata('nama', $user['nama']);
                        $this->session->set_userdata('telepon', $user['telepon']);
                        $this->session->set_userdata('alamat', $user['alamat']);
                        $this->session->set_userdata('tanggal_lahir', $user['tanggal_lahir']);
                        $this->session->set_userdata('id_role', $user['id_role']);
                        $this->session->set_userdata('nama_role', $user['nama_role']);
                        redirect('home/maskapai');
                    } else {
                        $this->session->set_flashdata('error_message', 'Anda tidak bisa login di sini!');
                        redirect('user/login_maskapai');
                    }
                    
                } else {
                    $this->session->set_flashdata('error_message', 'Email/password salah!');
                    redirect('user/login_maskapai');
                }
            }
        }

        public function logout() {
            $last_role = $this->session->userdata('id_role');
            $this->session->sess_destroy();
            if ($last_role == 1) {
                redirect('user/login_admin');
            } else if ($last_role == 2) {
                redirect('user/login_maskapai');
            } else {
                redirect('home');
            }
            
        }
    
    }
?>