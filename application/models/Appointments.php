<?php
class Appointments extends CI_Model
{

	public function getUserServiceRelation()
	{
		$this->db->select("*");
		$this->db->from('user_services_by_date');
		$this->db->join('users', 'users.user_nic = user_services_by_date.user_nic');
		$this->db->join('services', 'services.sr_id = user_services_by_date.sr_id');
		$query = $this->db->get()->result();
		
		return $query;
	}

	public function getAllApointments()
	{

		$selectArr = array(
			'ap_date' => $this->session->userdata("appointmentDateSelected"),
			'ap_active' => 1,
		);

		$this->db->select("*");
		$this->db->from('appointment');
		$this->db->join('customers', 'customers.cust_id = appointment.ap_cust_id');
		$this->db->join('services', 'services.sr_id = appointment.ap_sr_id');
		$this->db->where($selectArr);
		$query = $this->db->get()->result();
		return $query;
	}

	public function getAppointmentDataById()
	{
		$selectArr = array(
			'ap_job_id' => $this->input->post('appointmentId')
		);

		$this->db->select("*");
		$this->db->from('appointment');
		$this->db->join('customers', 'customers.cust_id = appointment.ap_cust_id');
		$this->db->join('services', 'services.sr_id = appointment.ap_sr_id');
		$this->db->where($selectArr);
		$query = $this->db->get()->result();
		return $query;
	}

	public function getTimeStartEnd()
	{
		$query = $this->db->get("time_slots")->result();
		return $query;
	}

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

		$ap_user_id = "";
		$ap_sr_id = "";
		$ap_service = $this->input->post('serviceAndEmp');
		$splArr = preg_split ("/\_/", $ap_service); 
		if($splArr){
			$ap_user_id = $splArr[0];
			$ap_sr_id = $splArr[1];
		}
		
		$ap_cust_id = $this->input->post('ap_cust_id');
		
		$ap_alocate_time = $this->input->post('ap_alocate_time');		
		$ap_note = $this->input->post('ap_note');
		$ap_emp_cr_id = $ap_user_id;
		$ap_emp_up_id = $ap_user_id;
		$ap_is_complete = $this->input->post('ap_is_complete');
		$ap_user_id = $ap_user_id;

		$ap_start_time = $this->input->post('ap_start_time');
		$ap_end_time = $this->input->post('ap_end_time');

		$ap_alocate_time = $this->getTimeGap($ap_start_time, $ap_end_time);

		$apColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));

		$ap_date = $this->input->post('ap_date');

		$insert_to_appointment = array(
			'ap_cust_id' => $ap_cust_id,
			'ap_sr_id' => $ap_sr_id,
			'ap_note' => $ap_note,
			'ap_emp_cr_id' => $ap_emp_cr_id,
			'ap_emp_up_id' => $ap_emp_up_id,			
			'ap_user_id' => $ap_user_id,
			'ap_start_time' => $ap_start_time,
			'ap_end_time' => $ap_end_time,
			'ap_alocate_time' => $ap_alocate_time,
			'ap_color' => $apColor,
			'ap_date' => $ap_date,
		);

		$this->db->insert('appointment', $insert_to_appointment);
		return true;

	}

	public function updateAppointment()
	{

		$ap_user_id = "";
		$ap_sr_id = "";
		$ap_service = $this->input->post('serviceAndEmp');
		$splArr = preg_split ("/\_/", $ap_service); 
		if($splArr){
			$ap_user_id = $splArr[0];
			$ap_sr_id = $splArr[1];
		}
		
		$ap_cust_id = $this->input->post('ap_cust_id');
		
		$ap_alocate_time = $this->input->post('ap_alocate_time');		
		$ap_note = $this->input->post('ap_note');
		$ap_emp_cr_id = $ap_user_id;
		$ap_emp_up_id = $ap_user_id;
		$ap_is_complete = $this->input->post('ap_is_complete');
		$ap_user_id = $ap_user_id;

		$ap_start_time = $this->input->post('ap_start_time');
		$ap_end_time = $this->input->post('ap_end_time');

		$ap_alocate_time = $this->getTimeGap($ap_start_time, $ap_end_time);

		$apColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));

		$ap_date = $this->input->post('ap_date');

		$update_appointment = array(
			'ap_cust_id' => $ap_cust_id,
			'ap_sr_id' => $ap_sr_id,
			'ap_note' => $ap_note,
			'ap_emp_cr_id' => $ap_emp_cr_id,
			'ap_emp_up_id' => $ap_emp_up_id,			
			'ap_user_id' => $ap_user_id,
			'ap_start_time' => $ap_start_time,
			'ap_end_time' => $ap_end_time,
			'ap_alocate_time' => $ap_alocate_time,
			'ap_color' => $apColor,
			'ap_date' => $ap_date,
		);

		$this->db->where('ap_job_id', $this->input->post('update_appointment'));
		$this->db->update('appointment', $update_appointment);
		return true;

	}

	public function startJob(){
		$updateQry = array(
			'ap_in_progress' => 1,
			'ap_color' => "#000000"
		);

		$this->db->where('ap_job_id', $this->input->post('ap_job_id'));
		$this->db->update('appointment', $updateQry);
		return true;
	}

	public function finishJob(){
		$updateQry = array(
			'ap_active' => 0,
			'ap_is_complete' => 1,
			'ap_in_progress' => -1,
		);

		$this->db->where('ap_job_id', $this->input->post('ap_job_id'));
		$this->db->update('appointment', $updateQry);
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

	public function get_all_users_flat(){

		$this->db->order_by("name", "asc");
		$query = $this->db->get('groups');
		$scheduler_groups = $query->result_array();
		
		$resources = array();

		$this->db->order_by("user_name", "asc");
		$query = $this->db->get('users');
		$usersData = $query->result_array();

		foreach($usersData as $resource) {
			$r = new Resource();
			$r->id = $resource['user_id'];
			$r->name = $resource['user_name'];
			$resources[] = $r;
		}

	  //header('Content-Type: application/json');	
	  return json_encode($resources);

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
		$e->customer = $row['customer'];

		$events[] = $e;
		}

		echo json_encode($events);

	}

	function getTimeGap($start, $end){
		$startSplit = $this->splitTime($start);
		$endSplit = $this->splitTime($end);
		
		$hrsTimeGap = (int)$endSplit[0] - (int)$startSplit[0];
		$minsTimeGap = (int)$endSplit[1] - (int)$startSplit[1];

		$hrsString = "";
		$minString = "";
		
		if($hrsTimeGap > 0){
			$hrsString = "".$hrsTimeGap." Hrs";
		}

		if($minsTimeGap > 0 || $minsTimeGap === -30){
			$minString = "".abs($minsTimeGap)." Mins";
		}

		$timeStr = "".($hrsString)." ".$minString."";
		
		return $timeStr;
	  }
	  
	  
	  function splitTime($time){
		$fSplit = preg_split("/\:/", $time);
		$hrs = $fSplit[0];
		$mins = preg_split("/\ /", $fSplit[1])[0];
		$tArray = [$hrs, $mins];
		return $tArray;
	  }

}

class Event {}
class Group {}
class Resource {}

?>
