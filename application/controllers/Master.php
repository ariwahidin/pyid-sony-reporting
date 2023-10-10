<?php defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['master_m','customer_m']);
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

    public function getMasterCustomer()
    {
        $list = $this->customer_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->CardName;
            $row[] = $field->Address;
            $row[] = $field->City;
            $row[] = $field->Phone;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->customer_m->count_all(),
            "recordsFiltered" => $this->customer_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
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
        $subdist = $this->master_m->master_subdist()->result();
        $response = array(
            'subdist' => $subdist
        );
        echo json_encode($response);
    }
}
