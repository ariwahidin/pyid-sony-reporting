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
        $sql = "SELECT * FROM tb_trans";
        if ($id != null) {
            $sql .= " WHERE id='$id'";
        }
        $query = $this->db->query($sql);
        return $query;
    }
}
