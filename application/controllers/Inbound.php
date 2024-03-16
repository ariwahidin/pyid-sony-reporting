<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inbound extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['inbound_m']);
        is_not_logged_in();
    }

    public function render($view, array $data = null)
    {
        $this->load->view('template/header');
        $this->load->view($view, $data);
        $this->load->view('template/footer');
    }

    public function index()
    {
        $checker = $this->inbound_m->getChecker();
        $data = array(
            'checker' => $checker
        );
        $this->render('inbound/create_inbound', $data);
    }

    public function keepAlive()
    {
        $response = array(
            'success' => true,
            'message' => 'keep a live'
        );
        echo json_encode($response);
    }

    public function getRow()
    {
        $this->inbound_m->createTempActivity($_POST);
        $id = $this->db->insert_id();
        $row = $this->inbound_m->getTempActivity($id);
        $data = array(
            'activity' => $row
        );
        $this->load->view('inbound/row', $data);
    }

    public function deleteTransTemp()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $this->inbound_m->deleteRowTrans($id);
        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true,
                'message' => 'Delete data successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Failed deleting data'
            );
        }
        echo json_encode($response);
    }

    public function getAllRowTemp()
    {
        $row = $this->inbound_m->getTempActivity();
        $data = array(
            'activity' => $row
        );
        $this->load->view('inbound/row', $data);
    }

    public function getRowCompleteAct()
    {
        $data = array(
            'completed' => $this->inbound_m->getCompletedActivity($_POST)
        );
        $this->load->view('inbound/row_complete_ctivity', $data);
    }

    public function editActivity()
    {
        $response = array();
        $post = $_POST;
        $timeString = $post['time'];
        $dateTime = new DateTime($timeString);
        $newFormat = $dateTime->format('Y-m-d H:i:s');

        $params = array(
            'id' => $post['id'],
            'activity' => $post['activity'],
            'time' => $newFormat
        );

        $this->inbound_m->editActivity($params);

        if ($this->db->affected_rows() > 0) {
            $row = $this->inbound_m->getTempActivity($post['id']);
            $response['data'] = $row->row();
            $checkFinish = $this->inbound_m->checkFinishActivity($post['id']);
            if ($checkFinish->num_rows() > 0) {
                if ($this->inbound_m->finishActivity($post['id'])) {
                    $response['isFinish'] = true;
                } else {
                    $response['isFinish'] = false;
                }
            } else {
                $response['isFinish'] = false;
            }
        }

        echo json_encode($response);
    }

    public function editUserActivity()
    {
        $post = $_POST;
        $response = array();
        $this->inbound_m->editUserActivity($post);
        if ($this->db->affected_rows() > 0) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }
        echo json_encode($response);
    }


}
