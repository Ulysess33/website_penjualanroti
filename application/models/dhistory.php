<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dhistory extends CI_Model
{
    public function getdthistory($dthistory)
    {
        $data = $this->db->get($dthistory);
        return $data->result_array();
    }

    function insertroti($data)
    {
        $this->db->insert('data_history', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function editDataHistory($data)
    {
        $this->db->where('id_history', $data['id_history']);
        $this->db->update('data_history', $data);
    }
}
