<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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

    public function adSection()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('setup/section');
		$this->load->view('templates/footer');  
    
    }
}
