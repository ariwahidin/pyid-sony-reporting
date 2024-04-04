<?php
class Maintenance_m extends CI_Model
{
    public function createActivity($post)
    {

        $params_h = array(
            'id_forklift' => $post['forklift'],
            'hour_start' => $post['meter_start'],
            'hour_end' => $post['meter_finish'],
            'created_at' => currentDateTime(),
            'created_by' => userId()
        );

        $this->db->insert('activity_h', $params_h);

        if ($this->db->affected_rows() > 0) {
            $id_activity = $this->db->insert_id();
            $params_d = array();
            $desc = array();

            foreach ($post as $key => $val) {
                $array = array();
                if (is_int($key)) {
                    $array['id_activity'] = $id_activity;
                    $array['id_item_check'] = $key;
                    $array['is_good'] = $val;
                    $array['created_at'] = currentDateTime();
                    $array['created_by'] = userId();
                    array_push($params_d, $array);
                }

                if (strpos($key, "desc") !== false) {
                    $desc[] = $val;
                }
            }

            foreach ($params_d as $key => $val) {
                $params_d[$key]['desc'] = $desc[$key];
            }


            $this->db->insert_batch('activity_d',  $params_d);
        }
    }


    public function editActivity($post)
    {
        $id = $post['id_task'];
        $params_h = array(
            'id_forklift' => $post['forklift'],
            'hour_start' => $post['meter_start'],
            'hour_end' => $post['meter_finish'],
            'updated_at' => currentDateTime(),
            'updated_by' => userId()
        );


        $this->db->where(['id' => $id]);
        $this->db->update('activity_h', $params_h);

        if ($this->db->affected_rows() > 0) {

            $this->db->where(['id_activity' => $id]);
            $this->db->delete('activity_d');

            if ($this->db->affected_rows() > 0) {
                $params_d = array();
                $desc = array();

                foreach ($post as $key => $val) {
                    $array = array();
                    if (is_int($key)) {
                        $array['id_activity'] = $id;
                        $array['id_item_check'] = $key;
                        $array['is_good'] = $val;
                        $array['created_at'] = currentDateTime();
                        $array['created_by'] = userId();
                        array_push($params_d, $array);
                    }

                    if (strpos($key, "desc") !== false) {
                        $desc[] = $val;
                    }
                }

                foreach ($params_d as $key => $val) {
                    $params_d[$key]['desc'] = $desc[$key];
                }


                $this->db->insert_batch('activity_d',  $params_d);
            }
        }
    }

    function getActivity()
    {
        $sql = "select a.id, b.name as forklift, hour_start, hour_end,item_check, item_good, item_not_good,
        c.fullname as created_by, a.created_at
        from activity_h a
        inner join master_forklift b on a.id_forklift = b.id 
        inner join master_user c on a.created_by = c.id
        inner join
        (select id_activity, count(id) as item_check,
        (select count(is_good) from activity_d WHERE is_good = 'Y' and id_activity = a.id_activity) as item_good,
        (select count(is_good) from activity_d WHERE is_good = 'N' and id_activity = a.id_activity) as item_not_good
        from activity_d a
        group by id_activity)d on d.id_activity = a.id
        order by a.id DESC";
        $query = $this->db->query($sql);
        return $query;
    }

    function getDetailItemChecked($id)
    {
        return $this->db->get_where('activity_d', ['id_activity' => $id]);
    }

    function getHeader($id)
    {
        return $this->db->get_where('activity_h', ['id' => $id]);
    }
}
