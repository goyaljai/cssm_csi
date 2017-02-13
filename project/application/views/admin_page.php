<html>
   <?php
      if (isset($this->session->userdata['logged_in'])) 
      {
         $username = ($this->session->userdata['logged_in']['username']);
         $email = ($this->session->userdata['logged_in']['email']);
         $valadmin= ($this->session->userdata['logged_in']['admin']);
      } 
      else 
      {
      header("location: project/index.php/user_authentication");
      }
   ?>

<head>
   <title>Colabrative Content Management</title>
   <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/admin_page_style.css">
   <link rel= "stylesheet" type="text/css" href="<?php echo base_url(); ?>css/header_style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"-->
</head>

<body>

   <header>
      <div class="header">
         <b>COLLABORATIVE &nbsp;SYSTEM &nbsp;OF &nbsp;STUDY &nbsp;MATERIAL</b>
      </div>
   </header>
   <div id="profile">
      <?php
         echo '<div class="mssgs">';
               echo "Hello <b>" . $username.'</b>';
               if($valadmin == 1)
               {
                  echo " | Welcome to Admin Page";
               }
               else
               {
                  echo "Welcome to Content Upload Page";
               }

         echo "</div>";
            echo "<div class='error_msg'>";
               if (isset($message_display)) 
               {
                  echo $message_display;
               }
            echo "</div>";
            echo "<nav>";
            echo '<ul>';
               echo '<li><a class="acti" href="http://localhost/project/index.php/user_authentication/user_login_process">Users List</a></li>';
         
               

               echo '<li><a href="http://localhost/project/index.php/file_display">Display Uploaded Files</a></li>';
               echo '<li><a href="http://localhost/project/index.php/upload">Upload Files</a></li>';

               echo '<li><a href="http://localhost/project/index.php/user_authentication/user_registration_show">Add New User</a></li>';
               echo '<a class ="logout" href="http://localhost/project/index.php/user_authentication/logout">Logout</a>';
            echo "</ul>";
            echo '<div class = "select-style">';
            echo '<select ONCHANGE="location = this.options[this.selectedIndex].value;">';
               echo '<option selected="selected" value="http://localhost/project/index.php/user_authentication/user_login_process">Users List</option>';
         
               

               echo '<option value="http://localhost/project/index.php/file_display">Display Uploaded Files</option>';
               echo '<option value="http://localhost/project/index.php/upload">Upload Files</option>';

               echo '<option value="http://localhost/project/index.php/user_authentication/user_registration_show">Add New User</option>';
               echo '<a class ="logout" href="http://localhost/project/index.php/user_authentication/logout">Logout</a>';
            echo "</select>";
            echo "</div>";
            echo "</nav>";
     ?>
      <br/><br/>
      <table>
         <tbody>
            <tr>
               <th>User Name</th>
		<th> User ID</th>
               <th>Email ID</th>
               <th>User Type</th>
               <th>Edit Details</th>
               <th>Delete User</th>
            </tr>
            <?php
            foreach ($userlogindata->result() as $row)
            {
            ?> <tr>
                  <td><?php echo $row->user_name;?></td>
		  <td><?php echo $row->id;?></td>
                  <td><?php echo $row->user_email;?></td>
                  <td><?php  if($row->admin==1){echo "HOD";} else{echo "Faculty";} ?></td>
                  <td> <a href="<?php echo 'http://localhost/project/index.php/user_authentication/edit_user_data_page/'.$row->id; ?>">Edit </a> </td>
                  <td> <a href="<?php echo 'http://localhost/project/index.php/user_authentication/delete_user/'.$row->id; ?>">Delete</a> </td>
               </tr>
            <?php }?>
         </tbody>
      </table>   
       <br/><br/>
   </div>
</body>
</html>
