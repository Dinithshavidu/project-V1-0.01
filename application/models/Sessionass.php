<?php

class sessionass extends CI_Model
{



	function checksession()
	{
		$user_nic = $this->input->post('nic');

		$this->db->select('user_role')->from('users')->where('user_nic', $user_nic);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->user_role;
		}
		return false;

	}



	function retrieve_log_data()
	{
		$nic_passed = $this->input->post('nic');
		$this->db->select('user_name,user_nic,user_role')->from('users')->where('user_nic', $nic_passed);

		$query33 = $this->db->get();

		if ($query33->num_rows() > 0) {



			$aa = $query33->row()->user_name;
			$bb = $query33->row()->user_nic;
			$cc = $query33->row()->user_role;


			$mmaray = array($aa, $bb, $cc);

			return $mmaray;

		}

		return false;

	}








}