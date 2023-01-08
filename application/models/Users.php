<?php
class Users extends CI_Model
{
	public function validate()
	{
		$arr['user_nic'] = $this->input->post('nic');
		$arr['user_password'] = md5($this->input->post('password'));

		return $this->db->get_where('users', $arr)->row();
	}

	public function get_all_users()
	{
		return $this->db->get_where('users')->result();
	}

	public function new_user_insert()
	{

		$user_name = "";
		$user_password = "";
		$user_date = "";
		$user_nic = "";
		$user_role = "";
		$user_tpno = "";
		$user_eno = "";
		$user_address = "";
		$user_note = "";
		$user_updatetime = "";
		$user_updateid = "";
		$user_name = $this->input->post('user_name');
		$user_password = $this->input->post('user_password');
		$user_date = $this->input->post('user_nic');
		$user_nic = $this->input->post('user_nic');
		$user_role = $this->input->post('user_role');
		$user_tpno = $this->input->post('user_tpno');
		$user_eno = $this->input->post('user_eno');
		$user_address = $this->input->post('user_address');
		$user_note = $this->input->post('user_note');
		$user_updatetime = $this->input->post('user_updatetime');
		$user_updateid = $this->input->post('user_updateid');



		$hashed_pwrd = md5($user_password);




		$insert_to_users = array(

			'user_name' => $user_name,
			'user_password' => $hashed_pwrd,
			'user_date' => $user_date,
			'user_nic' => $user_nic,
			'user_role' => $user_role,
			'user_tpno' => $user_tpno,
			'user_eno' => $user_eno,
			'user_address' => $user_address,
			'user_note' => $user_note,
			'user_updatetime' => $user_updatetime,
			'user_updateid' => $user_updateid,
		);

		$this->db->insert('users', $insert_to_users);


		return true;

	}

}