<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediksi extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Hasil Prediksi Jumlah Produksi Menggunakan Fuzzy Tsukamoto ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['hasil'] = $this->hasilprediksi->getdatapredik('hpredik');

        $this->load->view('templates/header_index', $data);
        $this->load->view('templates/sidebar_index', $data);
        $this->load->view('templates/topbar_index', $data);
        $this->load->view('prediksi/index', $data);
        $this->load->view('templates/footer_index');
    }
}
