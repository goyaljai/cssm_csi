<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
$id=$this->session->userdata['logged_in']['id'];
$valadmin=$this->session->userdata['logged_in']['admin'];
$username = ($this->session->userdata['logged_in']['username']);
} else {
	header("location: http://localhost/project/index.php/user_authentication");
}
?>
<head>
<title>Upload Form</title>
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url();?>css/upload_form_style.css">
<link rel= "stylesheet" type="text/css" href="<?php echo base_url(); ?>css/header_style.css">
</head>
<body>


<header>
      <div class="header">
         <strong>COLLABORATIVE &nbsp;SYSTEM &nbsp;OF &nbsp;STUDY &nbsp;MATERIAL</strong>
      </div>
   </header>
    <?php
         echo '<div class="mssgs">';
               echo 'Hello <b class="boll">' . $username.'</b>';
               if($valadmin == 1)
               {
                  echo " | Welcome to Admin Page";
               }
               else
               {
                  echo " | Welcome to Content Upload Page";
               }
         echo "</div>";

         echo "<div class='error_msg'>";
            if (isset($message_display)) {
            echo $message_display;
            }
         echo "</div>";

         echo "<nav>";
            echo '<ul>';
            if($valadmin == 1)
               {
               echo '<li><a href="http://localhost/project/index.php/user_authentication/user_login_process">Users List</a></li>';
               }
                echo '<li><a  href="http://localhost/project/index.php/file_display">Display Uploaded Files</a></li>';
               echo '<li><a class="acti" href="http://localhost/project/index.php/upload">Upload Files</a></li>';


               if($valadmin == 1)
               {
               echo '<li><a href="http://localhost/project/index.php/user_authentication/user_registration_show">Add New User</a></li>';
            }
               echo '<a class ="logout" href="http://localhost/project/index.php/user_authentication/logout">Logout</a>';
            echo "</ul>";
            echo '<div class = "select-style">';
            echo '<select ONCHANGE="location = this.options[this.selectedIndex].value;">';
            if($valadmin == 1)
               {
               echo '<option value="http://localhost/project/index.php/user_authentication/user_login_process">Users List</option>';
               }
               echo '<option value="http://localhost/project/index.php/file_display">Display Uploaded Files</option>';
               echo '<option selected="selected" value="http://localhost/project/index.php/upload">Upload Files</option>';


               if($valadmin == 1)
               {
               echo '<option value="http://localhost/project/index.php/user_authentication/user_registration_show">Add New User</option>';
               }echo '<a class ="logout" href="http://localhost/project/index.php/user_authentication/logout">Logout</a>';
            echo "</select>";
            echo "</div>";
          echo "</nav>";?>

	<div class="modal-content3">
              <?php
              //$id=$this->session->userdata['logged_in']['admin'];
              //echo "<h2> Upload a File :</h2>";
        echo '<div class="container3">';
              echo form_open_multipart('upload/do_upload/'.$id);
              //echo"<br/>";

              echo '<b>'.form_label('File Name : ').'</b>';
              //echo"<br/>";
              $opts = 'placeholder="Filename"';
              echo form_input('filename', '',$opts);
              //echo"<br/>";
              echo '<b>'.form_label('File Description : ').'</b>';
              //echo"<br/>";
              $opts = 'placeholder="File Description"';
              echo form_input('description', '',$opts);
              //echo"<br/>";echo"<br/>";
        //echo "</div>";
        //echo '<div class="dropall">';
              echo '<b>'.form_label('Stream : ').'</b>';
              $options = array(
                                'CSE'  => 'CSE',
                                'ECE'    => 'ECE',
                                'CCE' => 'CCE',
                                'MME' => 'MME',
                              );
              echo form_dropdown('branch', $options, 'CSE','class="drop"');
              //echo"<br/>";echo"<br/>";

              echo '<b>'.form_label('Semester : ').'</b>';
              $options = array(
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                '7' => '7',
                                '8' => '8',
                              );
              echo form_dropdown('semester', $options, '1','class="drop"');
              //echo"<br/>";echo"<br/>";

              echo '<b>'.form_label('Subject : ').'</b>';
              $options = array(
                                'DS' => 'Data Structures',
                                'DCS' => 'Digital Circuits and Systems',
                                'M-1' => 'Mathematics-1',
                                'M-2' => 'Mathematics-2',
                                'M-3' => 'Mathematics-3',
                                'OOP' => 'Object Oriented Programming',
                                'EEB' => 'Environmental Ecology and Biology',
                                'DBMS' => 'Database Management Systems',
                              );
              echo form_dropdown('courses', $options, 'DCS','class="drop"');
              //echo"<br/>";
              //echo"<br/>";
        //echo "</div>";
              ?>

				<b>File :</b>
				<input type="file" name="userfile" />


				<!--input type="submit" value="upload" /-->
				<button type="submit" name="upload">Upload</button>


        <!--span class="back-to-admin-portal">
				<a href="http://localhost/project/index.php/user_authentication/user_login_process/">| Back |</a>
        </span-->

				</form>
		</div>
	</div>

</body>
</html>