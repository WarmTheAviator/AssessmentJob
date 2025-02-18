<?php
	// Get all the information from the call
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','Registration','','AssessmentJob');
	if($conn->connect_error){ //If there is an error with connection then no
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else { //If there is no connection error then send off to database
		$stmt = $conn->prepare("insert into Registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)"); //prepare to send off the info
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number); //bind the information from the variables to type eg string int
		$execval = $stmt->execute(); //Send it off to the database
		echo $execval;
		echo "Registration successfully...";
		header("Location: ../index.php"); //Direct back to home
		$stmt->close();
		$conn->close();
	}
?>