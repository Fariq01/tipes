<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookingModel');
    }

    public function info($kode_booking)
    {
        $data = $this->BookingModel->get_booking($kode_booking);
        if (!empty($data)) {
            $data['tiket'] = $this->BookingModel->get_all_tiket($data['id_booking']);

            $this->load->view('default/header', array('title' => 'Info Booking'));

            if (has_login()) {
                $this->load->view('pemesan/navbar_pemesan');
            } else {
                $this->load->view('default/navbar');
            }

            $this->load->view('booking/info', $data);
            $this->load->view('default/footer');
        } else {
            $this->session->set_flashdata('error_message', 'Info booking tidak dapat ditemukan!');
            redirect('booking/cek');
        }
    }

    public function cek()
    {
        $this->load->view('default/header', array('title' => 'Cek Booking'));
        if (has_login()) {
            $this->load->view('pemesan/navbar_pemesan');
        } else {
            $this->load->view('default/navbar');
        }
        $this->load->view('booking/cek');
        $this->load->view('default/footer');
    }

    public function jadwal()
    {
        $this->form_validation->set_rules('asal', 'Asal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('tanggal_berangkat', 'Tanggal Berangkat', 'required');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('jumlah_penumpang', 'Kelas', 'required');
        if ($this->form_validation->run() == false) {
            redirect('home');
        } else {
            $data = [
                'asal' => $this->input->post('asal', true),
                'tujuan' => $this->input->post('tujuan', true),
                'tanggal_berangkat' => $this->input->post('tanggal_berangkat', true),
                'id_kelas' => $this->input->post('id_kelas', true),
                'jumlah_penumpang' => $this->input->post('jumlah_penumpang', true),
            ];

            $jadwal = $this->BookingModel->get_jadwal($data);

            $this->load->view('default/header', array('title' => 'Jadwal Penerbangan'));
            if (has_login()) {
                $this->load->view('pemesan/navbar_pemesan');
            } else {
                $this->load->view('default/navbar');
            }
            $this->load->view('booking/jadwal', array('jadwal' => $jadwal, 'jumlah_penumpang' => $data['jumlah_penumpang']));
            $this->load->view('default/footer');
        }
    }

    public function detail()
    {
        $this->form_validation->set_rules('id_penerbangan', 'ID Penerbangan', 'required');
        $this->form_validation->set_rules('id_kelas', 'ID Kelas', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('jumlah_penumpang', 'Jumlah Penumpang', 'required');
        if ($this->form_validation->run() == false) {
            redirect('home');
        } else {
            $data = [
                'id_penerbangan' => $this->input->post('id_penerbangan', true),
                'id_kelas' => $this->input->post('id_kelas', true),
                'harga' => $this->input->post('harga', true),
                'jumlah_penumpang' => $this->input->post('jumlah_penumpang', true)
            ];
            $this->load->view('default/header', array('title' => 'Detail Booking'));
            if (has_login()) {
                $this->load->view('pemesan/navbar_pemesan');
            } else {
                $this->load->view('default/navbar');
            }
            $this->load->view('booking/detail', $data);
            $this->load->view('default/footer');
        }
    }

    public function pembayaran()
    {
        $this->form_validation->set_rules('nama_pemesan', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('email_pemesan', 'Email Pemesan', 'required');
        $this->form_validation->set_rules('telepon_pemesan', 'Telepon Pemesan', 'required');
        if ($this->form_validation->run() == false) {
            redirect('home');
        } else {
            $data = [
                'id_penerbangan' => $this->input->post('id_penerbangan', true),
                'id_kelas' => $this->input->post('id_kelas', true),
                'harga' => $this->input->post('harga', true),
                'jumlah_penumpang' => $this->input->post('jumlah_penumpang', true),
                'nama_pemesan' => $this->input->post('nama_pemesan', true),
                'email_pemesan' => $this->input->post('email_pemesan', true),
                'telepon_pemesan' => $this->input->post('telepon_pemesan', true),
                'nama_penumpang' => $this->input->post('nama_penumpang', true),
                'tanggal_lahir_penumpang' => $this->input->post('tanggal_lahir_penumpang', true)
            ];
            $this->load->view('default/header', array('title' => 'Metode Pembayaran'));
            if (has_login()) {
                $this->load->view('pemesan/navbar_pemesan');
            } else {
                $this->load->view('default/navbar');
            }
            $this->load->view('booking/pembayaran', $data);
            $this->load->view('default/footer');
        }
    }

    public function proses()
    {
        $this->form_validation->set_rules('metode_pembayaran', 'Metode Pembayaran', 'required');
        if ($this->form_validation->run() == false) {
            redirect('home');
        } else {
            $data = [
                'id_penerbangan' => $this->input->post('id_penerbangan', true),
                'id_kelas' => $this->input->post('id_kelas', true),
                'harga' => $this->input->post('harga', true),
                'jumlah_penumpang' => $this->input->post('jumlah_penumpang', true),
                'nama_pemesan' => $this->input->post('nama_pemesan', true),
                'email_pemesan' => $this->input->post('email_pemesan', true),
                'telepon_pemesan' => $this->input->post('telepon_pemesan', true),
                'nama_penumpang' => $this->input->post('nama_penumpang', true),
                'tanggal_lahir_penumpang' => $this->input->post('tanggal_lahir_penumpang', true),
                'metode_pembayaran' => $this->input->post('metode_pembayaran', true),
                'kode_booking' => $this->BookingModel->generate_kode_booking(),
                'kode_bayar' => $this->BookingModel->generate_kode_bayar($this->input->post('metode_pembayaran', true))

            ];
            if ($this->BookingModel->insert_booking($data)) {
                redirect('booking/info/' . $data['kode_booking']);
            } else {
                $this->session->set_flashdata('error_message', 'Booking gagal!');
                redirect('home');
            }
        }
    }

    public function list()
    {
        if (!user_role(1)) {
            redirect('home');
        }

        $json = array('data' => $this->BookingModel->get_all_booking());
        echo json_encode($json);
    }

    public function lunas($id_booking)
    {
        if (!user_role(1)) {
            redirect('home');
        }

        if ($this->BookingModel->update_status_booking($id_booking)) {
            $this->session->set_flashdata('success_message', 'Status Booking berhasil diganti!');
            redirect('home/admin');
        } else {
            $this->session->set_flashdata('error_message', 'Status Booking gagal diganti!');
            redirect('home/admin');
        }
    }

    public function history()
    {
        if (!user_role(3)) {
            redirect('home');
        }

        $this->load->view('default/header', array('title' => 'Booking History'));
        $this->load->view('pemesan/navbar_pemesan');
        $this->load->view('booking/history');
        $this->load->view('default/footer');
    }

    public function list_history() {
        if (!user_role(3)) {
            redirect('home');
        }

        $json = array('data' => $this->BookingModel->get_booking_history($this->session->userdata('id_user')));
        echo json_encode($json);
    }
}
