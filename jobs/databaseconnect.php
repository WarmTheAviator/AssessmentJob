<?php // Connecting to database function
$host = "localhost";
$user = "Registration";
$pass = "";
$dbname = "AssessmentJob";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>