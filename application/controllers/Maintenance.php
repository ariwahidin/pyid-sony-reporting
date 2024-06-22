<?php

class Maintenance extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['item_forklift_m', 'maintenance_m', 'forklift_m']);
        is_not_logged_in();
        $this->load->helper(array('form', 'url'));
    }

    public function render($view, array $data = null)
    {
        $this->load->view('template/header_iframe');
        $this->load->view($view, $data);
        $this->load->view('template/footer_iframe');
    }

    public function forklift()
    {
        $data = array(
            'forklift' => $this->forklift_m->getForklift(),
            'item' => $this->item_forklift_m->getItemCheck()
        );
        $this->render('maintenance/forklift', $data);
    }

    public function getActivity()
    {
        $data = array(
            'activity' => $this->maintenance_m->getActivity()
        );

        $this->load->view('maintenance/table_activity', $data);
    }

    public function getActivityById()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $header = $this->maintenance_m->getHeader($id);
        $detail = $this->maintenance_m->getDetailItemChecked($id);
        $response = array(
            'success' => true,
            'header' => $header->row(),
            'detail' => $detail->result(),
            'photo' => $this->db->get_where('activity_img', ['activity_id' => $id])->row()
        );
        echo json_encode($response);
    }

    public function createMaintenance()
    {
        $post = $this->input->post();

        // var_dump($post['photo']);
        // die;


        $saveData = $this->maintenance_m->createActivity($post);

        if ($saveData['success'] == true) {

            $id = $saveData['id'];
            // Dapatkan data gambar dari permintaan POST
            $photoDataUrl = $post['photo']; // Ini akan berisi URL data gambar dalam format base64

            if ($photoDataUrl != 'null') {
                // Decode URL base64 menjadi data biner
                $photoData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photoDataUrl));
                // Simpan data gambar ke file di server
                $filename = $id . '_' . date('YmdHis', strtotime(currentDateTime())) . '.jpg'; // Ubah sesuai kebutuhan Anda
                $file_path = './uploads/' . $filename;
                file_put_contents($file_path, $photoData);
            } else {
                $filename = 'no_photo.jpg';
            }

            $params = array(
                'activity_id' => $id,
                'file_name' => $filename,
                'img_ket' => $post['img_ket'],
                'created_at' => currentDateTime(),
                'created_by' => userId()
            );
            $this->db->insert('activity_img', $params);
        }



        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true,
                'message' => 'Create data successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Failed to created data'
            );
        }
        echo json_encode($response);
    }

    public function editActivity()
    {
        $post = $this->input->post();

        // var_dump($post);
        // die;

        $this->maintenance_m->editActivity($post);


        $photoDataUrl = $post['photo']; // Ini akan berisi URL data gambar dalam format base64
        $id = $post['id_task'];

        if ($photoDataUrl != 'null') {
            // Decode URL base64 menjadi data biner
            $photoData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photoDataUrl));
            // Simpan data gambar ke file di server
            $filename = $id . '_' . date('YmdHis', strtotime(currentDateTime())) . '.jpg'; // Ubah sesuai kebutuhan Anda
            $file_path = './uploads/' . $filename;
            file_put_contents($file_path, $photoData);

            $params = array(
                'activity_id' => $id,
                'file_name' => $filename,
                'img_ket' => $post['img_ket'],
                'updated_at' => currentDateTime(),
                'updated_by' => userId()
            );
            $this->db->where(['activity_id' => $id]);
            $this->db->update('activity_img', $params);
        }






        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true,
                'message' => 'Edit data successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Failed to Edit data'
            );
        }
        echo json_encode($response);
    }

    public function getDataExcel()
    {
        $post = $this->input->post();
        $rows = $this->maintenance_m->getActivity($post)->result();
        $dataExcel = array();
        $no = 1;
        foreach ($rows as $val) {
            $row = array();
            $row['NO'] = $no++;
            $row['PIC'] = $val->created_by;
            $row['FORKLIFT'] = $val->forklift;
            $row['START HOURS'] = $val->hour_start;
            $row['FINISH HOURS'] = $val->hour_end;
            $row['ITEM CHECKED'] = $val->item_check;
            $row['GOOD ITEM'] = $val->item_good;
            $row['NOT GOOD ITEM'] = $val->item_not_good;
            $row['DATE'] = date('Y-m-d H:i:s', strtotime($val->created_at));
            array_push($dataExcel, $row);
        }

        // var_dump($dataExcel);

        // exit;

        $data = array(
            'success' => true,
            'data' => $dataExcel
        );
        echo json_encode($data);
    }

    public function getExcelDetail()
    {
        $post = $this->input->post();
        $id = $post['idActivity'];


        $rows = $this->maintenance_m->getActivity($post)->result();
        $dataExcelHeader = array();
        $no = 1;
        foreach ($rows as $val) {
            $row = array();
            $row['NO'] = $no++;
            $row['PIC'] = $val->created_by;
            $row['FORKLIFT'] = $val->forklift;
            $row['START HOURS'] = $val->hour_start;
            $row['FINISH HOURS'] = $val->hour_end;
            $row['ITEM CHECKED'] = $val->item_check;
            $row['GOOD ITEM'] = $val->item_good;
            $row['NOT GOOD ITEM'] = $val->item_not_good;
            $row['DATE'] = date('Y-m-d', strtotime($val->created_at));
            array_push($dataExcelHeader, $row);
        }

        $detail = $this->maintenance_m->getItemDetail($id)->result();
        $dataExcelDetail = array();
        $no = 1;
        foreach ($detail as $val) {
            $row = array();
            $row['NO'] = $no++;
            $row['ITEM CHECKED'] = $val->{'ITEM CHECKED'};
            $row['CONDITION'] = $val->{'CONDITION'};
            $row['DESCRIPTION'] = $val->{'DESCRIPTION'};
            $row['DATE'] = $val->{'DATE'};
            $row['PIC'] = $val->{'PIC'};
            array_push($dataExcelDetail, $row);
        }

        $data = array(
            'success' => true,
            'header' => $dataExcelHeader,
            'detail' => $dataExcelDetail
        );
        echo json_encode($data);
    }

    public function getItemDetail()
    {
        $post = $this->input->post();
        $id = $post['idActivity'];
        $detail = $this->maintenance_m->getItemDetail($id);
        $data = array(
            'activity' => $this->maintenance_m->getActivity($post),
            'item' => $detail,
            'photo' => $this->db->get_where('activity_img', ['activity_id' => $id])->row()
        );
        $response = array(
            'success' => true,
            'item' => $detail->result(),
            'table_header' =>  $this->load->view('maintenance/table_activity_header', $data, true),
            'table_detail' => $this->load->view('maintenance/table_detail', $data, true)
        );
        echo json_encode($response);
    }

    public function deleteActivity()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $params = array(
            'deleted_at' => currentDateTime(),
            'deleted_by' => userId(),
            'is_deleted' => 'Y'
        );
        $this->maintenance_m->deleteActivity($id, $params);
        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true,
                'message' => 'Delete data is successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Failed deleting data'
            );
        }
        echo json_encode($response);
    }
}
