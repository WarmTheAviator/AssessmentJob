<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
   $conn = new mysqli('localhost','Registration','','AssessmentJob');
   if($conn->connect_error){
       echo "$conn->connect_error";
       die("Connection Failed : ". $conn->connect_error);
   } else {
        //From the Registration Database we will find an email
        $sql = "SELECT * FROM Registration WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($conn, $sql);    

        if (mysqli_num_rows($result) === 1) { // if we manage to find one that is equivalent in the database then proceed
            $row = mysqli_fetch_assoc($result); // Fetch all other datas that are in the same row
            if($row['email'] === $email && $row['password'] === $password) { //If password and email is the same as the one in the datbase then proceed
                $_SESSION["user"] = $row['email']; //Sends a message to all php that there is currently a session going on with user
                header("Location: ../index.php"); // Redirects back
                echo json_encode(["status" => "success"]); //Sends a message that it was a success
                exit();
            } elseif($row['email'] != $email or $row['password'] != $password) { //Else if not match
                header("Location: ../index.php"); // Redirects back
                echo json_encode(["status" => "failed"]);
                echo "Failed";
                echo "alert('Incorrect email or password')";
                exit();
            }
        }
    }
?>

