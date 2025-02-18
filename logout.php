<?php
session_start();
session_destroy(); // Destroy session
$_SESSION["user"] = null;
echo json_encode(["status" => "logged_out"]);
header("Location: index.php");
?>