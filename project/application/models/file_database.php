<?php
// Author : Neelesh Singh Rajpurohit
// Email :  Admin@StudyMedia.in
// Phone : +91-9971751205

//  LIST OF CONTROLLERS : DESCRIPTION


Class File_database extends CI_Model {

public function __construct() {
            parent::__construct();
            $this->load->database();
        }

// Insert file data in database
public function file_insert($filedata) {

		// Query to insert data in database
		$this->db->insert('files', $filedata);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

public function extract_file()  
      {  
         
         $query = $this->db->get('files');  
         return $query;  
      } 

public function file_edit($data){
// Query to edit data in database
$num = $data['num'];
$desc = $data['description'];
$branch = $data['branch'];
$sem = $data['semester'];
$course = $data['course'];

$edit_query = array('description'=>$desc,'branch'=>$branch,'semester'=>$sem,'course'=>$course);
$this->db->update('files',$edit_query,array('num'=>$num));
if ($this->db->affected_rows() > 0) {
return true;
}
else {
return false;
}
}


public function delete_file($num){
	$name_query = "select file_name from files where num ='$num'";
	$rs = $this->db->query($name_query);
	foreach ($rs->result() as $row)  {
		$file_name = $row->file_name;
	}
	$this->load->helper("file");
	unlink('./uploads/'.$file_name);
	$delete_query = "delete from files where num ='$num'";
	$this->db->query($delete_query);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
}

public function retrieve_files($data){
	$course = $data['course'];
	$branch = $data['branch'];
	$semester = $data['semester'];
	$query = "select * from files where course ='$course' and branch ='$branch' and semester = '$semester' ";
	$rs = $this->db->query($query);
	return $rs;
}

}// end of model 
