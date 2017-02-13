
<html>
<?php
if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['admin']==1) {
;
} else {
	header("location: http://localhost/project/index.php/user_authentication");
}

?>
<head>
<title>Edit User Data</title>
<link rel = "stylesheet" type = "text/css"
   href = "<?php echo base_url(); ?>css/edit_form_style.css">
</head>
<body>
<!--div id="main">
<div id="login">
<h2>Edit User Data</h2>
<hr/-->


			<?php
			echo "<div class='error_msg'>";
			echo validation_errors();
			echo "</div>";
			echo form_open('user_authentication/edit_user_data/'.$id);

			echo "<div class='error_msg'>";
			if (isset($message_display)) {
			echo $message_display;
			}
			echo "</div>";
				//echo"<br/>";
	echo '<div class="modal-content5">';

		echo '<div class="container5">';
			echo '<b>'.form_label('Username : ').'</b>';
				//echo"<br/>";
			$opts = 'placeholder="Enter Username"';
			echo form_input('username', '',$opts);
				//echo"<br/>";
			echo '<b>'.form_label('Email : ').'</b>';
				//echo"<br/>";
			$data = array(
			'type' => 'email',
			'name' => 'email_value'
			);
			$opts = 'placeholder="Enter Email"';
			echo form_input($data, '',$opts);
				//echo"<br/>";
				//echo"<br/>";
			echo '<b>'.form_label('Password : ').'</b>';
				//echo"<br/>";
			$opts = 'placeholder="Enter Password"';
			echo form_password('password', '',$opts);
				//echo"<br/>";
				//echo"<br/>";
			echo '<b>'.form_label('User type : ').'</b>';
			$options = array(
			                  'admin'  => 'HOD',
			                  'general'    => 'Faculty',
			                );
			echo form_dropdown('admin', $options, 'general','class="drop-down"');
				//echo"<br/>";
				//echo"<br/>";
			//echo form_submit('submit', 'Update User Data');
			echo '<button type="submit" name="submit">Update Data</button>';
		echo "</div>";
			echo form_close();
			?>

			<span class="back-to-admin-page">
			<a href="http://localhost/project/index.php/user_authentication/user_login_process/">| Back to Admin Portal |</a>
			</span>
				<!--a href="http://localhost/project/index.php/user_authentication/">For Login Click Here</a-->
	</div>

<!--/div>
</div-->
</body>
</html>

