<?php defined('BASEPATH') or exit('No direct script access allowed');

class Database extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['database_m']);
    }

    public function update()
    {
        $master_top = $this->database_m->master_top();
        // echo $master_top;
    }
}
 