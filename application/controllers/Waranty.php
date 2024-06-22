<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorPNG;

class Waranty extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_not_logged_in();
        $model = array(
            'user_m', 'role_m', 'item_forklift_m'
        );
        $this->load->model($model);
    }

    public function render($view, array $data = null)
    {
        $this->load->view('template/header_iframe');
        $this->load->view($view, $data);
        $this->load->view('template/footer_iframe');
    }

    public function index()
    {
        $data = array();
        $this->render('waranty/index', $data);
    }

    public function printWarantyReguler()
    {
        $generator = new BarcodeGeneratorPNG();
        $barcode = base64_encode($generator->getBarcode('CIAF-ACEBE-AAIA-00002', $generator::TYPE_CODE_128));
        $data = array(
            'barcode' => $barcode
        );
        $this->load->view('waranty/paper_waranty_reguler', $data);
    }
}
