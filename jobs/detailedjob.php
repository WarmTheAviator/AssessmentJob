<?php
// Get message from URL
$message = isset($_GET['id']) ? $_GET['id'] : "No message received.";
session_start();
?>

<?php echo htmlspecialchars($message);?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us!</title>
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    
    <style>.colored-box {
    border: 2px solid 	#000000; /* Black border */
    background-color: #FFFFFF; /* Light blue background */
    padding: 15px;
    display: inline-block;
    border-radius: 8px; /* Rounded corners */
    width: 1200px; 
    height: auto;
    }
    </style>

    <body>
        <!--Header Section-->
        <header>
            <!--Creates a navigation bar-->
            <div id="navbar" class="obj-width">
                <a href="../index.php"><img class="logo" src="../images/logo.png" alt=""></a>
    
                <ul id="menu">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../jobs/jobpage.php">Browse Jobs</a></li>
                    <li><a href="contactpage.php">Contact Us</a></li> 
                    <?php if (isset($_SESSION["user"])): ?>
                            
                            <button id="w-btn"><a href="../logout.php"><?php echo htmlspecialchars($_SESSION["user"]); ?></a></button>
                         
                        <?php elseif (is_null($_SESSION["user"])): ?>
                            <button id="w-btn"><a href="../LoginReg/Login.html">Join</a></button>
                        <?php endif; ?>

                    
                </ul>
    
                <i id="bar" class='bx bx-menu'></i>
            </div>
        </header>
        <!--Contact-->
        <section class="contact obj-width sec-space extra-space">
            <div class="colored-box">
            <?php 
            $id = $message;

            //echo $id;

            $conn = new mysqli('localhost','Registration','','AssessmentJob');
            if($conn->connect_error){
                echo "$conn->connect_error";
                die("Connection Failed : ". $conn->connect_error);
            } else {
                 //From the Job Database we will find an id
                 $sql = "SELECT * FROM jobListing WHERE id = '$id'";
         
                 $result = mysqli_query($conn, $sql);    
         
                 if (mysqli_num_rows($result) === 1) {
                    // We fetch the results and php echos the code it
                    $row = mysqli_fetch_assoc($result);
                    echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
                    echo "<h3>" . htmlspecialchars($row["companyname"]) . "</h3>";
                    echo "<h3> Rate: " . htmlspecialchars($row["rate"]) . "</h3>";
                    echo "<p> Spots Available: " . htmlspecialchars($row["vacancy"]) . "</p>";
                    echo "<p> Work Hours: " . htmlspecialchars($row["workhour"]) . "</p>";
                    echo "<hr>";
                    echo "<p>" . htmlspecialchars($row["jobdescription"]) . "</p>";
                    echo "<br>";
                    echo "<a id ='g-btn' href='applicationpage.php'> Apply Now</a>";
                 }
             }
            ?>
            
            
            </div>
        </section>
    
        <!--Footer Section-->
        <!--Creates a footer with links to external websites-->
        <footer class="footer">
            <div class="obj">
                <div class="top">
                    <div>
                        <img class="logo" src="../images/logo.png" alt="">
                        <p>Search your desired jobs.</p>
                    </div>
                    <div>
                        <a href="https://www.instagram.com/reel/DEMJWowMfMs/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><i class='bx bxl-instagram-alt'></i></a>
                        <a href="https://www.instagram.com/reel/DEMJWowMfMs/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><i class='bx bxl-behance'></i></a>
                        <a href="https://www.instagram.com/reel/DEMJWowMfMs/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><i class='bx bxl-facebook-square'></i></a>
                        <a href="https://www.instagram.com/reel/DEMJWowMfMs/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><i class='bx bxl-twitter'></i></a>
                    </div>
                </div>
            </div>
        </footer>
    
        <script src="toggle.js"></script>
        <script src="script.js"></script>
    </body>
</html>



