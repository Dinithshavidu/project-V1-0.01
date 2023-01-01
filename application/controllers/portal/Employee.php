<?php
class Employee extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin')) {
        } else if ($this->session->userdata('admin22')) {
        } else {
            redirect('dashboard/logout');
        }

        $this->load->model('import_model', 'import');
    }

    public function action($page = 'home')
    {
        //$myVar['result'] = $this->session->flashdata('result');
        //$myVar['viewr'] = $this->session->flashdata('viewr');

        $this->load->model('setups');
        $data['get_Emp'] = $this->setups->get_Emp();

        $this->load->model('employees');
        $data['retrieveEmpAttend'] = $this->employees->retrieveEmpAttend();




        if ($this->session->userdata('admin')) {
            $sidebar = "sadmin";
        }
        if ($this->session->userdata('admin22')) {
            $sidebar = "admin22";
        }



        $this->load->view('templates/header');
        $this->load->view('templates/sidebar/' . $sidebar);
        // $this->load->view('credit/' . $page);
        $this->load->view('employe/' . $page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/formpages/formjs');
    }


  

    public function uploadExcel()
    {

        $this->load->model('employees');

        if ($this->employees->uploadExcel()) {
            // set flash data
            $this->session->set_flashdata('success', 'Upload Successfully');
            redirect('portal/credit/action/add_credit');
        }
    }




}
