<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
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
}
 