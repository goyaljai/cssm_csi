<html>
<head>
<title>Upload Form</title>
<link rel = "stylesheet" type = "text/css"
   href = "<?php echo base_url();?>css/upload_success_style.css">
</head>
<body>

<!--h3>Your file was successfully uploaded !</h3-->

<!--ul>
<?php /*foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; */?>
</ul-->


<div class="modal-container7">

	<?php
    echo '<div class="container7">';
    	echo "<div class='error_msg'>";
        	if (isset($message_display)) {
        	echo '<h3>'.$message_display.'</h3>';
        	}
    	echo "</div>";
	?>

 <a href="http://localhost/project/index.php/upload/"><button style="float: right;background:#dc7633">Upload Another File</button></a>
        <br/>
        <div class="backdash">
<a href="http://localhost/project/index.php/user_authentication/user_login_process">Back to Dashboard</a>
		</div>

	</div>
</div>

</body>
</html>