<?php defined('BASEPATH') or exit('No direct script access allowed');

class Master_m extends CI_Model
{
    public function master_subdist()
    {
        $sql = "select CardCode, CardName, Serviced_by, Address, Area from master_subdist";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getSubdistForUser()
    {
        $sql = "select CardCode, CardName from master_subdist
        where CardCode not in (select cardcode from master_user)";
        $query = $this->db->query($sql);
        return $query;
    }
}
