<?php


class TrackerModel extends CI_Model{
	

	public function getStudentInfo($array)
	{	
		$this->db->select('Student_Number,Reference_Number,First_Name,Middle_Name,Last_Name,Applied_Semester,Applied_SchoolYear');
		$this->db->where('Reference_Number',$array['Reference_Number']);
		$result = $this->db->get('Student_Info');
		return $result;
	
    }
	public function getLegends()
	{	
		$result = $this->db->get('Legend');
		return $result->result_array();
	
	}
	public function ExamStatus($array){
		// BELL-BELL 2.18.21
		// $this->db->select('Student_Number,Reference_Number,Course');
		$this->db->select('Student_Number,Reference_Number');
		$this->db->where('Reference_Number',$array['Reference_Number']);
		$result = $this->db->get('Student_Info');
		return $result->result_array();

	}
	public function AdvisingStatus($array){

		$this->db->select('Reference_Number');
		$this->db->where('Reference_Number',$array['Reference_Number']);
		$this->db->where('semester',$array['Semester']);
		$this->db->where('schoolyear',$array['School_Year']);
		$result = $this->db->get('Fees_Temp_College');
		return $result->num_rows();

	}
	public function PaymentStatus($array){

		$this->db->select('Student_Number,Reference_Number');
		$this->db->where('Reference_Number',$array['Reference_Number']);
		$this->db->where('Semester',$array['Semester']);
		$this->db->where('SchoolYear',$array['School_Year']);
		$this->db->where('valid',1);
		$this->db->limit(1);
		$result = $this->db->get('EnrolledStudent_Payments');
		return $result->num_rows();

	}
	// BELL-BELL 2.22.21
	public function ajax_student_number($student_number,$reference_number){
		$this->db->select('Student_Number','Reference_Number');
		$this->db->where('Student_Number',$student_number);
		$this->db->where('Reference_Number',$reference_number);
		$result = $this->db->get('Student_Info')->result();
		if($result){
			return $result[0];
		}
	}


	
	
	


}
?>