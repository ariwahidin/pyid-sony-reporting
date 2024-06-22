<?php
class Item_forklift_m extends CI_Model
{

    // Begin setup Datatable Server Side

    public $table = 'master_item_check a';
    public $column_order = array(null, 'a.name', 'a.desc'); //set column field database for datatable orderable
    public $column_search = array('a.name', 'a.desc'); //set column field database for datatable searchable 
    public $order = array('a.id' => 'desc'); // default order 


    private function _get_datatables_query()
    {
        $this->db->select('a.id, a.code, a.name, a.desc');
        $this->db->from($this->table);
        // $this->db->join('master_position b', 'a.position_id = b.id');
        $this->db->where('a.is_deleted', 'N');

        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {

            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        // Individual column search
        // foreach ($_POST['columns'] as $col => $data) {
        //     if (!empty($data['search']['value'])) {
        //         $this->db->like($this->column_search[$col], $data['search']['value']);
        //     }
        // }

        if (isset($_POST['order'])) {
            if ($_POST['order']['0']['column'] == '0') {
                $this->db->order_by('a.id', 'desc');
            } else {
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

        // var_dump($this->db->last_query());
    }


    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function count_all()
    {
        $this->db->from($this->table);
        $where = array(
            'is_deleted' => 'N'
        );
        $this->db->where($where);
        return $this->db->count_all_results();
    }

    // End setup Datatable Server Side










    public function getItemCheck($id = null)
    {
        $where = array(
            'is_deleted = ' => 'N'
        );

        if ($id != null) {
            $where['id'] = $id;
        }
        $this->db->order_by('id', 'desc');

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
