<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['inbound_m', 'user_m', 'ekspedisi_m', 'factory_m']);
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
        $data = array();
        $this->render('dashboard/index', $data);
    }

    public function getAllProccessInbound()
    {
        $inbound = $this->inbound_m->getAllInboundProccess();
        $data = array(
            'inbound' => $inbound
        );
        $this->load->view('dashboard/table_inbound', $data);
    }
}
