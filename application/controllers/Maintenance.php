<?php

class Maintenance extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['item_forklift_m', 'maintenance_m', 'forklift_m']);
        is_not_logged_in();
    }

    public function render($view, array $data = null)
    {
        $this->load->view('template/header');
        $this->load->view($view, $data);
        $this->load->view('template/footer');
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
            'detail' => $detail->result()
        );
        echo json_encode($response);
    }

    public function createMaintenance()
    {
        $post = $this->input->post();
        $this->maintenance_m->createActivity($post);
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
        $this->maintenance_m->editActivity($post);
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
}
