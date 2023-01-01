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




    public function index($page = 'home')
    {


        $sidebar = "";

        if (!file_exists(APPPATH . 'views/pages/dashboard/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }



        if ($this->session->userdata('admin')) {
            $sidebar = "sadmin";
        }
        if ($this->session->userdata('admin22')) {
            $sidebar = "admin22";
        }



       
        $this->load->view('templates/header');



        $this->load->view('templates/sidebar/' . $sidebar);

        $this->load->view('pages/dashboard/home');
        $this->load->view('templates/footer');
        $this->load->view('templates/homejs');
    }





    public function retrive_profile_data()
    {

        $this->load->model('users');
        if ($this->users->retrive_profile_data()) {
        }
    }
}
