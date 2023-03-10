<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin'))
			redirect('portal/home');
	}

	public function index()
	{
		$this->load->view('login/index.php');
	}

	function verify()
	{
		$this->load->model('users');
		$check = $this->users->validate();
		$this->load->model('sessionass');
		$roleid = $this->sessionass->checksession();
		$this->session->set_userdata('LOGGED_USER_ROLE_ID', $roleid);
		$user_data = array();
		$user_data = $this->sessionass->retrieve_log_data();

		$this->session->set_userdata('passed_user_name', $user_data[0]);
		$this->session->set_userdata('passed_user_national', $user_data[1]);
		$this->session->set_userdata('passed_user_address', $user_data[2]);

		if ($check) {
			$roleid = 1;
			switch ($roleid) {
				case "1":
					$this->session->set_userdata('admin', '1');
					redirect('portal/home');
					break;

				default:
					redirect('dashboard/login');
			}
		} else {
			$this->session->set_flashdata('error', ' Please enter correct details and try again !');
			redirect('dashboard/login');
		}
	}
}
