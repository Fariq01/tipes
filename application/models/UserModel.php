<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Account_model extends CI_Model {

        public function checkPassword($email, $password) {
            $this->db->where('email', $email);
            $this->db->select('password');
            $hash = $this->db->get('user')->row()->password;
            return password_verify($password, $hash);
        }
        
        public function checkAccount($data) {
            if (!$this->checkEmail($data['email'])) {
                return false;
            }
            return $this->checkPassword($data['email'], $data['password']);
        }

        public function checkEmail($email) {
            $this->db->where('email', $email);
            if ($this->db->get('user')->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function getUser($email) {
            $this->db->where('email', $email);
            return $this->db->get('user')->row_array();
        }

        public function insertUser($data) {
            return $this->db->insert('user', $data);
        }

    }
