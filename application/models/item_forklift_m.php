<?php
class Item_forklift_m extends CI_Model
{
    public function getItemCheck()
    {
        $where = array(
            'is_deleted = ' => 'N'
        );
        return $this->db->get_where('master_item_check', $where);
    }

    public function createForklift($params)
    {
        $this->db->insert('master_item_check', $params);
    }

    public function editForklift($id, $params)
    {
        $where = ['id' => $id];
        $this->db->where($where);
        $this->db->update('master_item_check', $params);
    }

    public function deleteForklift($id, $params)
    {
        $where = ['id' => $id];
        $this->db->where($where);
        $this->db->update('master_item_check', $params);
    }
}
