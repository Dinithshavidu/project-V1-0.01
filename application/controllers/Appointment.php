<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointment extends CI_Controller
{

    function __construct()
    {
        parent::__construct();


        if ($this->session->userdata('admin')) {
        } else if ($this->session->userdata('admin22')) {
        } else {
            redirect('dashboard/logout');
        }
    }

    public function index()
    {
        $this->load->view('templates/top-header');
		$this->load->view('appointment/index');
		$this->load->view('templates/footer');  
    }


  

}
