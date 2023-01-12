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

        $this->load->model('customers');
        //$data['customerData'] = $this->customers->get_all_customers_formatted();
        $data['retrieveCustomers'] = $this->customers->retrieveCustomers();

        $data['hoursRange'] = $this->generateHoursRange();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('appointment/index', $data);
        $this->load->view('templates/footer');
    }


    public function fetch_users_flat_by_call(){
        $this->load->model('appointments');
        return $this->appointments->get_all_users_flat();
    }

    public function generateHoursRange( $lower = 10800, $upper = 84600, $step = 1800, $format = '' ) {
        $times = array();    
        if ( empty( $format ) ) {
            $format = 'g:i A';
        }    
        foreach ( range( $lower, $upper, $step ) as $increment ) {
            $increment = gmdate( 'H:i', $increment );    
            list( $hour, $minutes ) = explode( ':', $increment );    
            $date = new DateTime( $hour . ':' . $minutes );    
            $times[(string) $increment] = $date->format( $format );
        }
        return $times;
    }
    
  
}
