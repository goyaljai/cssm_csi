<?php
// Author : Neelesh Singh Rajpurohit
// Email :  Admin@StudyMedia.in
// Phone : +91-9971751205

//  LIST OF CONTROLLERS : DESCRIPTION


// End
session_start(); //we need to start session in order to access it through CI

Class User_authentication extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
//$this->load->database();
$this->load->model('login_database');
$this->load->model('file_database');

// Load URL Helper
$this->load->helper('url');
}




//______________________________________________ Function to Show login page
public function index() {
$this->load->view('login_form');
}




//______________________________________________ Function to  Show registration page
public function user_registration_show() {
$this->load->view('registration_form');
}


//______________________________________________ Function to  Show Edit USer data page
public function edit_user_data_page($id) {
	$data['id']=$id;
$this->load->view('edit_form',$data);
}


//______________________________________________ Function to  Delete USer data page
public function delete_user($id) {
	$data['id']=$id;
$this->load->view('delete_form',$data);
}


//______________________________________________ Function to  Validate and store registration data in database
public function new_user_registration() {

// Check validation for user input in SignUp form
$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
if ($this->form_validation->run() == FALSE) {
$this->load->view('registration_form');
} else {
	if($this->input->post('admin') == 'admin'){
		$valadmin=1;
	}else{
		$valadmin=0;
	}
$data = array(
'user_name' => $this->input->post('username'),
'user_email' => $this->input->post('email_value'),
'user_password' => $this->input->post('password'),
'admin'=> $valadmin,
);

$result = $this->login_database->registration_insert($data);
if ($result == TRUE) {
$data['message_display'] = 'User Added Successfully !';
$data['userlogindata']=$this->login_database->extract_user(); 
$this->load->view('admin_page',$data);
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('registration_form', $data);
}
}
}

// ______________________________________________ Function to Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])&& $this->session->userdata['logged_in']['admin']==1){
$data['userlogindata']=$this->login_database->extract_user(); 
$this->load->view('admin_page',$data);
}
else if(isset($this->session->userdata['logged_in'])&& $this->session->userdata['logged_in']['admin']==0){
	$data['userfiledata']=$this->file_database->extract_file(); 
	$this->load->view('file_display_page',$data);
	//$this->load->view('user_page');
}
else{
$this->load->view('login_form');
}
} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);
$result = $this->login_database->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->login_database->read_user_information($username);
if ($result != false) {
$session_data = array(							// Adding user data in session
'username' => $result[0]->user_name,
'email' => $result[0]->user_email,
'admin'=> $result[0]->admin,
'id' => $result[0]->id,
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
$data['userlogindata']=$this->login_database->extract_user(); 
if($session_data['admin']==1){
$this->load->view('admin_page',$data);
}else{
	$data['userfiledata']=$this->file_database->extract_file(); 
	$this->load->view('file_display_page',$data);

	//$this->load->view('user_page',$data);
}
}
} else {
$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('login_form', $data);
}
}
}

//______________________________________________ Function to  Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('login_form', $data);
}


//______________________________________________ Function to  Edit and store User data in database
public function edit_user_data($id) {

// Check validation for user input in SignUp form
$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
if ($this->form_validation->run() == FALSE) {
$this->load->view('edit_form');
} else {
	if($this->input->post('admin') == 'admin'){
		$valadmin=1;
	}else{
		$valadmin=0;
	}
$data = array(
'id' =>$id,
'user_name' => $this->input->post('username'),
'user_email' => $this->input->post('email_value'),
'user_password' => $this->input->post('password'),
'admin'=> $valadmin,
);

$result = $this->login_database->edit_user_data($data);
if ($result == TRUE) {
$data['message_display'] = 'Updation Successfully !';
$data['userlogindata']=$this->login_database->extract_user(); 
$this->load->view('admin_page', $data);
} else {
$data['message_display'] = 'Wrong Input or Username already exist!';
$this->load->view('edit_form', $data);
}
}
}


public function delete($id){
	$this->load->model('login_database');
	$result = $this->login_database->delete_user($id);
	if ($result == TRUE){
		$data['message_display'] = 'User Deleted Successfully !';
		$data['userlogindata']=$this->login_database->extract_user(); 
		$this->load->view('admin_page', $data);
	}else {
		$data['message_display'] = 'Something went wrong ! Cannot Delete User';
		$data['userlogindata']=$this->login_database->extract_user(); 
		$this->load->view('admin_page', $data);
	}
}

}

?>


