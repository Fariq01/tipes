<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Booking extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->load->model('UserModel');
        }

        public function cek_booking() {

        }

        public function info_booking($id_booking) {
            
        }
    }
?>