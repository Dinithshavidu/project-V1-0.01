<?php
class logout extends CI_Controller
{
	function index()
	{



		session_destroy();
		$this->session->unset_userdata('admin');

		redirect('dashboard/login');

		//session_destroy();
	}
}