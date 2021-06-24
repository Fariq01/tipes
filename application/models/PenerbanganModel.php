<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class PenerbanganModel extends CI_Model {

        public function get_all($id_user) {
            $this->db->from('penerbangan');
            $this->db->where('id_user', $id_user);
            return $this->db->get()->result_array();
        }

        public function get($id_penerbangan) {
            $this->db->from('penerbangan');
            $this->db->where('id_penerbangan', $id_penerbangan);
            $result = $this->db->get()->row_array();
            $result['harga'] = $this->get_harga($id_penerbangan);
            return $result;
        }

        public function insert($data, $harga) {
            if($this->db->insert('penerbangan', $data)) {
                $id_penerbangan = $this->db->insert_id();
                return $this->insert_harga($id_penerbangan, $harga);
            } else {
                return false;
            }
        }

        private function insert_harga($id_penerbangan, $harga) {
            if (!$this->db->insert('harga_kelas', array('id_penerbangan' => $id_penerbangan, 'id_kelas' => 1, 'harga' => $harga['harga_economy']))) {
                return false;
            }
            
            if (!$this->db->insert('harga_kelas', array('id_penerbangan' => $id_penerbangan, 'id_kelas' => 2, 'harga' => $harga['harga_business']))) {
                return false;
            }    

            if (!$this->db->insert('harga_kelas', array('id_penerbangan' => $id_penerbangan, 'id_kelas' => 3, 'harga' => $harga['harga_firstclass']))) {
                return false;
            }    

            return true;
        }

        public function edit($id_penerbangan, $data, $harga) {
            $this->db->where('id_penerbangan', $id_penerbangan);
            if($this->db->update('penerbangan', $data)) {
                return $this->edit_harga($id_penerbangan, $harga);
            } else {
                return false;
            }
        }

        private function edit_harga($id_penerbangan, $harga) {
            $this->db->where(array('id_penerbangan' => $id_penerbangan, 'id_kelas' => 1));
            if (!$this->db->update('harga_kelas', array('harga' => $harga['harga_economy']))) {
                return false;
            }
            
            $this->db->where(array('id_penerbangan' => $id_penerbangan, 'id_kelas' => 2));
            if (!$this->db->update('harga_kelas', array('harga' => $harga['harga_business']))) {
                return false;
            }

            $this->db->where(array('id_penerbangan' => $id_penerbangan, 'id_kelas' => 3));
            if (!$this->db->update('harga_kelas', array('harga' => $harga['harga_firstclass']))) {
                return false;
            }

            return true;
        }

        public function get_jadwal($data) {
            $this->db->from('penerbangan');
            $this->db->where('asal', $data['asal']);
            $this->db->where('tujuan', $data['tujuan']);
            $this->db->where('tanngal_berangkat', $data['tanggal_berangkat']);

            return $this->db->get()->result_array();
        }

        private function get_harga($id_penerbangan) {
            $harga['harga_economy'] = $this->db->get_where('harga_kelas', array('id_penerbangan' => $id_penerbangan, 'id_kelas' => 1))->row_array()['harga'];
            $harga['harga_business'] = $this->db->get_where('harga_kelas', array('id_penerbangan' => $id_penerbangan, 'id_kelas' => 2))->row_array()['harga'];
            $harga['harga_firstclass'] = $this->db->get_where('harga_kelas', array('id_penerbangan' => $id_penerbangan, 'id_kelas' => 3))->row_array()['harga'];
            return $harga;
        }
    }
?>