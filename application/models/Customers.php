<?php
class Customers extends CI_Model
{

	public function validate()
	{
		$arr['cus_no'] = $this->input->post('cus_no');

		return $this->db->get_where('customers', $arr)->row();
	}

	public function new_customer_insert()
	{

		$cust_name = "";
		$cust_dob = "";
		$cust_address = "";
		$cus_no = "";
		$cust_sex = "";
		$cust_mail = "";
		$cust_active = 1;
		$cust_note = "";
		$cust_cr_emp_id = "";
		$cust_up_emp_id = "";
		$cust_time = "";

		$cust_name = $this->input->post('cust_name');
		$cust_dob = $this->input->post('cust_dob');
		$cust_address = $this->input->post('cust_address');
		$cus_no = $this->input->post('cus_no');
		$cust_mail = $this->input->post('cust_mail');
		$cust_sex = $this->input->post('cust_sex');
		$cust_note = $this->input->post('cust_note');
		$cust_up_emp_id = $this->input->post('cust_up_emp_id');
		$cust_cr_emp_id = $this->input->post('cust_cr_emp_id');
		$cust_time = $this->input->post('cust_time');


		$insert_to_customer = array(

			'cust_name' => $cust_name,
			'cust_dob' => $cust_dob,
			'cust_address' => $cust_address,
			'cus_no' => $cus_no,
			'cust_mail' => $cust_mail,
			'cust_active' => $cust_active,
			'cust_sex' => $cust_sex,
			'cust_note' => $cust_note,
			'cust_up_emp_id' => $cust_up_emp_id,
			'cust_cr_emp_id' => $cust_cr_emp_id,
			'cust_created_at' => $cust_time,
			'cust_updated_at' => $cust_time,
		);

		$this->db->insert('customers', $insert_to_customer);


		return true;

	}

	public function customer_update()
	{

		$cust_name = "";
		$cust_address = "";
		$cus_no = "";
		$cust_mail = "";
		$cust_note = "";
		$cust_up_emp_id = "";
		$cust_time = "";

		$cust_name = $this->input->post('cust_name');
		$cust_address = $this->input->post('cust_address');
		$cus_no = $this->input->post('cus_no');
		$cust_mail = $this->input->post('cust_mail');
		$cust_note = $this->input->post('cust_note');
		$cust_up_emp_id = $this->input->post('cust_up_emp_id');
		$cust_time = $this->input->post('cust_time');
		$cust_id = $this->input->post('cust_id');
		$cust_active = $this->input->post('cust_active');

		$insert_to_customer = array(

			'cust_name' => $cust_name,
			'cust_address' => $cust_address,
			'cus_no' => $cus_no,
			'cust_mail' => $cust_mail,
			'cust_active' => $cust_active,
			'cust_note' => $cust_note,
			'cust_up_emp_id' => $cust_up_emp_id,
			'cust_updated_at' => $cust_time,
		);

		$this->db->where('cust_id', $cust_id);
		$this->db->update('customers', $insert_to_customer);



		return true;

	}

	public function retrieveCustomers()
	{
		return $this->db->select('*')->from('customers')->get()->result();
	}

	public function get_all_customers_formatted(){

		$this->db->order_by("cust_name", "asc");
		$query = $this->db->get('customers');
		$scheduler_groups = $query->result_array();
		
		$customers = array();

		foreach($scheduler_groups as $cust) {
		$c = new Customer();
		$c->id = $cust['cust_id'];
		$c->name = $cust['cust_name'];
		$customers[] = $c;	
	  }

	  return json_encode($customers);
	}

	public function customerDetails($cust_id)
	{

		$arr['cust_id'] = $cust_id;

		return $this->db->get_where('customers', $arr)->row();
	}

	

}

class Customer {}

?>