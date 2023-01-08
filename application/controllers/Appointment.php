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
        
        $this->load->model('appointments');
        $data['usersdata'] = $this->appointments->get_all_users_formatted();
        $this->load->view('templates/top-header', $data);
       // $this->load->view('templates/top-header');
		$this->load->view('appointment/index');
		$this->load->view('templates/footer');  
    }


    public function fetch_users_flat_by_call(){
        $this->load->model('appointments');
        return $this->appointments->get_all_users_flat();
    }
  
}
