<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class UserModel extends CI_Model {

        private function check_password($email, $password) {
            $this->db->where('email', $email);
            $this->db->select('password');
            $hash = $this->db->get('user')->row()->password;
            return password_verify($password, $hash);
        }
        
        public function check_user($data) {
            if (!$this->check_email($data['email'])) {
                return false;
            }
            return $this->check_password($data['email'], $data['password']);
        }

        private function check_email($email) {
            $this->db->where('email', $email);
            if ($this->db->get('user')->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function get_user($email) {
            $this->db->from('user');
            $this->db->join('role', 'role.id_role = user.id_role');
            $this->db->where('email', $email);
            return $this->db->get()->row_array();
        }

        public function insert_user($data) {
            return $this->db->insert('user', $data);
        }

        public function check_role($email, $id_role) {
            $this->db->select('id_role');
            $this->db->where('email', $email);
            $row =  $this->db->get('user')->row_array();

            if ($row['id_role'] == $id_role) {
                return true;
            } else {
                return false;
            }
        }

    }
