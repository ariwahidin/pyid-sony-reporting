<?php
class Transaction_m extends CI_Model
{
    public function getItemSubdist()
    {
        $user_id = $this->session->userdata('user_data')['user_id'];
        $this->db->select('*');
        $this->db->from('master_item_subdist');
        $this->db->where('CreatedBy', $user_id);
        return $this->db->get();
    }

    public function getCustomerSubdist()
    {
        $user_id = $this->session->userdata('user_data')['user_id'];
        $this->db->select('CustId, CardCode, CardName, Address, City, Phone');
        $this->db->from('master_customer');
        $this->db->where('created_by', $user_id);
        return $this->db->get();
    }

    public function createOrder($data)
    {
        $user_id = $this->session->userdata('user_data')['user_id'];
        $customer = $data['customerSelected'];
        $data_order_header = array(
            'custId' => $customer['CustId'],
            'custName' => $customer['CardName'],
            'custAddress' => $customer['Address'],
            'custCity' => $customer['City'],
            'custPhone' => $customer['Phone'],
            'Subtotal' => $data['subtotal'],
            'DiscPercent' => $data['discountPercent'],
            'DiscAmount' => $data['discount'],
            'GrandTotal' => $data['grandTotal'],
            'CreatedBy' => $user_id,
        );

        try {
            $this->db->trans_start();
            $this->db->insert('order_header', $data_order_header);

            if ($this->db->trans_status() === false) {
                throw new Exception($this->db->error()['message']);
            }

            $order_header_id = $this->db->insert_id();
            $data_order_detail = array();
            foreach ($data['order'] as $key => $val) {
                array_push(
                    $data_order_detail,
                    array(
                        'idOrder' => $order_header_id,
                        'itemCode' => $val['itemcode'],
                        'frgnName' => $val['frgnname'],
                        'itemName' => $val['itemname'],
                        'uom' => null,
                        'price' => $val['price'],
                        'qty' => $val['qty'],
                        'discItemPercent' => $val['disc'],
                        'discItemAmount' => null,
                        'total' => $val['total'],
                        'createdBy' => $user_id
                    )
                );
            }

            $this->db->insert_batch('order_detail', $data_order_detail);

            if ($this->db->trans_status() === false) {
                throw new Exception($this->db->error()['message']);
            }

            $this->db->trans_commit();
            return array('status' => 'success');

        } catch (Exception $e) {
            $this->db->trans_rollback(); // Batalkan transaksi jika terjadi kesalahan
            return array('status' => 'failed', 'error_message' => $e->getMessage());
        }
    }
}
