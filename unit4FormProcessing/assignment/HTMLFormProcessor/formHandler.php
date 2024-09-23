<?php

	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$schoolName = $_POST["schoolName"];
	$emailAddress = $_POST["emailAddress"];
	$gradeLevel = $_POST["gradeLevel"];
	$majorOptions = $_POST["majorOptions"];
	$programInfo = $_POST["programInfo"];
	$programAdvisor = $_POST["programAdvisor"];
	$comments = $_POST["comments"];

	/* 
	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of Field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";
	*/
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Handler</title>
<style>
	body {
		background-color: #bbe4ff;
	}
	section {
		width:750px;
		margin:auto;
		padding-left: 20px;
    	background-color: #ffffff;
    	border-radius: 10px;
		padding-bottom: 20px;
	}
	h2 {
		font-size: 36px;
		text-align: center;
	}
</style>
</head>

<body>
	<section>
		<h2>Contact Form Response</h2>
		<p>Dear <?php echo $firstName. ", " .$lastName; ?></p>
		<p>
			Thank you for your interest in <?php echo $schoolName; ?>.
		</p>
		<p>
			We have you listed as an <?php echo $gradeLevel; ?> starting this fall.
		</p>
		<p>
			You have declared <?php echo $majorOptions; ?> as your major. 
		</p>
		<p>
			Based upon your responses we will provide the folloing information in our confirmation email to you at <?php echo $emailAddress; ?>.
		</p>
		<p>
			<?php echo $programInfo; ?>
		</p>
		<p>
			<?php echo $programAdvisor; ?>
		</p>
		<p>
			You have shared the following comments which we will review:
		</p>
		<p>
			<?php echo $comments; ?>
		</p>
	</section>
</body>
</html>
