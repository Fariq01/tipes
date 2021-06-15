<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Penerbangan extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            if (!user_role(2)) {
                redirect('home');
            }
            $this->load->model('PenerbanganModel');
        }

        public function lihat($id_penerbangan) {
            $data = $this->PenerbanganModel->get($id_penerbangan);
            $this->load->view('default/header', array('title' => 'Data Penerbangan'));
            $this->load->view('maskapai/navbar_maskapai');
            $this->load->view('penerbangan/lihat_penerbangan', $data);
            $this->load->view('default/footer');
        }

        public function tambah() {
            $this->form_validation->set_rules('kode_pesawat', 'Kode Pesawat', 'required');
            $this->form_validation->set_rules('asal', 'Asal', 'required');
            $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
            $this->form_validation->set_rules('tanggal_berangkat', 'Tanggal Berangkat', 'required');
            $this->form_validation->set_rules('waktu_berangkat', 'Waktu Berangkat', 'required');
            $this->form_validation->set_rules('slot_economy', 'Slot Economy', 'required');
            $this->form_validation->set_rules('slot_business', 'Slot Business', 'required');
            $this->form_validation->set_rules('slot_firstclass', 'Slot First Class', 'required');
            if ($this->form_validation->run() == false){
                $this->load->view('default/header', array('title' => 'Tambah Penerbangan'));
                $this->load->view('maskapai/navbar_maskapai');
                $this->load->view('penerbangan/tambah_penerbangan');
                $this->load->view('default/footer');
			}
			else{
                $data = [
                    'id_user' => $this->session->userdata('id_user'),
                    'kode_pesawat' => $this->input->post('kode_pesawat', true),
                    'asal' => $this->input->post('asal', true),
                    'tujuan' => $this->input->post('tujuan', true),
                    'tanggal_berangkat' => $this->input->post('tanggal_berangkat', true),
                    'waktu_berangkat' => $this->input->post('waktu_berangkat', true),
                    'slot_economy' => $this->input->post('slot_economy', true),
                    'slot_business' => $this->input->post('slot_business', true),
                    'slot_firstclass' => $this->input->post('slot_firstclass', true)
                ];
    
                if ($this->PenerbanganModel->insert($data)) {
                    $this->session->set_flashdata('success_message', 'Penerbangan berhasil ditambahkan!');
                    redirect('penerbangan/tambah');
                } else {
                    $this->session->set_flashdata('error_message', 'Penerbangan gagal ditambahkan!');
                    redirect('penerbangan/tambah');
                }
            }
        }

        public function edit() {
            $this->form_validation->set_rules('kode_pesawat', 'Kode Pesawat', 'required');
            $this->form_validation->set_rules('asal', 'Asal', 'required');
            $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
            $this->form_validation->set_rules('tanggal_berangkat', 'Tanggal Berangkat', 'required');
            $this->form_validation->set_rules('waktu_berangkat', 'Waktu Berangkat', 'required');
            $this->form_validation->set_rules('slot', 'Slot', 'required');
            if ($this->form_validation->run() == false){
                redirect('home/maskapai');
			}
			else{
                $data = [
                    'kode_pesawat' => $this->input->post('kode_pesawat', true),
                    'asal' => $this->input->post('asal', true),
                    'tujuan' => $this->input->post('tujuan', true),
                    'tanggal_berangkat' => $this->input->post('tanggal_berangkat', true),
                    'waktu_berangkat' => $this->input->post('waktu_berangkat', true),
                    'slot' => $this->input->post('slot', true)
                ];

                $id_penerbangan = $this->input->post('id_penerbangan', true);

                if ($this->PenerbanganModel->edit($data, $id_penerbangan)) {
                    $this->session->set_flashdata('success_message', 'Penerbangan berhasil diedit!');
                    redirect('penerbangan/edit');
                } else {
                    $this->session->set_flashdata('error_message', 'Penerbangan gagal diedit!');
                    redirect('penerbangan/edit');
                }
            }
        }

        public function list() {
            $id_user = $this->session->userdata('id_user');
            $json = array('data' => $this->PenerbanganModel->get_all($id_user));
            echo json_encode($json);
        }
    }
?>