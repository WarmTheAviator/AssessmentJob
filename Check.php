<?php //Starts the session and if the user is logged in then send the message to all other php links
session_start();
if (isset($_SESSION["user"])) {
    echo json_encode(["logged_in" => true, "username" => $_SESSION["user"]]);
} else {//Else if not then the user is not logged in
    echo json_encode(["logged_in" => false]);
}
?>