<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->session->unset_userdata('LOGGED_PAGE');
        if ($this->session->userdata('admin')) {
        } else if ($this->session->userdata('admin22')) {
        } else {
            redirect('dashboard/logout');
        }
    }

    public function register()
    {
        $this->session->set_userdata('LOGGED_PAGE', "customer_register");
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('customer/register');
        $this->load->view('templates/footer');
    }

  

    public function index()
    {
        $this->load->model('customers');
        $data['retrieveCustomers'] = $this->customers->retrieveCustomers();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('customer/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile($custId)
    {

        $this->load->model('customers');
        $data['retive'] = $this->customers->customerDetails($custId);

        $this->load->model('appointments');
        $appointmentByCustomerId = $this->appointments->getAppointmentDataByCustomerId($custId);


        $data['ds'] = $custId;
        $data['appointmentByCustomerId'] = $appointmentByCustomerId;

        $this->load->view('customer/profile',$data);
    }


    function newcustomerinsert()
    {
        if (isset($_POST['addnew_customer'])) {
            $this->load->model('customers');
            $check = $this->customers->validate();
            if ($check) {
                redirect('customer/register');
            } else {
                $this->customers->new_customer_insert();
                redirect('customer/index');
            }


        }
    }

    function updatecustomerinsert()
    {
        if (isset($_POST['addnew_customer'])) {
            $this->load->model('customers');
            $check = $this->customers->customer_update();
            redirect('customer/register');
        }
    }
    public function update($page)
    {
        $this->load->model('customers');
        $data['retive'] = $this->customers->customerDetails($page);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('customer/update', $data);
        $this->load->view('templates/footer');
    }

}