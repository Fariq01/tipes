<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {
    
        public function index() {
            if (user_role(1)) {
                redirect('home/admin');
            } else if (user_role(2)) {
                redirect('home/maskapai');
            } else if (user_role(3)) {
                redirect('home/pemesan');
            } else {
                $this->load->view('default/header', array('title' => 'Home Tipes'));
                $this->load->view('default/navbar');
                $this->load->view('default/home');
                $this->load->view('default/footer');  
            }
        }
        
        public function admin() {
            if (user_role(1)) {
                $this->load->view('default/header', array('title' => 'Home Admin'));
                $this->load->view('admin/navbar_admin');
                $this->load->view('admin/home_admin');
                $this->load->view('default/footer');  
            } else {
                redirect('home');
            }
        }

        public function maskapai() {
            if (user_role(2)) {
                $this->load->view('default/header', array('title' => 'Home Maskapai'));
                $this->load->view('maskapai/navbar_maskapai');
                $this->load->view('maskapai/home_maskapai');
                $this->load->view('default/footer');
            } else {
                redirect('home');
            }
        }

        public function pemesan() {
            if (user_role(3)) {
                $this->load->view('default/header', array('title' => 'Home Pemesan'));
                $this->load->view('pemesan/navbar_pemesan');
                // Use default cause still the same
                $this->load->view('default/home');
                $this->load->view('default/footer'); 
            } else {
                redirect('home');
            }
        }
    }

?>
