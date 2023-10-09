<?php defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['master_m']);
    }

    public function render($view, array $data = null)
    {
        $this->load->view('template/header');
        $this->load->view($view, $data);
        $this->load->view('template/footer');
    }

    public function top()
    {
        $data = array();
        $this->render('master/top', $data);
    }

    public function customer()
    {
        $data = array();
        $this->render('master/customer', $data);
    }

    public function item()
    {
        $data = array();
        $this->render('master/item', $data);
    }

    public function subdist()
    {
        $data = array();
        $this->render('master/subdist', $data);
    }

    public function getMasterSubdist()
    {
        $subdist = $this->master_m->master_subdist();
        $response = array(
            'subdist' => $subdist->result()
        );
        echo json_encode($response);
    }
}
