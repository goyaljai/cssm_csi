<html>
<?php
if (isset($this->session->userdata['logged_in']))
{
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $valadmin= ($this->session->userdata['logged_in']['admin']);
}
else {
header("location: project/index.php/user_authentication");
//header("location: project/index.php/file_display");
}
?>

<head>
    <title>Collaborative Content Management</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/user_page_style.css">
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
        echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
        echo "&nbsp;Welcome to Content Upload Page";
    echo "</div>";

    echo "<div class='error_msg'>";
        if (isset($message_display)) {
        echo $message_display;
        }
    echo "</div>";

//echo"<br/>";
//echo "<br/>";

    echo "<nav>";
        echo '<ul>';
            echo '<li><a class="acti" href="http://localhost/project/index.php/user_authentication/user_login_process">Dashboard</a></li>';
            echo '<li><a href="http://localhost/project/index.php/file_display">Display Uploaded Files</a></li>';
            echo '<li><a href="http://localhost/project/index.php/upload">Upload Files</a></li>';

            echo '<a class ="logout" href="http://localhost/project/index.php/user_authentication/logout">Logout</a>';
        echo "</ul>";
    echo "</nav>";
    ?>

<!--a href="http://localhost/project/index.php/upload">Upload Files</a>
<br/><br/>
<a href="http://localhost/project/index.php/file_display">Display Uploaded Files</a>
<br/><br/>
<a href="http://localhost/project/index.php/user_authentication/logout">Logout</a>
</div-->
<!--br/-->
</body>
</html>
