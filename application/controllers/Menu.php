<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller

{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  //Data Roti
  public function roti()
  {
    $data['title'] = 'Data Roti';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->db->get('data_roti')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header_index', $data);
      $this->load->view('templates/sidebar_index', $data);
      $this->load->view('templates/topbar_index', $data);
      $this->load->view('menu/roti', $data);
      $this->load->view('templates/footer_index');
    } else {
      $this->db->insert('data_roti', ['name' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Jenis Roti Telah Ditambahkan! </div>');
      redirect('menu/roti');
    }
  }

  public function input()
  {
    $this->load->model('droti');
    $data['data_roti'] = $this->droti->getdroti('data_roti');
    $data['name'] = [];

    foreach ($data['data_roti'] as $db) {
      array_push($data['name'], $db['name']);
    }

    $data['name'] = array_unique($data['name']);

    $data['title'] = 'Input Data';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header_index', $data);
    $this->load->view('templates/sidebar_index', $data);
    $this->load->view('templates/topbar_index', $data);
    $this->load->view('menu/input', $data);
    $this->load->view('templates/footer_index');
  }

  public function delete($id)
  {
    $this->load->model('droti');
    $where = array('id' => $id);
    $this->droti->delete($where, 'data_roti');
    $this->session->set_flashdata('pesan1', '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
    Data Berhasil Dihapus
    </div>
    </div>');
    redirect('menu/roti');
  }

  public function edit($id)
  {
    $this->load->model('droti');
    $id = $this->input->post('id');
    $name = $this->input->post('name');

    $ArrEdit  = array(
      'id' => $id,
      'name' => $name,
    );

    $this->droti->EditRoti($ArrEdit);
    $this->session->set_flashdata('pesan2', '<div class="alert alert-warning d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
    Data Berhasil Diubah
    </div>
    </div>');
    redirect('menu/roti');
  }

  //input data
  public function tambahroti()
  {
    $this->load->model('droti');
    $jenisroti = $this->input->post('jenisroti');
    $tgl = $this->input->post('tgl');
    $datapenjualan = $this->input->post('datapenjualan');
    $datapersediaan = $this->input->post('datapersediaan');
    $dataproduksi = $this->input->post('dataproduksi');

    $ArrInsert  = array(
      'jenisroti' => $jenisroti,
      'tgl' => $tgl,
      'datapenjualan' => $datapenjualan,
      'datapersediaan' => $datapersediaan,
      'dataproduksi' => $dataproduksi
    );

    $this->dhistory->insertroti($ArrInsert);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <div>
          Data Berhasil Ditambah
        </div>
      </div>');
    redirect('menu/input');
  }
}
