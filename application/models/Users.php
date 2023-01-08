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

	public function retrieve_all_role_id_list()
	{

		$this->db->select('role_id')->from('userroles');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$i = 0;
			$myarray2 = array();

			foreach ($query->result() as $row1) {
				$myarray2[$i] = $row1->role_id;
				$i++;
			}

			return $myarray2;

		}

		return false;

	}

	public function retrieve_all_role_name_list()
	{

		$this->db->select('role_name')->from('userroles');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$i = 0;
			$myarray2 = array();

			foreach ($query->result() as $row1) {
				$myarray2[$i] = $row1->role_name;
				$i++;
			}

			return $myarray2;

		}

		return false;

	}

	public function user_nic_verifi()
	{
		$arr['user_nic'] = $this->input->post('nic');
		
		
		return $this->db->get_where('users', $arr)->row();
	}


    function load_user_from_db($passed_nic){

		$d_array = array();
		
		$this->db->select('*')->from('users')->where('user_nic',$passed_nic);
		$queryEE = $this->db->get();
	
		if ($queryEE->num_rows() > 0) {
	
			$d_array[0]= $queryEE->row()->user_nic;
			$d_array[1]= $queryEE->row()->user_name;
			// $d_array[2]= $queryEE->row()->user_role;
			$d_array[2]= $queryEE->row()->user_tpno;
			$d_array[3]= $queryEE->row()->user_eno;
			$d_array[4]= $queryEE->row()->user_address;
			$d_array[5]= $queryEE->row()->user_note;
			$d_array[6]= $queryEE->row()->user_status;
	
			return $d_array;
	}
			else{
	
			 return "no";
			
			}
	
	
	 }

	 public function get_userNIC()
	 {
		 return $this->db->select('user_nic,user_name')->from('users')->get()->result();
	 }

	 public	function changepassword(){

		$user_nic = "";
		$user_password = "";
		$user_updatetime ="";
		$user_updateid ="";
		

		$user_nic  = $this->input->post('user_nic');
		$user_password  = $this->input->post('user_password1');
		$user_updatetime  = $this->input->post('user_updatetime');
		$user_updateid  = $this->input->post('user_updateid');
		
		$hashed_pwrd = md5($user_password);

        $update_password = array(            
            
			'user_nic' => $user_nic,
			'user_password' => $hashed_pwrd,
			
            'user_updatetime' => $user_updatetime, 
			'user_updateid' => $user_updateid,			
			
               );    
		
			  
			
			$this->db->where('user_nic', $user_nic);
			$this->db->update('users',$update_password);

            return true;

	}

	public	function edituser(){

		$user_nic = "";
		$user_name = "";
		$user_address = "";
		$user_eno = "";
		$user_tpno = "";
		$user_note = "";
		//$user_password = "";
		$user_updateid = "";
		$user_updatetime = "";
		$user_status = "";

		$user_nic  = $this->input->post('user_nic');
		$user_name  = $this->input->post('user_name');
		$user_address  = $this->input->post('user_address');
		$user_eno  = $this->input->post('user_eno');
		$user_tpno  = $this->input->post('user_tpno');
		$user_note  = $this->input->post('user_note');
		//$user_password = $this->input->post('user_password1');
		$user_updateid  = $this->input->post('user_updateid');
		$user_updatetime = $this->input->post('user_updatetime');
		$user_status = $this->input->post('user_status');

		//$hashed_pwrd = md5($user_password);

        $edit_to_users = array(

            'user_nic' => $user_nic,
            
            'user_name' => $user_name,
            'user_address' => $user_address, 
			'user_eno' => $user_eno,
			'user_tpno' => $user_tpno,
            'user_note' => $user_note,
			//'user_password' => $hashed_pwrd,
			'user_updateid' => $user_updateid,
			'user_updatetime' => $user_updatetime,
			'user_status' => $user_status,
			
               );
        
			
			$this->db->where('user_nic', $user_nic);
			$this->db->update('users',$edit_to_users);

            return true;

	}

 



}