
<html>

<?php
if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['admin']==1) {
$valadmin=$this->session->userdata['logged_in']['admin'];
$username = ($this->session->userdata['logged_in']['username']);
} else {
	header("location: http://localhost/project/index.php/user_authentication");
}

?>

<head>
<title>Add New User</title>
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/registeration_form_style.css">
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
            echo validation_errors();
            echo "</div>";

            echo "<nav>";
            echo '<ul>';
            if($valadmin == 1)
               {
               echo '<li><a href="http://localhost/project/index.php/user_authentication/user_login_process">Users List</a></li>';
               }
                echo '<li><a  href="http://localhost/project/index.php/file_display">Display Uploaded Files</a></li>';
               echo '<li><a href="http://localhost/project/index.php/upload">Upload Files</a></li>';


               if($valadmin == 1)
               {
               echo '<li><a class="acti" href="http://localhost/project/index.php/user_authentication/user_registration_show">Add New User</a></li>';
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
               echo '<option value="http://localhost/project/index.php/upload">Upload Files</option>';


               if($valadmin == 1)
               {
               echo '<option selected="selected" value="http://localhost/project/index.php/user_authentication/user_registration_show">Add New User</option>';
               }echo '<a class ="logout" href="http://localhost/project/index.php/user_authentication/logout">Logout</a>';
            echo "</select>";
            echo "</div>";
          echo "</nav>";


            echo form_open('user_authentication/new_user_registration');

            echo "<div class='error_msg'>";
            if (isset($message_display)) {
            echo $message_display;
            }
            echo "</div>";



                            //echo"<br/>";
        echo '<div class="modal-content2">';

            echo '<div class="container2">';
                echo '<b>'.form_label('Create Username : ').'</b>';
                                            //echo"<br/>";
                                                    //echo form_input('username');
                echo '<input type="text" placeholder="Enter Username" name="username" id="name" required>';
                                                    //echo"<br/>";
                echo '<b>'.form_label('Email : ').'</b>';
                                                    //echo"<br/>";
                                                    /*$data = array(
                                                    'type' => 'email',
                                                    'name' => 'email_value'
                                                    );
                                                    echo form_input($data);*/
                echo '<input type="email" placeholder="Enter Email" name="email_value" id="email" required>';
                                                    //echo"<br/>";
                                                    //echo"<br/>";
                echo '<b>'.form_label('Password : ').'</b>';
                                                    //echo"<br/>";
                                                    //echo form_password('password');
                echo '<input type="password" placeholder="Enter Password" name="password" id="password" required>';

                                                    //echo"<br/>";
                                                    //echo"<br/>";
                echo '<b>'.form_label('User type : ').'</b>';
                                                    /*$options = array(
                                                                      'admin'  => 'Admin',
                                                                      'general'    => 'Uploader',
                                                                    );
                                                    echo form_dropdown('admin', $options, 'general','class="drop_down"' );*/
                                                    //echo"<br/>";
                                                    //echo"<br/>";

                            $options = array(
                        'admin'  => 'HOD',
                        'general'    => 'Faculty',
                      );
      echo form_dropdown('admin', $options, 'general','class="styled-select slate" required');
                                                    //echo form_submit('submit', 'Add User');
                echo '<button type="submit" name="submit">Add User</button>';
            echo "</div>";

            echo form_close();
                            //echo "</div>";
            ?>

            <!--span class="back-to-admin">
                <a href="http://localhost/project/index.php/user_authentication/user_login_process/" style="color: #DC7633">| Back to Admin Portal |</a>
            </span-->
        </div>

<!--a href="http://localhost/project/index.php/user_authentication/">For Login Click Here</a-->

</body>
</html>

