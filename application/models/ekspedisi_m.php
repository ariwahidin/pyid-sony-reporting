<?php
class Ekspedisi_m extends CI_Model
{
    public function getEkspedisi()
    {
        $where = array(
            'is_active != ' => 'N'
        );
        return $this->db->get_where('master_ekspedisi', $where);
    }

    public function createEkspedisi($params)
    {
        $this->db->insert('master_ekspedisi', $params);
    }

    public function editEkspedisi($id, $params)
    {
        $where = ['id' => $id];
        $this->db->where($where);
        $this->db->update('master_ekspedisi', $params);
    }

    public function deleteFactory($id, $params)
    {
        $where = ['id' => $id];
        $this->db->where($where);
        $this->db->update('master_ekspedisi', $params);
    }
}
