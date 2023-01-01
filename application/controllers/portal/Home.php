<?php
class Home extends CI_Controller
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


    
       
        
        $this->load->view('portal/index.php');
    }





    public function retrive_profile_data()
    {

        $this->load->model('users');
        if ($this->users->retrive_profile_data()) {
        }
    }
}
