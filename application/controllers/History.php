<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller

{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function datahistory()
  {
    $data['title'] = 'Data History';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['hasil'] = $this->dhistory->getdthistory('data_history');

    $data['jenisroti'] = $this->db->get('data_history')->result_array();

    $this->load->view('templates/header_index', $data);
    $this->load->view('templates/sidebar_index', $data);
    $this->load->view('templates/topbar_index', $data);
    $this->load->view('history/datahistory', $data);
    $this->load->view('templates/footer_index');
  }

  public function delete($id)
  {
    $this->load->model('dhistory');
    $where = array('id_history' => $id);
    $this->dthistory->delete($where, 'data_history');
    $this->session->set_flashdata('pesan1', '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data Berhasil Dihapus
        </div>
      </div>');
    redirect('History');
  }

  public function edit($id_history)
  {
    $this->load->model('dhistory');
    $jenisroti = $this->input->post('jenisroti');
    $tgl = $this->input->post('tgl');
    $datapenjualan = $this->input->post('datapenjualan');
    $datapersediaan = $this->input->post('datapersediaan');
    $dataproduksi = $this->input->post('dataproduksi');

    $ArrEdit  = array(
      'id_history' => $id_history,
      'jenisroti' => $jenisroti,
      'tgl' => $tgl,
      'datapenjualan' => $datapenjualan,
      'datapersediaan' => $datapersediaan,
      'dataproduksi' => $dataproduksi
    );

    $this->dhistory->editDataHistory($ArrEdit);
    $this->session->set_flashdata('pesan2', '<div class="alert alert-warning d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data Berhasil Diubah
        </div>
      </div>');
    redirect('History');
  }
}
