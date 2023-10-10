<?php defined('BASEPATH') or exit('No direct script access allowed');

class Master_m extends CI_Model
{
    public function master_subdist()
    {
        $sql = "select CardCode, CardName, Serviced_by, Address, Area from master_subdist";
        $query = $this->db->query($sql);
        return $query;
    }

    public function countAllCustomer()
    {
        $sql = "SELECT COUNT(*) AS total FROM master_customer";
        $query = $this->db->query($sql);
        return $query->row()->total;
    }


    public function master_customer($post)
    {
        $start = $post['start'];
        $length = $post['length'];

        $sql = "select CardName, Address, City, Phone
        from master_customer";

        if ($post['length'] != -1)
            $sql .= " limit $start, $length";
        $query = $this->db->query($sql);
        return $query;
    }
}
