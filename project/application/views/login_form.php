<!DOCTYPE html>

<html lang="en">

<?php
	if (isset($this->session->userdata['logged_in'])) 
	{
		header("location: http://localhost/project/index.php/user_authentication/user_login_process");
	}
?>

<head>
<title>Login</title>
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url();?>css/login_form_style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body >
	<?php
	    echo "<div class='error_msg'>";
		if (isset($error_message)) 
		{
			echo '<script type="text/javascript">alert("' . $error_message . '")</script>';
    		redirect('user_authentication', 'refresh');
		}
		echo "</div>";
	?>						

	<div class="modal-content">
		<?php echo form_open('user_authentication/user_login_process'); ?>
		<div class="imgcontainer">
			<h2>Login</h2>
		</div>

		<div class="container">
			<label>Username</label>
			<input type="text" placeholder="Enter Username" name="username" id="name" required>
			<label>Password</label>
			<input type="password" placeholder="Enter Password" name="password" id="password" required>
			<!--input type="submit" value="Login" name="submit"-->
			<button type="submit" name="submit">Login</button>
			<!--input type="checkbox" checked="checked"> Remember me-->
		</div>
		<?php echo form_close(); ?>
		<div class="home"><a href="http://localhost/project/index.php/home"> << Home</a></div>
	</div>
</body>

</html>


