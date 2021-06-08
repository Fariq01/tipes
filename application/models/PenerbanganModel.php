<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class PenerbanganModel extends CI_Model {

        public function getAll($id_user) {
            $this->db->from('penerbangan');
            $this->db->where('id_user', $id_user);
            return $this->db->get()->result_array();
        }

        public function get($id_penerbangan) {
            $this->db->from('penerbangan');
            $this->db->where('id_penerbangan', $id_penerbangan);
            return $this->db->get()->row_array();
        }

        public function insert($data) {
            return $this->db->insert('penerbangan', $data);
        }

        public function edit($data, $id_penerbangan) {
            $this->db->where('id_penerbangan', $id_penerbangan);
            return $this->db->update('penerbangan', $data);
        }
    }
?>