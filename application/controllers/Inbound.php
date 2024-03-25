<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inbound extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['inbound_m', 'user_m']);
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
        $checker = $this->user_m->getOperator();
        $data = array(
            'checker' => $checker
        );
        $this->render('inbound/create_inbound', $data);
    }

    public function createTask()
    {
        $post = $this->input->post();
        print_r($post);
        if($post['']);
        exit;
        $this->inbound_m->createNewTask($params);
    }

    public function task()
    {
        $checker = $this->user_m->getOperator();
        $data = array(
            'checker' => $checker
        );
        $this->render('inbound/inbound_task/inbound_task', $data);
    }

    public function getAllRowTask()
    {
        $post = $this->input->post();
        $task = $this->inbound_m->getTaskByUser($post);
        $data = array(
            'task' => $task
        );
        $this->load->view('inbound/inbound_task/row_task', $data);
    }

    public function keepAlive()
    {
        $response = array(
            'success' => true,
            'message' => 'keep a live'
        );
        echo json_encode($response);
    }

    public function getRow()
    {

        $post = $this->input->post();
        $this->inbound_m->createTempActivity($post);
        $id = $this->db->insert_id();
        $row = $this->inbound_m->getTempActivity($id);
        $data = array(
            'activity' => $row
        );
        $this->load->view('inbound/row', $data);
    }

    public function deleteTransTemp()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $this->inbound_m->deleteRowTrans($id);
        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true,
                'message' => 'Delete data successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Failed deleting data'
            );
        }
        echo json_encode($response);
    }

    public function getAllRowTemp()
    {
        $rows = $this->inbound_m->getTempActivity();

        foreach ($rows->result() as $data) {
            $data->duration_unloading = countDuration($data->start_unloading, $data->stop_unloading);
            $data->duration_checking = countDuration($data->start_checking, $data->stop_checking);
            $data->duration_putaway = countDuration($data->start_putaway, $data->stop_putaway);
        }

        $data = array(
            'activity' => $rows
        );

        $this->load->view('inbound/row', $data);
    }



    public function getDataCompleteById()
    {
        $data = array(
            'success' => true,
            'data' => $this->inbound_m->getActCompleteById()->row()
        );
        echo json_encode($data);
    }

    public function getRowCompleteAct()
    {
        $rows = $this->inbound_m->getCompletedActivity($_POST);

        // print_r($rows->result());
        // exit;

        foreach ($rows->result() as $data) {
            $data->duration_unloading = countDuration($data->start_unloading, $data->stop_unloading);
            $data->duration_checking = countDuration($data->start_checking, $data->stop_checking);
            $data->duration_putaway = countDuration($data->start_putaway, $data->stop_putaway);
        }

        $data = array(
            'completed' => $rows
        );
        $this->load->view('inbound/row_complete_ctivity', $data);
    }

    public function getDataExcel()
    {
        $rows = $this->inbound_m->getCompletedActivity($_POST)->result();
        $dataExcel = array();
        $no = 1;
        foreach ($rows as $val) {
            $row = array();
            $row['no'] = $no++;
            $row['no_sj'] = $val->no_sj;
            $row['no_truck'] = $val->no_truck;
            $row['qty'] = $val->qty;
            $row['checker'] = $val->checker;
            $row['ref_date'] = $val->ref_date;
            $row['start_unload'] = date('H:i', strtotime($val->start_unload));
            $row['stop_unload'] = date('H:i', strtotime($val->stop_unload));
            $row['unload_duration'] = date('H:i:s', strtotime($val->unload_duration));
            $row['lead_time_unloading'] = roundMinutes(date('H:i:s', strtotime($val->unload_duration)));
            $row['start_checking'] = date('H:i', strtotime($val->start_checking));
            $row['stop_checking'] = date('H:i', strtotime($val->stop_checking));
            $row['checking_duration'] = date('H:i:s', strtotime($val->checking_duration));
            $row['lead_time_checking'] = roundMinutes(date('H:i:s', strtotime($val->checking_duration)));
            $row['start_putaway'] = date('H:i', strtotime($val->start_putaway));
            $row['stop_putaway'] = date('H:i', strtotime($val->stop_putaway));
            $row['putaway_duration'] = date('H:i:s', strtotime($val->putaway_duration));
            $row['lead_time_putaway'] = roundMinutes(date('H:i:s', strtotime($val->putaway_duration)));
            $row['created_date'] = $val->created_date;
            array_push($dataExcel, $row);
        }

        // var_dump($dataExcel);
        // die;
        $data = array(
            'success' => true,
            'data' => $dataExcel
        );
        echo json_encode($data);
    }

    public function editActivityComplete()
    {
        $post = $this->input->post();
        $this->inbound_m->updateActivityComplete($post);
        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true
            );
        } else {
            $response = array(
                'success' => false
            );
        }
        echo json_encode($response);
    }

    public function deleteCompleteActivity()
    {
        $post = $this->input->post();
        $this->inbound_m->deleteActivityComplete($post);
        if ($this->db->affected_rows() > 0) {
            $response = array(
                'success' => true
            );
        } else {
            $response = array(
                'success' => false
            );
        }
        echo json_encode($response);
    }



    public function editActivity()
    {
        $response = array();
        $post = $_POST;
        $timeString = $post['time'];
        $dateTime = new DateTime($timeString);
        $newFormat = $dateTime->format('Y-m-d H:i:s');

        $params = array(
            'id' => $post['id'],
            'activity' => $post['activity'],
            'time' => $newFormat
        );

        $this->inbound_m->editActivity($params);

        if ($this->db->affected_rows() > 0) {
            $row = $this->inbound_m->getTempActivity($post['id']);
            $response['data'] = $row->row();
            $checkFinish = $this->inbound_m->checkFinishActivity($post['id']);
            if ($checkFinish->num_rows() > 0) {
                if ($this->inbound_m->finishActivity($post['id'])) {
                    $response['isFinish'] = true;
                } else {
                    $response['isFinish'] = false;
                }
            } else {
                $response['isFinish'] = false;
            }
        }

        echo json_encode($response);
    }

    public function editUserActivity()
    {
        $post = $_POST;
        // var_dump($post);
        // die;
        $response = array();
        $this->inbound_m->editUserActivity($post);
        if ($this->db->affected_rows() > 0) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }
        echo json_encode($response);
    }

    public function startUnloading()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $cek = $this->inbound_m->getTransTemp($id)->row();
        if (!is_null($cek->start_unloading)) {
            $response = array(
                'success' => false,
                'message' => 'Unloading already started please reload this page!'
            );
        } else {
            $params = array(
                'start_unloading' => currentDateTime(),
            );

            $this->inbound_m->startUnload($id, $params);
            if ($this->db->affected_rows() > 0) {
                $response = array(
                    'success' => true,
                    'message' => 'Unloading started successfully'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Failed to start unload!'
                );
            }
        }
        echo json_encode($response);
    }

    public function stopUnloading()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $cek = $this->inbound_m->getTransTemp($id)->row();
        if (!is_null($cek->stop_unloading)) {
            $response = array(
                'success' => false,
                'message' => 'Unloading already stoped please reload this page!'
            );
        } else {
            $params = array(
                'stop_unloading' => currentDateTime(),
            );

            $this->inbound_m->stopUnload($id, $params);
            if ($this->db->affected_rows() > 0) {

                $checkFinish = $this->inbound_m->checkFinishActivity($id);
                if ($checkFinish->num_rows() > 0) {
                    $this->inbound_m->finishActivity($id);
                }

                $response = array(
                    'success' => true,
                    'message' => 'Stop unloading successfully'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Failed to stop unload!'
                );
            }
        }
        echo json_encode($response);
    }

    public function startChecking()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $cek = $this->inbound_m->getTransTemp($id)->row();
        if (!is_null($cek->start_checking)) {
            $response = array(
                'success' => false,
                'message' => 'Checking already started please reload this page!'
            );
        } else {
            $params = array(
                'start_checking' => currentDateTime(),
            );

            $this->inbound_m->startChecking($id, $params);
            if ($this->db->affected_rows() > 0) {
                $response = array(
                    'success' => true,
                    'message' => 'Checking started successfully'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Failed to start unload!'
                );
            }
        }
        echo json_encode($response);
    }

    public function stopChecking()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $cek = $this->inbound_m->getTransTemp($id)->row();
        if (!is_null($cek->stop_checking)) {
            $response = array(
                'success' => false,
                'message' => 'Checking already stoped please reload this page!'
            );
        } else {
            $params = array(
                'stop_checking' => currentDateTime(),
            );

            $this->inbound_m->stopChecking($id, $params);
            if ($this->db->affected_rows() > 0) {

                $checkFinish = $this->inbound_m->checkFinishActivity($id);
                if ($checkFinish->num_rows() > 0) {
                    $this->inbound_m->finishActivity($id);
                }

                $response = array(
                    'success' => true,
                    'message' => 'Stop checking successfully'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Failed to stop checking!'
                );
            }
        }
        echo json_encode($response);
    }
    public function startPutaway()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $cek = $this->inbound_m->getTransTemp($id)->row();

        if (!is_null($cek->start_putaway)) {
            $response = array(
                'success' => false,
                'message' => 'Putaway already started please reload this page!'
            );
        } else {
            $params = array(
                'start_putaway' => currentDateTime(),
            );

            $this->inbound_m->startPutaway($id, $params);
            if ($this->db->affected_rows() > 0) {
                $response = array(
                    'success' => true,
                    'message' => 'Putaway started successfully'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Failed to start putaway!'
                );
            }
        }
        echo json_encode($response);
    }

    public function stopPutaway()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $cek = $this->inbound_m->getTransTemp($id)->row();
        if (!is_null($cek->stop_putaway)) {
            $response = array(
                'success' => false,
                'message' => 'Putaway already stoped please reload this page!'
            );
        } else {
            $params = array(
                'stop_putaway' => currentDateTime(),
            );

            $this->inbound_m->stopPutaway($id, $params);
            if ($this->db->affected_rows() > 0) {

                $checkFinish = $this->inbound_m->checkFinishActivity($id);
                if ($checkFinish->num_rows() > 0) {
                    $this->inbound_m->finishActivity($id);
                }

                $response = array(
                    'success' => true,
                    'message' => 'Stop putaway successfully'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Failed to stop putaway!'
                );
            }
        }
        echo json_encode($response);
    }
}
