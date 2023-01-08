<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup extends CI_Controller
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

    public function sections()
    {

        $this->load->model('setups');
        $data['retrieveSections'] = $this->setups->retrieveSections();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('setup/sections', $data);
        $this->load->view('templates/footer');
    }

    public function groups()
    {

        $this->load->model('setups');
        $data['retrieveGroups'] = $this->setups->retrieveGroups();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('setup/groups', $data);
        $this->load->view('templates/footer');
    }


    public function services()
    {
        $this->load->model('setups');
        $data['retrieveServices'] = $this->setups->retrieveServices();
        $data['retrieveSections'] = $this->setups->retrieveSections();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('setup/services', $data);
        $this->load->view('templates/footer');
    }

    function newsSctionsInsert()
    {

        if (isset($_POST['addnew_section'])) {

            $this->load->model('setups');
            $check = $this->setups->new_section_insert();

            redirect('setup/sections');

        }
    }

    function newsServiceInsert()
    {
        // echo "<script>console.log('sssssssss' );</script>";
        if (isset($_POST['addnew_service'])) {

            $this->load->model('setups');
            $check = $this->setups->new_service_insert();

            redirect('setup/services');

        }
    }

    function newsGroupInsert()
    {

        if (isset($_POST['addnew_groups'])) {

            $this->load->model('setups');
            $check = $this->setups->new_group_insert();

            redirect('setup/groups');

        }
    }


}