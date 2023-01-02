<?php
class Customers extends CI_Model
{
    
	public function new_customer_insert(){

		$cust_name = "";
		$cust_dob = "";
		$cust_address = "";
		$cus_no = "";
		$cust_weight = "";
		$cust_hight = "";
		$cust_city = "";
		$cust_active = 1;
		$cust_note = "";
        $cust_cr_emp_id = "";
        $cust_up_emp_id = "";
        $cust_time = "";	

	   $cust_name  = $this->input->post('cust_name');
	   $cust_dob  = $this->input->post('cust_dob');
	   $cust_address  = $this->input->post('cust_address');
	   $cus_no  = $this->input->post('cus_no');
	   $cust_weight  = $this->input->post('cust_weight');
	   $cust_hight  = $this->input->post('cust_hight');
	   $cust_city  = $this->input->post('cust_city');
	  
	   $cust_note  = $this->input->post('cust_note');
	   $cust_up_emp_id  = $this->input->post('cust_up_emp_id');
	   $cust_cr_emp_id  = $this->input->post('cust_cr_emp_id');
       $cust_time  = $this->input->post('cust_time');	

    
        $insert_to_customer = array(

            'cust_name' => $cust_name,
            'cust_dob' => $cust_dob, 
            'cust_address' => $cust_address,
            'cus_no' => $cus_no, 
            'cust_weight' => $cust_weight,
            'cust_hight' => $cust_hight,
			'cust_city' => $cust_city,
			'cust_active' => $cust_active,
            'cust_note' => $cust_note,
            'cust_up_emp_id' => $cust_up_emp_id,
            'cust_cr_emp_id' => $cust_cr_emp_id,
            'cust_created_at' => $cust_time,  
            'cust_updated_at' => $cust_time, 
               );
        
            $this->db->insert('customers',$insert_to_customer);


            return true;

	}

}
