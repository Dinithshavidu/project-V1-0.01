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
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('portal/index.php');
		$this->load->view('templates/footer');    
           
    }





    
}
