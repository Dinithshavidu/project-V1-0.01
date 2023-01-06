<?php
class Appointments extends CI_Model
{


	public function new_consultation_insert()
	{

		$ap_cs_cust_no = "";
		$ap_cs_service_type = "";
		$ap_cs_job_id = "";
		$ap_cs_treatment = "";
		$ap_cs_date = "";
		$ap_cs_alocate_time = "";
		$ap_cs_note = "";
		$ap_cs_active = "";
		$ap_cs_emp_id = "";
		$ap_cs_is_complete = "";
		$ap_cs_time = "";

		$ap_cs_cust_no = $this->input->post('ap_cs_cust_no');
		$ap_cs_service_type = $this->input->post('ap_cs_service_type');
		$ap_cs_job_id = $this->input->post('ap_cs_job_id');
		$ap_cs_treatment = $this->input->post('ap_cs_treatment');
		$ap_cs_date = $this->input->post('ap_cs_date');
		$ap_cs_alocate_time = $this->input->post('ap_cs_alocate_time');
		$ap_cs_note = $this->input->post('ap_cs_note');
		$ap_cs_active = $this->input->post('ap_cs_active');
		$ap_cs_emp_cr_id = $this->input->post('ap_cs_emp_id');
		$ap_cs_emp_up_id = $this->input->post('ap_cs_emp_id');
		$ap_cs_is_complete = $this->input->post('ap_cs_is_complete');
		$ap_cs_time = $this->input->post('ap_cs_time');

		$insert_to_consultation = array(

			'ap_cs_cust_no' => $ap_cs_cust_no,
			'ap_cs_service_type' => $ap_cs_service_type,
			'ap_cs_job_id' => $ap_cs_job_id,
			'ap_cs_treatment' => $ap_cs_treatment,
			'ap_cs_date' => $ap_cs_date,
			'ap_cs_alocate_time' => $ap_cs_alocate_time,
			'ap_cs_note' => $ap_cs_note,
			'ap_cs_active' => $ap_cs_active,
			'ap_cs_emp_cr_id' => $ap_cs_emp_cr_id,
			'ap_cs_emp_up_id' => $ap_cs_emp_up_id,
			'ap_cs_is_complete' => $ap_cs_is_complete,
			'ap_cs_created_at' => $ap_cs_time,
			'ap_cs_updated_at' => $ap_cs_time,
		);

		$this->db->insert('consultation', $insert_to_consultation);


		return true;

	}

	public function new_appointment_insert()
	{

		$ap_cust_no = "";
		$ap_service_type = "";
		$ap_job_id = "";
		$ap_treatment = "";
		$ap_date = "";
		$ap_alocate_time = "";
		$ap_note = "";
		$ap_active = "";
		$ap_emp_id = "";
		$ap_is_complete = "";
		$ap_time = "";

		$ap_cust_no = $this->input->post('ap_cust_no');
		$ap_service_type = $this->input->post('ap_service_type');
		$ap_job_id = $this->input->post('ap_job_id');
		$ap_treatment = $this->input->post('ap_treatment');
		$ap_date = $this->input->post('ap_date');
		$ap_alocate_time = $this->input->post('ap_alocate_time');
		$ap_note = $this->input->post('ap_note');
		$ap_active = $this->input->post('ap_active');
		$ap_emp_cr_id = $this->input->post('ap_emp_id');
		$ap_emp_up_id = $this->input->post('ap_emp_id');
		$ap_is_complete = $this->input->post('ap_is_complete');
		$ap_time = $this->input->post('ap_time');

		$insert_to_consultation = array(

			'ap_cust_no' => $ap_cust_no,
			'ap_service_type' => $ap_service_type,
			'ap_job_id' => $ap_job_id,
			'ap_treatment' => $ap_treatment,
			'ap_date' => $ap_date,
			'ap_alocate_time' => $ap_alocate_time,
			'ap_note' => $ap_note,
			'ap_active' => $ap_active,
			'ap_emp_cr_id' => $ap_emp_cr_id,
			'ap_emp_up_id' => $ap_emp_up_id,
			'ap_is_complete' => $ap_is_complete,
			'ap_created_at' => $ap_time,
			'ap_updated_at' => $ap_time,
		);

		$this->db->insert('appointment', $insert_to_consultation);


		return true;

	}

	public function new_job_insert()
	{

		$job_name = "";
		$job_created_at = "";
		$job_is_complete = "";
		$job_is_active = "";

		$job_name = $this->input->post('job_name');
		$job_created_at = $this->input->post('job_created_at');
		$job_is_complete = $this->input->post('job_is_complete');
		$job_is_active = $this->input->post('job_is_active');


		$insert_to_job = array(

			'job_name' => $job_name,
			'job_created_at' => $job_created_at,
			'job_is_complete' => $job_is_complete,
			'job_is_active' => $job_is_active,
		);

		$this->db->insert('jobs', $insert_to_job);


		return true;

	}


}