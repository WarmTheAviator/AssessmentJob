<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$company = $_POST['company'];
	$reason = $_POST['reason'];
	

	// Database connection
	$conn = new mysqli('localhost','Registration','','AssessmentJob');
	if($conn->connect_error){ //If error then dont send
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into JobApplication(name,email,number,company,reason) values(?, ?, ?, ?, ?)"); // Prepare to send it with values
		$stmt->bind_param("ssiss", $name, $email,$number, $company, $reason); //Respective values corresponding to either string or int
		$execval = $stmt->execute(); // send it off to the db
		echo $execval;
		echo "Application Sent successfully...";
		header("Location: ../index.php");
		$stmt->close();
		$conn->close();
	}
?>