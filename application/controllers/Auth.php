<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function login()
	{
		$this->load->view('auth/login');
	}

	public function proses()
	{
		$req = json_decode(file_get_contents('php://input'), true);
		$username = $req['username'];
		$password = $req['password'];
		if ($username == 'admin' && $password == 'admin') {
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

	public function logout()
	{
		$response = array(
			'success' => true
		);
		echo json_encode($response);
	}
}
