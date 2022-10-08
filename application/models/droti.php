<?php
defined('BASEPATH') or exit('No direct script access allowed');

class droti extends CI_Model
{
    public function getdroti($data_roti)
    {
        $data = $this->db->get($data_roti);
        return $data->result_array();
    }

    function insertjenisroti($data)
    {
        $this->db->insert('data_roti', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function EditRoti($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('data_roti', array_slice($data, 1));
    }
}
