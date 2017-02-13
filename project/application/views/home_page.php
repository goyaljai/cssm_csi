<html>
<?php
   if (isset($this->session->userdata['logged_in'])) 
   {
      header("location: http://localhost/project/index.php/user_authentication/user_login_process");
   }
?>

<head>
   <title>Colabrative Content Management</title>
   <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/home_page_style.css">
   <link rel= "stylesheet" type="text/css" href="<?php echo base_url(); ?>css/header_style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

   <header>
      <div class="header">
         <b>COLLABORATIVE &nbsp;SYSTEM &nbsp;OF &nbsp;STUDY &nbsp;MATERIAL</b>
      </div>
   </header>
   <div id="navigation_bar">
      <?php
            
            echo "<nav>";
            echo '<ul>';
               echo '<li><a class="acti" href="http://localhost/project/index.php/home">Home</a></li>';
         
               echo '<li><a href="#study">Access Study Material</a></li>';

               echo '<li><a href="#about">About</a></li>';
               echo '<li><a href="http://localhost/project/index.php/user_authentication/logout">Faculty Login</a></li>';

            echo "</ul>";
            echo '<div class = "select-style">';
            echo '<select ONCHANGE="location = this.options[this.selectedIndex].value;">';
               echo '<option selected="selected" value="http://localhost/project/index.php/home">Home</option>';
         
               echo '<option value="#study">Access Study Material</option>';

               echo '<option value="#about">About</option>';
               echo '<option value="http://localhost/project/index.php/user_authentication/logout">Faculty Login</option>';
            
            echo "</select>";
            echo "</div>";
            echo "</nav>";
     ?>
   </div>
   <div>
      <div class="first">
         <br/><br/><br/><br/><br/>
         <b>
         <div class="firsttext">
            <h2>COLLABORATIVE &nbsp;SYSTEM &nbsp;OF<br/>&nbsp;STUDY &nbsp;MATERIAL</h2></b>
         </div>
         <br/><br/><br/><br/><br/>
      </div>
   </div>

   <div class= "study" id="study" style= "border-bottom: solid #DC7633 5px;border-top: solid #DC7633 5px;">
   <div class = "container">
   <div class="heading"><b>Study Material : </b></div>
      <?php 
      echo '<br/>';
      echo form_open('home/retrieve');
      echo '<b>'.form_label('Stream :').'</b>';
              $options = array(
                                'CSE'  => 'CSE',
                                'ECE'    => 'ECE',
                                'CCE' => 'CCE',
                                'MME' => 'MME',
                              );
              echo form_dropdown('branch', $options, 'CSE','class="drop"');
              echo "&nbsp;&nbsp;&nbsp;";

              echo '<b>'.form_label('Semester :').'</b>';
              $options = array(
                                '1'  => '1',
                                '2'    => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                '7' => '7',
                                '8' => '8',
                              );
              echo form_dropdown('semester', $options, '1','class="drop"');
              //echo"<br/>";echo"<br/>";
              echo "&nbsp;&nbsp;&nbsp;";
              echo '<b>'.form_label('Subject :').'</b>';
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
              echo "&nbsp;&nbsp;&nbsp;";  
      ?>
      <button type="submit" name="submit">Get Study Material</button>
      </div>
   </div>

   <div class = "About" id = "about">
      <!-- About us -->
      <br/>
      <div class="heading"><b>ABOUT : </b></div>
      <br/>
      <div class="detail">
        <div class="three">
          COLLABORATIVE SYSTEM OF STUDY MATERIAL <br/>
          A Medium by which Faculty can share Study Material of all Kinds to the students. Be it a PDF or a text file, or a complete zip file, or video lectures, Faculty will be able to share all of their Educational Study Materials through this Platform. Platfom works on a MVC Framework, Backend in PHP. This makes it easy for different developers to work on a easy to interact framwork. This Web-App is a demo for project demonstration.
        </div>
      </div>
      <br/>
      <div class="heading"><b>DEVELOPERS : </b></div>
      <br/>
      <div class="detail">
        <div class="one">Neelesh Singh Rajpurohit<br/>Back-End Developer<br/>[15UCS082]</div>
        <div class= "two">Shreyansh Gupta<br/>Front-End Developer<br/>[15UCS135]</div>
      </div>
   </div>
  
   <div class="contact" >
      
      <br/>
      <div class="detail2">
        <div class="one">Address:<br/><br/>Room C212,<br/>Hostel BH-1<br/>LNMIIT, Jaipur</div>
        <div class="two">Email<br/>shrey.20may@gmail.com<br/><br/>Phone<br/>+91-9971751205</div>
      </div>
      <br/><br/><br/><br/>     <br/><br/><br/><br/>  
   </div>
  <div class="footer1">
      Copyright © 2016 | WIP CSI Project
  </div>
   

</body>
</html>