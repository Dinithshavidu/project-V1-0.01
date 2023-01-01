<?php
class Setups extends CI_Model
{

    

    public function add_emp()
    {

        $emp_id = "";
        $emp_nic = "";
        $emp_name = "";
        $emp_contact = "";
        $emp_email = "";
        $emp_cid = "";
        $emp_lorry = "";

      
        $emp_nic = $this->input->post('emp_nic');
        $emp_name = $this->input->post('emp_name');
        $emp_contact = $this->input->post('emp_contact');
        $emp_email = $this->input->post('emp_email');
        $emp_cid = $this->session->userdata('passed_user_national');

        $insert_to_emp = array(

            // 'emp_id' => $emp_id,
        
            'emp_nic' => $emp_nic,
            'emp_name' => $emp_name,
            'emp_contact' => $emp_contact,
            'emp_email' => $emp_email,
            'emp_cid' => $emp_cid,
           
        );

        $this->db->insert('employers', $insert_to_emp);

        return true;
    }

  

    public function get_Emp()
    {
     
        return $this->db->get('employers')->result();
    }

   
    public function change_emp_status()
    {
        $emp_status = "";
        $emp_status = $this->input->post('emp_status');
        $emp_id = $this->input->post('emp_id');

        $update_emp = array(
            'emp_active' => $emp_status,
        );

        $this->db->where('emp_id', $emp_id);
        $this->db->update('employers', $update_emp);

        return true;
    }


    
}
