<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_model extends CI_Model
{
    public function getList()
    {
        $query = "SELECT db_add.* FROM db_add";
        return $this->db->query($query)->result_array();
    }

    public function getEdit($id_data)
    {
        $this->db->where('id_data', $id_data);
        return $this->db->get('db_add')->row_array();
    }
    

    public function deleteMatkul($id_data)
    {
        // Logika penghapusan berdasarkan $id_data
        $this->db->where('id_data', $id_data);
        $this->db->delete('db_add');
    }

    public function getListMateri()
    {
        $query = "SELECT db_materi.* FROM db_materi";
        return $this->db->query($query)->result_array();
    }

    public function deleteMateri($id_materi)
    {
        // Logika penghapusan berdasarkan $id_materi
        $this->db->where('id_materi', $id_materi);
        $this->db->delete('db_materi');
    }

    public function getEditMateri($id_materi)
    {
        $this->db->where('id_materi', $id_materi);
        return $this->db->get('db_materi')->row_array();
    }

    public function getCreate()
    {
        $query = "SELECT db_add.* FROM db_add";
        return $this->db->query($query)->result_array();
    }

    public function getCreateMateri()
    {
        $query = "SELECT db_materi.* FROM db_materi";
        return $this->db->query($query)->result_array();
    }

    public function getView($id_data)
    {
        $this->db->where('id_data', $id_data);
        return $this->db->get('db_add')->row_array();
    }

    public function getViewMateri($id_materi)
    {
        $this->db->where('id_materi', $id_materi);
        return $this->db->get('db_materi')->row_array();
    }
}
