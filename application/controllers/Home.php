<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {
    
        public function index() {
            if ($this->session->userdata('id_role') == 1) {
                redirect('home/admin');
            } else if ($this->session->userdata('id_role') == 2) {
                redirect('home/maskapai');
            } else if ($this->session->userdata('id_role') == 3) {
                redirect('home/pemesan');
            } else {
                $this->load->view('home');
            }
        }
        
        public function admin() {
            if ($this->session->userdata('id_role') == 1) {
                $this->load->view('home_admin');
            } else {
                redirect('home');
            }
        }

        public function maskapai() {
            if ($this->session->userdata('id_role') == 2) {
                $this->load->view('home_maskapai');
            } else {
                redirect('home');
            }
        }

        public function pemesan() {
            if ($this->session->userdata('id_role') == 3) {
                $this->load->view('home_pemesan');
            } else {
                redirect('home');
            }
        }
    }

?>
