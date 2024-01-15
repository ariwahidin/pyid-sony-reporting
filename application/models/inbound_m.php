<?php
class Inbound_m extends CI_Model
{
    public function currentDateTime()
    {
        // Set the timezone to Asia/Jakarta (Indonesian timezone)
        $timezone = new DateTimeZone('Asia/Jakarta');
        // Get the current date and time in the specified timezone
        $dateTime = new DateTime('now', $timezone);
        // Format the date and time as a string
        $formattedDateTime = $dateTime->format('Y-m-d H:i:s');
        return $formattedDateTime;
    }

    public function createTempActivity($post)
    {
        $user_id = $this->session->userdata('user_data')['user_id'];
        $params = array(
            'no_sj' => $post['sj'],
            'qty' => $post['qty'],
            'checker' => $post['checker'],
            'tanggal' => $post['date'],
            'created_date' => $this->currentDateTime(),
            'created_by' => $user_id,
            'session_id' => $_SESSION['__ci_last_regenerate']
        );
        $this->db->insert('tb_trans_temp', $params);
    }

    public function getTempActivity($id = null)
    {
        $sql = "SELECT *, 
                TIMEDIFF(stop_unloading, start_unloading) as duration_unloading, 
                TIMEDIFF(stop_checking, start_checking) as duration_checking,
                TIMEDIFF(stop_putaway, start_putaway) as duration_putaway 
                FROM tb_trans_temp";
        if ($id != null) {
            $sql .= " WHERE id='$id'";
        }
        $query = $this->db->query($sql);
        return $query;
    }

    public function getCompletedActivity()
    {
        $sql = "select no_sj, qty, checker, ref_date,
        time_format(time(unload_st_time), '%H:%i') as start_unload,
        time_format(time(unload_fin_time), '%H:%i') as stop_unload,
        time_format(unload_duration, '%H:%i') as unload_duration,
        time_format(time(checking_st_time), '%H:%i') as start_checking,
        time_format(time(checking_fin_time), '%H:%i') as stop_checking,
        time_format(checking_duration, '%H:%i') as checking_duration,
        time_format(time(putaway_st_time), '%H:%i') as start_putaway,
        time_format(time(putaway_fin_time), '%H:%i') as stop_putaway,
        time_format(putaway_duration, '%H:%i') as putaway_duration 
        from tb_trans 
        where date(created_date) = date(now())";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getChecker()
    {
        $sql = "select * from master_employee";
        $query = $this->db->query($sql);
        return $query;
    }

    public function editActivity($post)
    {
        $data = array(
            $post['activity'] => $post['time']
        );
        $where = array(
            'id' => $post['id']
        );
        $this->db->update('tb_trans_temp', $data, $where);
    }

    public function checkFinishActivity($id)
    {
        $sql = "select * from tb_trans_temp
        where id = '$id'
        and stop_unloading is not null
        and stop_checking is not null
        and stop_putaway is not null";
        $query = $this->db->query($sql);
        return $query;
    }

    public function finishActivity($id)
    {
        $this->db->trans_begin(); // Memulai transaksi

        try {
            // Langkah 1: Pilih data dari table_a
            $data1 = $this->getTempActivity($id)->row_array();

            // var_dump($data1);

            $params_insert = array(
                'no_sj' => $data1['no_sj'],
                'qty' => $data1['qty'],
                'checker' => $data1['checker'],
                'ref_date' => $data1['tanggal'],
                'unload_st_time' => $data1['start_unloading'],
                'unload_fin_time' => $data1['stop_unloading'],
                'unload_duration' => $data1['duration_unloading'],
                'checking_st_time' => $data1['start_checking'],
                'checking_fin_time' => $data1['stop_checking'],
                'checking_duration' => $data1['duration_checking'],
                'putaway_st_time' => $data1['start_putaway'],
                'putaway_fin_time' => $data1['stop_putaway'],
                'putaway_duration' => $data1['duration_putaway'],
                'created_date' => $this->currentDateTime(),
                'created_by' => $data1['created_by']
            );

            // var_dump($params_insert);
            // exit;


            // Langkah 2: Sisipkan data ke table_b
            $this->db->insert('tb_trans', $params_insert);

            // Langkah 3: Hapus data dari table_a
            $this->db->delete('tb_trans_temp', array('id' => $id));

            // Komit transaksi jika semua langkah berhasil
            $this->db->trans_commit();

            // Output true jika transaksi berhasil
            return true;
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $this->db->trans_rollback();
            log_message('error', 'Error in transaction: ' . $e->getMessage());

            // Output false jika terjadi kesalahan atau rollback
            return false;
        }
    }

    public function editUserActivity($post)
    {
        $data = array(
            'no_sj' => $post['sj'],
            'qty' => $post['checker'],
            'checker' => $post['checker'],
            'tanggal' => $post['ref_date']
        );

        $this->db->where('id', $post['id']);
        $this->db->update('tb_trans_temp', $data);
    }
}
