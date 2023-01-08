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
        $this->load->model('users');
        $user_role_id_list_for_admin = array();
        $user_role_id_list_for_admin = $this->users->retrieve_all_role_id_list();
        $this->session->set_userdata('user_role_id_list', $user_role_id_list_for_admin);

        //retrieve all nic list for admin
        $user_role_name_list_for_admin = array();
        $user_role_name_list_for_admin = $this->users->retrieve_all_role_name_list();
        $this->session->set_userdata('user_role_name_list', $user_role_name_list_for_admin);
    }

    public function adSection()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('setup/section');
        $this->load->view('templates/footer');

    }

    public function register()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('users/register');
        $this->load->view('templates/footer');
    }

    public function changePassword()
    {
        $this->load->model('users');
        $data['retrieveUserNic'] = $this->users->get_userNIC();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('users/password',$data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $this->load->model('users');
        $data['retrieveUserNic'] = $this->users->get_userNIC();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('users/edit',$data);
        $this->load->view('templates/footer');
    }

    function newuserinsert()
    {

        if (isset($_POST['addnew_user'])) {

            $this->load->model('users');
            $check = $this->users->user_nic_verifi();

            if ($check) {
                $this->session->set_flashdata('warning', 'Already User in This NIC');

                redirect('user/register');
            } else {
                if ($this->users->new_user_insert()) {
                    // set flash data
                    $this->session->set_flashdata('success', 'New User Added Successfully');
                    redirect('user/register');
                } // set flash data

            }
        }
    }

    public function load_user()
    {

        if (isset($_POST['get_user_list'])) {

            $selected_userr_nic = $_POST['get_user_list'];

            $temp_array = array();
            $this->load->model('users');
            $temp_array = $this->users->load_user_from_db($selected_userr_nic);


            echo json_encode(array("msg" => $temp_array));
        } else {
            echo 'no';
        }
    }
    function changeuserpassword()

    {

        if (isset($_POST['change_password'])) {

            $this->load->model('users');


            if ($this->users->changepassword()) {

                // set flash data
                $this->session->set_flashdata('success', 'User Password Changed Successfully');
                redirect('user/changePassword');
            } else {

                $this->session->set_flashdata('error', 'User Password Change Failed. Please Try Again');
                redirect('user/changePassword');
            }
        }
    }

    function useredit()

    {

        if (isset($_POST['edit_user'])) {

            $this->load->model('users');


            if ($this->users->edituser()) {

               
                redirect('user/edit');
            } else {

                redirect('user/edit');
            }
        }
    }

}