<?php
class Transaction_m extends CI_Model
{
    public function getItemSubdist(){
        $user_id = $this->session->userdata('user_data')['user_id'];
        $this->db->select('*');
        $this->db->from('master_item_subdist');
        $this->db->where('CreatedBy', $user_id);
        return $this->db->get();
    }
}