<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
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

    public function register()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('customer/register');
		$this->load->view('templates/footer');  
    }

    function newcustomerinsert()

    {

        if (isset($_POST['addnew_customer'])) {

            $this->load->model('customers');
            $check = $this->customers->new_customer_insert();

            redirect('customer/register');
            
        }
    }
  

}
