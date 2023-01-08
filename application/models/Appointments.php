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

	

	public function get_all_users_formatted(){

		$this->db->order_by("name", "asc");
		$query = $this->db->get('groups');
		$scheduler_groups = $query->result_array();
		
		$groups = array();

		foreach($scheduler_groups as $group) {
		$g = new Group();
		$g->id = "group_".$group['id'];
		$g->name = $group['name'];
		$g->expanded = true;
		$g->children = array();
		$groups[] = $g;

		$this->db->order_by("user_name", "asc");
		$query = $this->db->get_where('users', array('user_group_id =' => $group['id']));
		$scheduler_resources = $query->result_array();

		
		foreach($scheduler_resources as $resource) {
			$r = new Resource();
			$r->id = $resource['user_id'];
			$r->name = $resource['user_name'];
			$r->driving = 'Yes';
			$g->children[] = $r;
		}		
	  }

	  //header('Content-Type: application/json');	
	  return json_encode($groups);

	}

	public function get_all_events_by_userdata(){

		$query = $this->db->query('SELECT * FROM events WHERE resource_id is not null and NOT ((end <= '.$_GET["start"].') OR (start >= '.$_GET["end"].'))');
		$result = $query->result_array();
		
		$events = array();

		foreach($result as $row) {
		$e = new Event();
		$e->id = $row['id'];
		$e->text = $row['name'];
		$e->start = $row['start'];
		$e->end = $row['end'];
		$e->resource = $row['resource_id'];
		$e->color = $row['color'];

		$events[] = $e;
		}

		echo json_encode($events);

	}

}

class Event {}
class Group {}
class Resource {}

?>
