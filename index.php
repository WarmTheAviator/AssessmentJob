<?php //Calls to connect to databasegeneral and to start the session between all of the website
include 'jobs/databaseconnect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head> <!--Calls for the html to refer to style.css and other css styles-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>sigmasigmaboy</title>
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    </head>

    <style>.colored-box {
    border: 2px solid 	#006400; /* Green border */
    background-color: #FFFFFF; /* White background */
    padding: 15px;
    display: inline-block;
    border-radius: 2px; /* Rounded corners */
    width: 1200px; 
    height: auto;" /* 170px recommended */
    }
    </style>

    <body>
        <!--Header Section-->
        <header>
            <!--Creates a navigation bar-->
            <div id="navbar" class="obj-width">
                <a href="index.php"><img class="logo" src="images/logo.png" alt=""></a> <!--Logo that is a button-->

                <ul id="menu">
                    <li><a href="">Home</a></li>
                    <li><a href="jobs/jobpage.php">Browse Jobs</a></li>
                    <li><a href="contact/contactpage.php">Contact Us</a></li> 
                    <?php if (isset($_SESSION["user"])): ?> <!--If the user is logged in then display the username and be able to logout when pressed-->
                            
                            <button id="w-btn"><a href="logout.php"><?php echo htmlspecialchars($_SESSION["user"]); ?></a></button>
                         
                        <?php elseif (is_null($_SESSION["user"])): ?> <!--If user is NOT logged in then show the join button to log in-->
                            <button id="w-btn"><a href="LoginReg/Login.html">Join</a></button> 
                        <?php endif; ?>

                    
                </ul>

                <i id="bar" class='bx bx-menu'></i>
            </div>
        </header>

        <!--Main middle section-->

        <section class="hero">
            <div class="hero-box obj-width"> 
                <div class="h-left">
                    <h1>Find the perfect employment position for you!</h1>
                    <p>Work with like-minded people, guaranteed efficiency</p>
                    <div class="search">
                        <input type="text" placeholder="Search your job here!">
                        <a id="g-btn" href="#">Search</a>
                    </div>
                </div>

                <div class="h-right">
                    <img src="images/hero1.png"alt="">
                </div>
            </div>
        </section>

        <!--FEATURES-->

        <section class="features sec-space obj-width">
            <h2>Need something done?</h2>
            <p>Most viewed and all time top selling services</p>

            <div class="fe-box">
                <div>
                    <img src="images/fe 1.png" alt="">
                    <h3>Post a Job</h3>
                    <p>It's free and easy to post a job. Simply fill in a title, description</p>
                </div>
                <div>
                    <img src="images/fe 2.png" alt="">
                    <h3>Work Independently</h3>
                    <p>Horrible Workmates? No Worries! Multiple Independent Contracts!</p>
                </div>
                <div>
                    <img src="images/fe 3.png" alt="">
                    <h3>Pay Safely</h3>
                    <p>It's free and easy to post a job. Simply fill in a title, description</p>
                </div>
                <div>
                    <img src="images/fe 4.png" alt="">
                    <h3>We're here to help</h3>
                    <p>It's free and easy to post a job. Simply fill in a title, description</p>
                </div>
            </div>
        </section>

        <!--JOB LISTING SECTION DIGGERS-->
        <section class="jobs sec-space obj-width">
            <h2>Jobs Available</h2>
            <p>Most viewed and all-time top-selling services</p>

            <!-- <ul class="job-id">
                <li data-target="all" class="active">Recent Listings</li>
                <li data-target="Freelancer">Freelancer</li>
                <li data-target="fulltime">Full time</li>
                <li data-target="partTime">Part Time</li>
            </ul>-->
            <!--PHP section-->
            <?php
            $sql = "SELECT * FROM jobListing ORDER BY id DESC"; //SQL we call for the specific database and list it by id 
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) { //If there is a result then show
                while ($row = $result->fetch_assoc()) { //Fetch all other data that that is on the same row as the id
                    $id = $row["id"];
                    //echoing the data from the database that was called
                    echo "<div class='colored-box'>";
                    echo "<li><h3>" . htmlspecialchars($row["title"]) . "</h3></li>";
                    echo "<p>Rate: $" . htmlspecialchars($row["rate"]) . "</p>";
                    echo "<p>" . htmlspecialchars($row["companyname"]) . "</p>";
                    echo "<hr>";
                    echo "<br>";
                    echo "<a href='detailedjob.php?id=$id'><button id='g-btn'>Details</button></a>";
                    
                  
                    echo "</div>";
                }
            } else { //If the database is empty then dont have any listing
                echo "No listings available.";
            }
            $conn->close();
            ?>
        </section>
        <!--Footer Section-->
        <!--Creates a footer with links to external websites-->
        <footer class="footer">
            <div class="obj">
                <div class="top">
                    <div>
                        <img class="logo" src="images/logo.png" alt="">
                        <p>Search your desired jobs.</p>
                    </div>
                    <div>
                        <!--Creates a button with logos with links attached-->
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



