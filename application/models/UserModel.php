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
            $this->db->join('user_role', 'user_role.id_user = user.id_user');
            $this->db->join('role', 'role.id_role = user_role.id_role');
            $this->db->where('email', $email);
            return $this->db->get()->row_array();
        }

        public function insert_user($data) {
            $id_role = $data['id_role'];
            unset($data['id_role']);
            if ($this->db->insert('user', $data)) {
                return $this->insert_user_role($this->db->insert_id(), $id_role);
            } else {
                return false;
            }
        }

        public function check_role($email, $id_role) {
            $this->db->from('user');
            $this->db->join('user_role', 'user_role.id_user = user.id_user');
            $this->db->where('email', $email);
            $row =  $this->db->get()->row_array();

            if ($row['id_role'] == $id_role) {
                return true;
            } else {
                return false;
            }
        }

        private function insert_user_role($id_user, $id_role) {
            return $this->db->insert('user_role', array('id_user' => $id_user, 'id_role' => $id_role));
        }

    }
