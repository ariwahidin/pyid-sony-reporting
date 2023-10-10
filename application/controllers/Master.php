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

    public function getMasterCustomer()
    {
        $post = $this->input->post();
        $customer = $this->master_m->master_customer($post);
        $total_records = $this->master_m->countAllCustomer();
        $total_filtered = $this->master_m->countAllCustomer();
        $data = array();
        $no = $post['start'];

        foreach($customer->result() as $field){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->CardName;
            $row[] = $field->Address;
            $row[] = $field->City;
            $row[] = $field->Phone;
            $data[] = $row;
        }

        $response = array(
            'draw' => intval($this->input->post('draw')),
            'recordsTotal' =>  $total_records,
            'recordsFiltered' =>  $total_filtered,
            'data' => $data
        );

        echo json_encode($response);
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
