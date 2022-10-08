<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Informasi Prediksi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_index', $data);
        $this->load->view('templates/sidebar_index', $data);
        $this->load->view('templates/topbar_index', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer_index');
    }
}
