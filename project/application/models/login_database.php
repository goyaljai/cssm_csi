

<?php
// Author : Neelesh Singh Rajpurohit
// Email :  Admin@StudyMedia.in
// Phone : +91-9971751205



Class Login_database extends CI_Model {

public function __construct() {
            parent::__construct();
            $this->load->database();
        }

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "user_name =" . "'" . $data['user_name'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('user_login', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}

// Read data using username and password
public function login($data) {

$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($username) {

$condition = "user_name =" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

//______________________________________________________function to return DB of users to admin page.
public function extract_user()  
      {  
         
         $query = $this->db->get('user_login');  
         return $query;  
      }   


public function delete_user($id){				// function to delete a particular user !
		$delete_query = "delete from user_login where id ='$id'";
		$this->db->query($delete_query);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
}

/*public function edit_user($id){				// function to EDIT a particular user !
		$id = $_POST['id'];
		$name = $_POST['user_name'];
		$password = $_POST['user_password'];
		$email = $_POST['user_email'];
		$edit_query = array('user_name'=>$name,'user_email'=>$email,'user_password'=>$password);
		$this->db->update('user_login',$edit_query,array('id'=>$id));
}*/


public function edit_user_data($data) {				// Edit User data in database

// Query to check whether username already exist or not
$condition = "user_name =" . "'" . $data['user_name'] . "' and id !=".$data['id'];
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to edit data in database
//$this->db->insert('user_login', $data);
$id = $data['id'];
$name = $data['user_name'];
$password = $data['user_password'];
$email = $data['user_email'];
$valadmin = $data['admin'];
$edit_query = array('user_name'=>$name,'user_email'=>$email,'user_password'=>$password,'admin'=>$valadmin);
$this->db->update('user_login',$edit_query,array('id'=>$id));

if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}



} // end of the controller class

?>

