<?php
class Setup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('admin')) {
        } else if ($this->session->userdata('admin22')) {
        } else {
            redirect('dashboard/logout');
        }
    }

    public function action($page = 'home')
    {

        $this->load->model('setups');


        $data['get_Emp'] = $this->setups->get_Emp();





        $sidebar = "";

        if (!file_exists(APPPATH . 'views/setup/' . $page . '.php')) {
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

        $this->load->view('setup/' . $page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/formpages/formjs');
    }





    public function add_emp()
    {

        if (isset($_POST['emp_add'])) {

            $this->load->model('setups');




            if ($this->setups->add_emp()) {
                // set flash data
                $this->session->set_flashdata('success', 'New Sales Rep Added Successfully');
                redirect('portal/setup/action/setup_emp');
            }
        }
    }





    function delete_emp()
    {
        if (isset($_POST['emp_id'])) {
            $this->load->model('setups');
            if ($this->setups->delete_emp()) {



                // set flash data
                $this->session->set_flashdata('error', 'Sales Rep Deleted Successfully');
                redirect('portal/setup/action/setup_emp');
            }
        }
    }





    function change_emp_status()
    {

        if (isset($_POST['active_btn'])) {

            $this->load->model('setups');
            if ($this->setups->change_emp_status()) {





                $this->session->set_flashdata('success', 'Employee Status Updated Successfully');
                redirect('portal/setup/action/setup_emp');
            }
        }

        if (isset($_POST['deactive_btn'])) {

            $this->load->model('setups');
            if ($this->setups->change_emp_status()) {




                $this->session->set_flashdata('success', 'Employee Status Updated Successfully');
                redirect('portal/setup/action/setup_emp');
            }
        }
    }
}
