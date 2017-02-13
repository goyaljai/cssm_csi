

<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
;
} else {
	header("location: http://localhost/project/index.php/user_authentication");
}

?>
<head>
<title>Delete File</title>
<link rel = "stylesheet" type = "text/css"
   href = "<?php echo base_url(); ?>css/delete_file_style.css">
</head>
<body>

<!--h2>Deleting User Data</h2>
<hr/-->

<div class="modal-content9">
    <h3>Do you really want to delete this file ?</h3>


    <a href="<?php echo 'http://localhost/project/index.php/file_display/delete/'.$num; ?>"><button style="float: left;background-color: #dc7633">Yes</button></a>

    <a href="http://localhost/project/index.php/file_display/"><button style="float: right;background:#dc7633">No</button></a>
<!--a href="http://localhost/project/index.php/user_authentication/">For Login Click </a-->

</div>


</body>
</html>

