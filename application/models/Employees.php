<?php
class Employees extends CI_Model
{



    public function uploadExcel()
    {

        if (isset($_POST["Import"])) {

            echo $filename = $_FILES["file"]["tmp_name"];

            if ($_FILES["file"]["size"] > 0) {

                $emp_date = "";



                $emp_date = $this->input->post('emp_date');

                $emp_cid = $this->session->userdata('passed_user_national');

                $file = fopen($filename, "r");
                $i = 0;
                while (($emapData = fgetcsv($file, 10000, ",")) !== false) {

                    if ($i == 0) {
                    } else {

                        $emp_nic = $emapData[0];
                        $emp_check_in = $emapData[1];
                        $emp_check_out = $emapData[2];

                        $check_data  = $this->validate_date($emp_nic,$emp_date);
                        if (!$check_data) {
                            $insert_to_exceldb = array(


                                'emp_date' => $emp_date,
                                'emp_cid' => $emp_cid,
                                'emp_nic' => $emp_nic,
                                'emp_check_in' => $emp_check_in,
                                'emp_check_out' => $emp_check_out,
                            );
                        }
                        $this->db->insert('employee_data', $insert_to_exceldb);

                       

                    }

                    $i++;
                }
                fclose($file);
                return true;
            }
        }
    }


    public function validate_date($emp_nic,$emp_date)
    {

        $arr['emp_nic'] = $emp_nic;
		$arr['emp_date'] = $emp_date;
		
        return $this->db->get_where('employee_data', $arr)->row();
    }

    public function retrieveEmpAttend()
    {
        return $this->db->select('*')->from('employee_data')->join('employers', 'employers.emp_nic = employee_data.emp_nic')->get()->result();
    }
}
