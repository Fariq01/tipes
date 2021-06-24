<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BookingModel extends CI_Model
{
    public function get_jadwal($data)
    {
        $this->db->select('penerbangan.id_penerbangan, id_kelas, nama as nama_maskapai, asal, tujuan, waktu_berangkat, harga');
        $this->db->from('penerbangan');
        $this->db->join('harga_kelas', 'harga_kelas.id_penerbangan = penerbangan.id_penerbangan');
        $this->db->join('user', 'user.id_user = penerbangan.id_user');

        $jumlah_penumpang = $data['jumlah_penumpang'];
        unset($data['jumlah_penumpang']);

        $this->db->where($data);
        $this->db->where('slot >= ', $jumlah_penumpang);

        return $this->db->get()->result_array();
    }

    public function insert_booking($data)
    {
        $data_booking = [
            'kode_booking' => $data['kode_booking'],
            'kode_bayar' => $data['kode_bayar'],
            'metode_pembayaran' => $data['metode_pembayaran'],
            'nama' => $data['nama_pemesan'],
            'email' => $data['email_pemesan'],
            'telepon' => $data['telepon_pemesan'],
            'total_harga' => $data['harga'] * $data['jumlah_penumpang'],
            'tanggal_pemesanan' => date("Y-m-d"),
            'status' => 'Menunggu Pembayaran'
        ];

        if (has_login()) {
            $data_booking['id_user'] = $this->session->userdata('id_user');
        }

        if ($this->db->insert('booking', $data_booking)) {
            $data_tiket = [
                'id_penerbangan' => $data['id_penerbangan'],
                'id_booking' => $this->db->insert_id(),
                'id_kelas' => $data['id_kelas'],
                'harga' => $data['harga'],
                'nama_penumpang' => $data['nama_penumpang'],
                'tanggal_lahir_penumpang' => $data['tanggal_lahir_penumpang'],
                'jumlah_penumpang' => $data['jumlah_penumpang']
            ];
            return $this->insert_tiket($data_tiket);
        } else {
            return false;
        }
    }

    private function insert_tiket($data)
    {
        try {
            $tiket = [
                'id_penerbangan' => $data['id_penerbangan'],
                'id_booking' => $data['id_booking'],
                'id_kelas' => $data['id_kelas'],
                'harga' => $data['harga']
            ];
            $kode_tiket =  $this->generate_kode_tiket();
            for ($i = 0; $i < $data['jumlah_penumpang']; $i++) {
                $tiket['kode_tiket'] = $kode_tiket . ($i + 1);
                $tiket['nama'] = $data['nama_penumpang'][$i];
                $tiket['tanggal_lahir'] = $data['tanggal_lahir_penumpang'][$i];
                $tiket['status'] = 'Menunggu Pembayaran';

                $this->db->insert('tiket', $tiket);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function generate_kode_booking()
    {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $kode = "BK";
        for ($i = 0; $i < 10; $i++) {
            $kode .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $kode;
    }

    public function generate_kode_bayar($metode_pembayaran)
    {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if ($metode_pembayaran == 'Virtual Account') {
            $kode = "VA";
            for ($i = 0; $i < 10; $i++) {
                $kode .= $chars[mt_rand(0, strlen($chars) - 1)];
            }
        } else {
            $kode = '337012345';
        }

        return $kode;
    }

    private function generate_kode_tiket()
    {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $kode = "TK";
        for ($i = 0; $i < 10; $i++) {
            $kode .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $kode;
    }

    public function get_booking($kode_booking)
    {
        $this->db->where('kode_booking', $kode_booking);
        return $this->db->get('booking')->row_array();
    }

    public function get_all_tiket($id_booking)
    {
        $this->db->from('tiket');
        $this->db->join('penerbangan', 'penerbangan.id_penerbangan = tiket.id_penerbangan');
        $this->db->join('kelas', 'kelas.id_kelas = tiket.id_kelas');
        $this->db->where('id_booking', $id_booking);
        return $this->db->get()->result_array();
    }

    public function get_all_booking()
    {
        return $this->db->get('booking')->result_array();
    }

    public function update_status_booking($id_booking)
    {
        $this->db->where('id_booking', $id_booking);
        if ($this->db->update('booking', array('status' => 'Lunas'))) {
            return $this->update_status_tiket($id_booking);
        } else {
            return false;
        }
    }

    public function update_status_tiket($id_booking)
    {
        $this->db->where('id_booking', $id_booking);
        $result = $this->db->get('tiket')->result_array();
        
        $id_penerbangan = $result[0]['id_penerbangan'];
        $count = count($result);

        $this->db->where('id_booking', $id_booking);
        
        if ($this->db->update('tiket', array('status' => 'Issued'))) {
            $this->db->where('id_penerbangan', $id_penerbangan);
            $this->db->set('slot', 'slot-'.$count, FALSE);
            
            return $this->db->update('penerbangan');
        } else {
            return false;
        }
    }

    public function get_booking_history($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->get('booking')->result_array();
    }
}
