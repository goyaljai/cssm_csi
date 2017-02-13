<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
$id=$this->session->userdata['logged_in']['id'];
} else {
	header("location: http://localhost/project/index.php/user_authentication");
}
?>
<head>
<title>Edit File Details</title>
</head>
<link rel = "stylesheet" type = "text/css"
   href = "<?php echo base_url();?>css/edit_file_style.css">
<body>


<div class="modal-content10">
	<div class="container10">
		<?php
			//$id=$this->session->userdata['logged_in']['admin'];
			//echo "<h2> Edit File Details :</h2>";

			echo form_open_multipart('file_display/edit_file/'.$filenum);

//echo"<br/>";
			echo '<b>'.form_label('New File Description : ').'</b>';
//echo"<br/>";
			$opts = 'placeholder="File Description"';
			echo form_input('description', '',$opts);
//echo"<br/>";echo"<br/>";
			echo '<b>'.form_label('Stream : ').'</b>';
			$options = array(
	    		              'CSE'  => 'CSE',
    	    		          'ECE'    => 'ECE',
        	    		      'CCE' => 'CCE',
            	    		  'MME' => 'MME',
                			);
			echo form_dropdown('branch', $options, 'CSE','class="drop"');

			echo '<b>'.form_label('Semester : ').'</b>';
			$options = array(
	            	      '1' => '1',
    	            	  '2' => '2',
	    	              '3' => '3',
    	    	          '4' => '4',
        	    	      '5' => '5',
            	    	  '6' => '6',
                		  '7' => '7',
                		  '8' => '8',
                		);
			echo form_dropdown('semester', $options, '1','class="drop"');

			echo '<b>'.form_label('Subject : ').'</b>';
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
//echo"<br/>";
//echo"<br/>";
		?>

		<!--input type="submit" value="Update Details" /-->
		<button type="submit" name="submit">Update Details</button>
		<span class="back-to-uploded-page">
		<a href="http://localhost/project/index.php/file_display/">| Back |</a>
		</span>

		</form>

	</div>
</div>

</body>
</html>