<?php defined('BASEPATH') or exit('No direct script access allowed');

class ItemForklift extends CI_Controller
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

    public function testDatatable()
    {
        $list = $this->item_forklift_m->get_datatables();
        $count_all = $this->item_forklift_m->count_all();
        $count_filtered = $this->item_forklift_m->count_filtered();

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $ekspedisi) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ekspedisi->name;
            $row[] = $ekspedisi->desc;
            $row[] = '<a href="javascript:void(0)" class="linkEdit link-success fs-15" data-id="' . $ekspedisi->id . '"><i class="ri-edit-2-line"></i>&nbsp;&nbsp;</a><a href="javascript:void(0)" class="linkDelete link-danger fs-15" data-id="' . $ekspedisi->id . '"><i class="ri-delete-bin-line"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $count_all,
            "recordsFiltered" => $count_filtered,
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function index()
    {
        $data = array(
            'forklift' => $this->item_forklift_m->getItemCheck()
        );
        $this->render('item_forklift/index', $data);
    }

    public function getItemCheck()
    {


        $data = array(
            'forklift' => $this->item_forklift_m->getItemCheck(),
        );

        $response = array(
            'success' => true,
            'content' => $this->load->view('item_forklift/table_item', $data, true),
        );
        echo json_encode($response);
    }

    public function getItemForkliftCheck()
    {

        $id = null;
        $result = $this->item_forklift_m->getItemCheck($id)->result();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->item_forklift_m->getItemCheck($id)->row();
        }

        $data = array(
            'success' => true,
            'forklift' => $result,
        );

        echo json_encode($data);
    }

    public function createForklift()
    {
        $post = $this->input->post();
        $params = array(
            'name' => $post['name'],
            'desc' => $post['desc'],
            'is_deleted' => 'N',
            'created_by' => userId(),
            'created_at' => currentDateTime()
        );

        // var_dump($params);

        $this->item_forklift_m->createForklift($params);
        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true,
                'message' => 'Create new item has been successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Failed to create new item'
            );
        }
        echo json_encode($response);
    }

    public function prosesEditForklift()
    {
        $post = $this->input->post();

        // var_dump($post);
        // die;

        $id = $post['id'];
        $params = array(
            'name' => $post['name'],
            'desc' => $post['desc'],
            'updated_at' => currentDateTime(),
            'updated_by' => userId()
        );
        $this->item_forklift_m->editForklift($id, $params);
        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true,
                'message' => 'Edit item has been successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Failed to edit item'
            );
        }
        echo json_encode($response);
    }

    public function editForklift()
    {

        $post = $this->input->post();
        $id = $post['id'];
        $params = array(
            'name' => $post['name'],
            'desc' => $post['desc'],
            'updated_at' => currentDateTime(),
            'updated_by' => userId()
        );
        $this->item_forklift_m->editForklift($id, $params);

        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true,
                'message' => 'Edit item has been successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Failed to edit item'
            );
        }
        echo json_encode($response);
    }

    public function deleteForklift()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $params = array(
            'is_deleted' => 'Y',
            'deleted_at' => currentDateTime(),
            'deleted_by' => userId()
        );
        $this->item_forklift_m->deleteForklift($id, $params);
        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true,
                'message' => 'Delete item has been successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Failed to delete item'
            );
        }
        echo json_encode($response);
    }
}
