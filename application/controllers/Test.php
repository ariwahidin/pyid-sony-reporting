<?php defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['inbound_m']);
    }

    function TestFinishActivity(){
        $id = 89;
        $test = $this->inbound_m->finishActivity($id);
        var_dump($test);
    }
}