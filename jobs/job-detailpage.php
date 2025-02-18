<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>sigmasigmaboy</title>
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
        
        <div id="jobDetails" class="extra-space obj-width"> 
        </div>
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
                        <a href="https://x.com/elonmusk"><i class='bx bxl-behance'></i></a>
                        <a href="https://www.instagram.com/reel/DEMJWowMfMs/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><i class='bx bxl-facebook-square'></i></a>
                        <a href="https://x.com/elonmusk"><i class='bx bxl-twitter'></i></a>
                    </div>
                </div>
            </div>
        </footer>
        
        <script> 
            document.addEventListener("DOMContentLoaded",()=>{
                const urlParam =new URLSearchParams(window.location.search);
                const index = urlParam.get("id");
                const selectJob= jCategory[index];

                const jobDetailsContainer = document.getElementById("jobDetails")
                jobDetailsContainer.innerHTML=`
                <div class="job-header"> 
                <div class ="job-img-row">
                    <img src="${selectJob.image}"  alt="job-header image" class ="job-header-image">
                    <div> 
                        <h2>${selectJob.companyName}</h2>
                        <span>${selectJob.location}</span>
                    </div>
                </div>
                <a id ="g-btn" href="applicationpage.php"> Apply Now</a>

            </div>


        <div class="features obj-width">
        

            <div class="fe-box">
                <div>
                    <img src="images/vacancy.png" alt="">
                    <h3>Vacancy</h3>
                    <p>${selectJob.vacancy}</p>
                </div>
                <div>
                    <img src="images/fe 1.png" alt="">
                    <h3>Position</h3>
                    <p>${selectJob.title} </p>
                </div>
                <div>
                    <img src="images/clock.png" alt="">
                    <h3>Hours</h3>
                    <p>${selectJob.hours}</p>
                </div>
                <div>
                    <img src="images/money.png " alt="">
                    <h3>Salary</h3>
                    <p>${selectJob.rate}</p>
                </div>
            </div>
        </div>
        <div class="job-description sec-space">
            <h3> Job Description</h3>
            <p> ${selectJob.description}</p>
            <h3> Employment Status</h3>
            <p>${selectJob.av}</p>
            <h3>Requirements</h3>
            <p>${selectJob.need}</p>




        </div>
                
                `
            })
        </script>

        <script src="job-list.js"></script>
        <script src="toggle.js"></script>
        <script src="jobSearch.js"></script>
        
    </body> 
</html>






