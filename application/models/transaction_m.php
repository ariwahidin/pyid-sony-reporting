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
    
    public function getCustomerSubdist(){
        $user_id = $this->session->userdata('user_data')['user_id'];
        $this->db->select('CardCode, CardName, Address, City, Phone');
        $this->db->from('master_customer');
        $this->db->where('created_by', $user_id);
        return $this->db->get();
    }
}