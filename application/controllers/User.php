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

            if ($this->UserModel->check_user($data)) {
                if ($this->UserModel->check_role($data['email'], 3)) {
                    $user = $this->UserModel->get_user($data['email']);
                    $this->session->set_userdata($user);
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
            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
            if ($this->form_validation->run() == false){
                $this->load->view('default/header', array('title' => 'Registrasi Pemesan'));
                $this->load->view('default/navbar');
                $this->load->view('pemesan/registrasi_pemesan');
                $this->load->view('default/footer');
			}
			else{
                $data = [
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                    'nama' => $this->input->post('nama', true),
                    'telepon' => $this->input->post('telepon', true),
                    'id_role' => 3,
                    'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                    'tanggal_registrasi' => date("Y-m-d"),
                ];
                if ($this->UserModel->insert_user($data)) {
                    $this->session->set_flashdata('success_message', 'Silahkan login!');
                    redirect('user/registrasi_pemesan');
                } else {
                    $this->session->set_flashdata('error_message', 'Registrasi gagal!');
                    redirect('user/registrasi_pemesan');
                }
            }
        }

        public function registrasi_admin() {
            if (!user_role(1)) {
                redirect('home');
            }

            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('telepon', 'Telepon', 'required');
            if ($this->form_validation->run() == false){
                $this->load->view('default/header', array('title' => 'Registrasi Admin'));
                $this->load->view('admin/navbar_admin');
                $this->load->view('admin/registrasi_admin');
                $this->load->view('default/footer');
            } else{
                $data = [
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                    'nama' => $this->input->post('nama', true),
                    'telepon' => $this->input->post('telepon', true),
                    'id_role' => 1,
                    'tanggal_registrasi' => date("Y-m-d")
                ];
                if ($this->UserModel->insert_user($data)) {
                    $this->session->set_flashdata('success_message', 'Silahkan login!');
                    redirect('user/registrasi_admin');
                } else {
                    $this->session->set_flashdata('error_message', 'Registrasi gagal!');
                    redirect('user/registrasi_admin');
                }
            }
        }

        public function registrasi_maskapai() {
            if (!user_role(1)) {
                redirect('home');
            }

            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('telepon', 'Telepon', 'required');
            if ($this->form_validation->run() == false){
                $this->load->view('default/header', array('title' => 'Regitrasi Maskapai'));
                // use admin navbar because maskapai registration page is inside admin website
                $this->load->view('admin/navbar_admin');
                $this->load->view('maskapai/registrasi_maskapai');
                $this->load->view('default/footer');
            } else{
                $data = [
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                    'nama' => $this->input->post('nama', true),
                    'telepon' => $this->input->post('telepon', true),
                    'id_role' => 2,
                    'tanggal_registrasi' => date("Y-m-d")
                ];
                if ($this->UserModel->insert_user($data)) {
                    $this->session->set_flashdata('success_message', 'Silahkan login!');
                    redirect('user/registrasi_maskapai');
                } else {
                    $this->session->set_flashdata('error_message', 'Registrasi gagal!');
                    redirect('user/registrasi_maskapai');
                }
            }
        }

        public function login_admin() {
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == false){
                $this->load->view('default/header', array('title' => 'Login Admin'));
                $this->load->view('admin/login_admin');
                $this->load->view('default/footer');
			}
			else{
                $data = [
                    'email' => $this->input->post('email', true),
                    'password' => $this->input->post('password', true)
                ];
    
                if ($this->UserModel->check_user($data)) {
                    if ($this->UserModel->check_role($data['email'], 1)) {
                        $user = $this->UserModel->get_user($data['email']);
                        $this->session->set_userdata($user);
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
                $this->load->view('default/header', array('title' => 'Login Maskapai'));
                $this->load->view('maskapai/login_maskapai');
                $this->load->view('default/footer');
			}
			else{
                $data = [
                    'email' => $this->input->post('email', true),
                    'password' => $this->input->post('password', true)
                ];
    
                if ($this->UserModel->check_user($data)) {
                    if ($this->UserModel->check_role($data['email'], 2)) {
                        $user = $this->UserModel->get_user($data['email']);
                        $this->session->set_userdata($user);
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