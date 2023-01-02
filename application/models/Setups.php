<?php
class Setups extends CI_Model
{
    
    public function popupbox() {
		echo ' <script > ';
		echo ' alert("Hello\nHow are you?"); ';
		echo '</script>';
	}
	
	public function new_section_insert(){

		$sec_name = "";
		$sec_note = "";
		$sec_create_at = "";
		$sec_active = "";
		
	   $sec_name  = $this->input->post('sec_name');
	   $sec_note  = $this->input->post('sec_note');
	   $sec_create_at  = $this->input->post('sec_create_at');
	   $sec_active  = $this->input->post('sec_active');
       
       $insert_to_sections = array(

            'sec_name' => $sec_name,
            'sec_note' => $sec_note, 
            'sec_create_at' => $sec_create_at,
            'sec_active' => $sec_active,
               );
        
            $this->db->insert('sections',$insert_to_sections);


            return true;

	}
	

}
