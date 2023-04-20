<?php
class Grafik_model extends CI_Model
{

    function get_data_stok()
    {
        $query = $this->db->query("SELECT kas,SUM(p) AS p FROM nominal GROUP BY kas");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
