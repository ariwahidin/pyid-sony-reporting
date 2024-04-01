<?php defined('BASEPATH') or exit('No direct script access allowed');

class Outbound extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['outbound_m', 'user_m', 'ekspedisi_m', 'factory_m']);
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
        $checker = $this->user_m->getOperator();
        $factory = $this->factory_m->getFactory();
        $ekspedisi = $this->ekspedisi_m->getEkspedisi();
        $data = array(
            'checker' => $checker,
            'factory' => $factory,
            'ekspedisi' => $ekspedisi,
        );
        $this->render('outbound/create_outbound', $data);
    }

    public function createTask()
    {
        $post = $this->input->post();
        $params = array(
            'no_pl' => $post['no_pl'],
            'no_truck' => $post['no_truck'],
            'qty' => $post['qty'],
            'checker_id' => $post['checker_id'],
            'pl_date' => $post['pl_date'],
            'pl_time' => $post['pl_time'],
            'ekspedisi' => $post['ekspedisi'],
            'driver' => $post['driver'],
            'remarks' => $post['remarks'],
            'created_date' => currentDateTime(),
            'created_by' => userId()
        );
        $this->outbound_m->createTask($params);
        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true,
                'message' => 'Create task successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Create task failed'
            );
        }
        echo json_encode($response);
    }

    public function getAllRowTask()
    {
        $post = $this->input->post();
        $task = $this->outbound_m->getTaskByUser($post);
        $data = array(
            'task' => $task
        );
        $this->load->view('outbound/row_task', $data);
    }
}
