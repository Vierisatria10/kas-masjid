<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function get_data()
    {
        return $this->db->get('user')->result_array();
    }

    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }
}
