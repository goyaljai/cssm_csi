

<html>
<?php
if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['admin']==1) {
;
} else {
	header("location: http://localhost/project/index.php/user_authentication");
}

?>
<head>
<title>Delete User Data</title>
<link rel = "stylesheet" type = "text/css"
   href = "<?php echo base_url(); ?>css/delete_form_style.css">
</head>

<body>
<!--div id="main">
<div id="login">
<h2>Deleting User</h2>
<hr/-->

<div class="modal-content4">
    <!--div-->
        <h3>Do you really want to delete the user ?</h3>
    <!--/div-->

    <div class="buttonY">
        <a href="<?php echo 'http://localhost/project/index.php/user_authentication/delete/'.$id; ?>"><button style="float: left;background-color: #dc7633" class="button">Yes</button></a>
    </div>
    <div class="buttonN">
        <a href="http://localhost/project/index.php/user_authentication/user_login_process/"><button style="float: right;background:#dc7633">No</button></a>
        <!--a href="http://localhost/project/index.php/user_authentication/">For Login Click Here</a-->
    </div>
</div>

<!--/div>
</div-->
</body>
</html>

