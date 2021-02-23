<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	function __construct() 
	{
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, OPTIONS');
		header('Access-Control-Request-Headers: Content-Type');
		  parent::__construct();
		  $this->load->model('TrackerModel');
		  date_default_timezone_set('Asia/Manila');
		  //echo date("Y-m-d H:i:s");
		  //Defines log date
		  $this->logdate = date("Y/m/d");

	}
	public function index($Reference_Number = '')
	{
		//Gathers inputs
		$input = array(
			'Reference_Number' => $Reference_Number != '' ? $Reference_Number : $this->input->get('rn')
		);

		//Validates input && Show modal if no reference number found
		if($input['Reference_Number'] == ''){

			$this->load->view('Tracker');
			$this->ReferenceInputModal();
			return;

		}

		//Adds to inputs
		$legend = $this->TrackerModel->getLegends();
		$input['Semester'] = $legend[0]['Semester'];
		$input['School_Year'] = $legend[0]['School_Year'];

		//Validates Reference Number
		$studentInfo = $this->TrackerModel->getStudentInfo($input);
		$status = $studentInfo->num_rows();
		$data = $studentInfo->result_array();
		if($status == 0){

			$this->load->view('Tracker');
			$this->ReferenceInput_Message('Invalid Reference Number');
			$this->ReferenceInputModal();
			return;

		}else{

			$this->session->set_userdata('Reference',$data[0]['Reference_Number']);
			$this->session->set_userdata('Semester',$input['Semester']);
			$this->session->set_userdata('School_Year',$input['School_Year']);
			$this->session->set_userdata('Name',$data[0]['First_Name'].' '.$data[0]['Middle_Name'].' '.$data[0]['Last_Name']);
			$this->load->view('Tracker');
		}
		

	}
	public function test(){
		$input = array(
			'Reference_Number' => $this->session->userdata('Reference'),
			'Semester' => $this->session->userdata('Semester'),
			'School_Year' => $this->session->userdata('School_Year')
		);
		echo json_encode($input);
	}
	public function getData(){

		

		$input = array(
			'Reference_Number' => $this->input->get('Reference'),
			'Semester' =>  $this->input->get('Semester'),
			'School_Year' =>  $this->input->get('SchoolYear')
		);
		$Previousdata = array(
			'ExamStatus' => 1,
			'AdvisingStatus' => 0,
			'PaymentStatus' => 0
		);

		$returndata = array(
			'ExamStatus' => 0,
			'AdvisingStatus' => 0,
			'PaymentStatus' => 0
		);
		$returndata['ExamStatus'] = $this->getExaminationStatus($input);
		$returndata['AdvisingStatus'] = $this->getAdvisingStatus($input);
		$returndata['PaymentStatus'] = $this->getPaymentStatus($input);

		//$diff = $this->getDifference($returndata,$test);

		echo json_encode($returndata);


	}
	private function getDifference($returndata,$test){

		$difference = 0;
		foreach($returndata as $index => $value){
			
			if($value != $test[$index]){
				$difference = 1;
				return $difference;
			}

		}
		return $difference;

	}
	private function getExaminationStatus($input){
		// BELL-BELL 2.18.21
		// Because i removed the course on TrackerModel > ExampStatus()
		// $status = $this->TrackerModel->ExamStatus($input);
		// if($status[0]['Course'] == 'N/A' || $status[0]['Course'] == '' || $status[0]['Course'] == null){
		// 	return 0;
		// }
		return 1;

	}
	private function getAdvisingStatus($input){

		$status = $this->TrackerModel->AdvisingStatus($input);
		return $status;
	}
	private function getPaymentStatus($input){

		$status = $this->TrackerModel->PaymentStatus($input);
		return $status;
		
	}
	private function getAdmissionStatus(){
		
	}
	private function ReferenceInputModal(){

		return $this->load->view('ReferenceInputModal');

	}
	private function ReferenceInput_Message($message = ''){

		$this->session->set_flashdata('InputMessage',$message);

	}
	// BELL-BELL 2.22.21
	public function ajax_done_student_number(){
		$std_no = $this->input->post('student_number');
		$ref_no = $this->input->post('reference_number');
		$data = $this->TrackerModel->ajax_student_number($std_no,$ref_no);
		echo json_encode($data);
	}
}
