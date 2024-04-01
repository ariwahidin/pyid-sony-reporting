<?php
class Outbound_m extends CI_Model
{
    function createTask($params)
    {
        return $this->db->insert('tb_out_temp', $params);
    }

    public function getTaskByUser($post = null)
    {
        // if (isset($post['search'])) {
        //     if ($post['search'] != '') {
        //         $search = $post['search'];
        //         $this->db->like('no_sj', $search, 'both');
        //     }
        // }

        // if (isset($post['id'])) {
        //     if ($post['id'] != '') {
        //         $id = $post['id'];
        //         $this->db->where('a.id', $id);
        //     }
        // }

        $this->db->select('a.*, b.fullname as checker_name, c.name as ekspedisi_name, e.fullname as created_by_name');
        $this->db->from('tb_out_temp a');
        $this->db->join('master_user b', 'a.checker_id = b.id');
        $this->db->join('master_ekspedisi c', 'a.ekspedisi = c.id', 'left');
        $this->db->join('master_user e', 'a.created_by = e.id', 'left');

        if ($_SESSION['user_data']['role'] == 4) {
            $this->db->where('checker_id', userId());
        }

        return $this->db->get();
    }
}
