<?php
class Forklift_m extends CI_Model
{
    public function getForklift()
    {
        $where = array(
            'is_deleted = ' => 'N'
        );
        return $this->db->get_where('master_forklift', $where);
    }

    public function createForklift($params)
    {
        $this->db->insert('master_forklift', $params);
    }

    public function editForklift($id, $params)
    {
        $where = ['id' => $id];
        $this->db->where($where);
        $this->db->update('master_forklift', $params);
    }

    public function deleteForklift($id, $params)
    {
        $where = ['id' => $id];
        $this->db->where($where);
        $this->db->update('master_forklift', $params);
    }
}
