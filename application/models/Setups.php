<?php
class Setups extends CI_Model
{


    public function new_section_insert()
    {

        $sec_name = "";
        $sec_note = "";
        $sec_create_at = "";
        $sec_active = 1;

        $sec_name = $this->input->post('sec_name');
        $sec_note = $this->input->post('sec_note');
        //    $sec_create_at  = $this->input->post('sec_create_at');


        $insert_to_sections = array(

            'sec_name' => $sec_name,
            'sec_note' => $sec_note,
            // 'sec_create_at' => $sec_create_at,
            'sec_active' => $sec_active,
        );

        $this->db->insert('sections', $insert_to_sections);


        return true;

    }

    public function new_service_insert()
    {

        $sr_name = "";
        $sr_note = "";
        $sr_create_at = "";
        $sr_active = 1;
        $sr_sec_id = "";

        $sr_name = $this->input->post('sr_name');
        $sr_note = $this->input->post('sr_note');
        //    $sr_create_at  = $this->input->post('sr_create_at');
        //    $sr_active  = $this->input->post('sr_active');
        $sr_sec_id = $this->input->post('sr_sec_id');

        $insert_to_services = array(

            'sr_name' => $sr_name,
            'sr_note' => $sr_note,
            // 'sr_create_at' => $sr_create_at,
            'sr_active' => $sr_active,
            'sr_sec_id' => $sr_sec_id,
        );

        $this->db->insert('services', $insert_to_services);


        return true;

    }

    public function new_time_insert()
    {

        $tm_name = "";
        $tm_active = "";


        $tm_name = $this->input->post('tm_name');
        $tm_active = $this->input->post('tm_active');


        $insert_to_timess = array(

            'tm_name' => $tm_name,
            'tm_active' => $tm_active,

        );

        $this->db->insert('time_slots', $insert_to_timess);


        return true;

    }

    public function retrieveSections()
    {
        return $this->db->select('*')->from('sections')->get()->result();
    }
    public function retrieveServices()
    {
        return $this->db->select('*')->from('services')->join('sections', 'services.sr_sec_id = sections.sec_id')->get()->result();
    }


}