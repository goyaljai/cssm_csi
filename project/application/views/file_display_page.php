<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
   $id=$this->session->userdata['logged_in']['id'];
   $valadmin=$this->session->userdata['logged_in']['admin'];
   $username = ($this->session->userdata['logged_in']['username']);
         $email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: project/index.php/user_authentication");
}
?>
<head>
      <title>Display Uploaded Files</title>
      <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/file_display_page_style.css">
      <link rel= "stylesheet" type="text/css" href="<?php echo base_url(); ?>css/header_style.css">
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
                  echo " | Welcome to Content Upload Page";
               }
         echo "</div>";

         echo "<div class='error_msg'>";
            if (isset($message_display)) {
            echo $message_display;
            }
         echo "</div>";

         //echo '<a href="http://localhost/project/index.php/upload">Upload Files</a>';

         /*if($valadmin==0){
         echo "<h2> Uploaded Files by you </h2>";
         }   else if($valadmin==1){
         echo "<h2> All Uploaded Files</h2>";
         }*/


   echo "<nav>";
            echo '<ul>';
            if($valadmin == 1)
               {
               echo '<li><a href="http://localhost/project/index.php/user_authentication/user_login_process">Users List</a></li>';
               }
                echo '<li><a class="acti" href="http://localhost/project/index.php/file_display">Display Uploaded Files</a></li>';
               echo '<li><a href="http://localhost/project/index.php/upload">Upload Files</a></li>';

              
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
               echo '<option selected="selected" value="http://localhost/project/index.php/file_display">Display Uploaded Files</option>';
               echo '<option value="http://localhost/project/index.php/upload">Upload Files</option>';

               
               if($valadmin == 1)
               {
               echo '<option value="http://localhost/project/index.php/user_authentication/user_registration_show">Add New User</option>';
               }echo '<a class ="logout" href="http://localhost/project/index.php/user_authentication/logout">Logout</a>';
            echo "</select>";
            echo "</div>";
            echo "</nav>";

         if($valadmin==0){
         echo "<h3> Uploaded Files by you </h3>";
         }   else if($valadmin==1){
         echo "<h3> All Uploaded Files</h3>";
         }

      ?>

<!-- Table of User  Login Data -->
<table>
   <tbody>
      <tr>
         <?php if($valadmin==1){ echo '<th>User ID</th>';}?>
         <th>File Name</th>
         <th>Description</th>
         <th> Branch </th>
         <th>Semester</th>
         <th>Course</th>
         <th> Download </th>
         <th> Edit </th>
         <th> Delete </th>
      </tr>

         <?php
         foreach ($userfiledata->result() as $row)
         {  if($valadmin==0){
            if($row->id == $id){
            ?>

      <tr>
         <td><?php echo $row->file_name;?></td>
         <td><?php echo $row->description;?></td>
         <td><?php echo $row->branch;?></td>
         <td><?php echo $row->semester;?></td>
         <td><?php echo $row->course;?></td>
         <td><a href="<?php echo 'http://localhost/project/index.php/file_display/download_file/'.$row->file_name;?>">Download</a></td>

         <td><a href="<?php echo 'http://localhost/project/index.php/file_display/run_editing/'.$row->num;?>">Edit </a></td>
         <td> <a href="<?php echo 'http://localhost/project/index.php/file_display/delete_file/'.$row->num; ?>">Delete</a></td>
      </tr>
            <?php }// end of if
            }else if($valadmin==1){  // end of 1st if
               ?>
      <tr>
         <td><?php echo $row->id;?></td>
         <td><?php echo $row->file_name;?></td>
         <td><?php echo $row->description;?></td>
         <td><?php echo $row->branch;?></td>
         <td><?php echo $row->semester;?></td>
            <td><?php echo $row->course;?></td>
         <td><a href="<?php echo 'http://localhost/project/index.php/file_display/download_file/'.$row->file_name;?>">Download</a></td>
         <td> <a href="<?php echo 'http://localhost/project/index.php/file_display/run_editing/'.$row->num;?>">Edit </a> </td>
         <td> <a href="<?php echo 'http://localhost/project/index.php/file_display/delete_file/'.$row->num; ?>">Delete</a> </td>
      </tr>

               <?php
            }// end of elseif
          }
         ?>
   </tbody>
</table>
<!--br><br-->
<!--a href="http://localhost/project/index.php/user_authentication/user_login_process">Back to Dashboard</a-->
</div>
<br/>