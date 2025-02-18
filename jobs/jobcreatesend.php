<?php
	$title = $_POST['title']; 	
	$rate = $_POST['rate']; 
	$employment = $_POST['employment']; 
	$location = $_POST['location']; 
	$companyname = $_POST['companyname']; 
	$vacancy = $_POST['vacancy']; 
	$workhour = $_POST['workhour']; 
	$jobdescription = $_POST['jobdescription']; 


	// Database connection
	$conn = new mysqli('localhost','jobListing','','AssessmentJob');
	if($conn->connect_error){ 
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into jobListing(title,rate,employment,location,companyname,vacancy,workhour,jobdescription) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssiss", $title, $rate, $employment, $location, $companyname, $vacancy, $workhour, $jobdescription);
		$execval = $stmt->execute();
		echo $execval;
		//echo $jobdescription;
		header("Location: jobpage.php");
		$stmt->close();
		$conn->close();
	}
?>

