<?php
// Author : Neelesh Singh Rajpurohit
// Email :  Admin@StudyMedia.in
// Phone : +91-9971751205

//  LIST OF CONTROLLERS : DESCRIPTION

// End

Class File_display extends CI_Controller {

public function __construct() {
parent::__construct();

// Load session library
$this->load->library('session');

// Load database
//$this->load->database();
$this->load->model('file_database');
// Load URL Helper
$this->load->helper('url');
$this->load->helper('array');
$this->load->helper('form');
} // end of constructor function...

public function index() {
$data['userfiledata']=$this->file_database->extract_file(); 
$this->load->view('file_display_page',$data);
}

function download_file($filename) {
    // load download helder
    $this->load->helper('download');
    // read file contents
    $data = file_get_contents(base_url('/uploads/'.$filename));
    force_download($filename, $data);
}


function run_editing($filenum){
	$data['filenum']=$filenum;
	$this->load->view('edit_file',$data);
}


function edit_file($filenum){

                        $filedata = array(
                        	'num' => $filenum,
                        'description' => $this->input->post('description'),
                        'branch' => $this->input->post('branch'),
                        'semester' => $this->input->post('semester'),
                        'course' => $this->input->post('courses'),
                        );
                        
                        $result = $this->file_database->file_edit($filedata);
                        if ($result == TRUE) {
                                $data['message_display'] = 'File Details Updated Successfully !';
                        }else {
                                $data['message_display'] = 'Some Error Occured in writing the changes to the file';
                        }
                        $data['userfiledata']=$this->file_database->extract_file(); 
						$this->load->view('file_display_page',$data);
}


//______________________________________________ Function to call view to Delete file
public function delete_file($num) {
    $data['num']=$num;
$this->load->view('delete_file',$data);
}

public function delete($num){
    $this->load->model('file_database');
    $this->load->helper("file");

    $result = $this->file_database->delete_file($num);
    if ($result == TRUE) {
                                $data['message_display'] = 'File Deleted Successfully !';
                        }else {
                                $data['message_display'] = 'Some Error Occured while deleting the file';
                        }
                        $data['userfiledata']=$this->file_database->extract_file(); 
                        $this->load->view('file_display_page',$data);
}

}// end of File_display  CI_Controller
?>
