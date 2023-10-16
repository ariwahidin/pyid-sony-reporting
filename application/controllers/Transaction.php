<?php defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['master_m', 'customer_m', 'item_m', 'top_m', 'user_m']);
    }

    public function render($view, array $data = null)
    {
        $this->load->view('template/header');
        $this->load->view($view, $data);
        $this->load->view('template/footer');
    }

    public function salesOrder()
    {
        $data = array();
        $this->render('transaction/sales_order', $data);
    }
}
