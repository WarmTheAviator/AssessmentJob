<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us!</title>
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    
    <body>
        <!--Header Section-->
        <header>
            <div id="navbar" class="obj-width">
                <a href="../index.php"><img class="logo" src="../images/logo.png" alt=""></a>
    
                <ul id="menu">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="jobpage.php">Browse Jobs</a></li>
                    <li><a href="../contact/contactpage.php">Contact Us</a></li> 
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
            <div class="contact-img">
                <h2>Job Creation</h2>
                <p></p>
                <img src="../images/Mail-sent-pana.webp" alt=""/> 
            </div>
            
            <form id="contact-form" method="POST" action="jobcreatesend.php"> <!-- Corrected action attribute -->
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" autocomplete="off" required/>
    
                <label for="rate">Rate:</label>
                <input type="text" name="rate" id="rate" autocomplete="off" required/> <!-- Fixed duplicate name attribute -->
                
                <label for="employment">Full Time or Part Time?</label>
                <input type="text" name="employment" id="employment" autocomplete="off" required/> <!-- Fixed duplicate name attribute -->

                <label for="location">Location of work?</label>
                <input type="text" name="location" id="location" autocomplete="off" required/> <!-- Fixed duplicate name attribute -->
               
                <label for="companyname">Company Name?</label>
                <input type="text" name="companyname" id="companyname" autocomplete="off" required/> <!-- Fixed duplicate name attribute -->

                <label for="vacancy">How many spots available?</label>
                <input type="number" name="vacancy" id="vacancy" autocomplete="off" required/> <!-- Fixed duplicate name attribute -->

                <label for="workhour">Work Hours:</label>
                <input type="text" name="workhour" id="workhour" autocomplete="off" required/> <!-- Fixed duplicate name attribute -->
                
                <label for="jobdescription">Description?</label>
                <input type="text" name="jobdescription" id="jobdescription" autocomplete="off" required/> <!-- Fixed duplicate name attribute -->
               
                <input type="submit" id="g-btn" value="Submit"/>
            </form>
        </section>
    
        <!--Footer Section-->
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



