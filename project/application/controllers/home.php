<?php

// Author : Neelesh Singh Rajpurohit
// Email :  Admin@StudyMedia.in
// Phone : +91-9971751205

//  LIST OF CONTROLLERS : DESCRIPTION

// End
Class Home extends CI_Controller {

public function __construct() {
parent::__construct();

//$this->load->database();
$this->load->model('file_database');
// Load session library
$this->load->library('session');
// Load URL Helper
$this->load->helper('url');
$this->load->helper('array');
$this->load->helper('form');
} // end of constructor function...

public function index() {
$data['userfiledata']=$this->file_database->extract_file(); 
$this->load->view('home_page');
}

public function retrieve()
{
	$data ['semester'] = $this->input->post('semester');
	$data ['branch'] = $this->input->post('branch');
	$data ['course'] = $this->input->post('courses');
	$ndata['userfiledata']=$this->file_database->retrieve_files($data); 

	$ndata ['semester'] = $this->input->post('semester');
	$ndata ['branch'] = $this->input->post('branch');
	$ndata ['course'] = $this->input->post('courses');
	$this->load->view('home_view_page',$ndata);
}       

}// end of class
