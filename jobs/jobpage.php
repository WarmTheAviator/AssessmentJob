<?php
include 'databaseconnect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Job Listing</title>
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    
    <style>.colored-box {
    border: 2px solid 	#006400; /* Blue border */
    background-color: #F0FFF0; /* Light blue background */
    padding: 15px;
    display: inline-block;
    border-radius: 2px; /* Rounded corners */
    width: 1200px; 
    height: auto;" /* 170px recommended */
    }

    #myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
    </style>

    <body>
        <!--Header Section-->
        <header>
            <div id="navbar" class="obj-width">
                <a href="../index.php"><img class="logo" src="../images/logo.png" alt=""></a>

                <ul id="menu">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="#">Browse Jobs</a></li>
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

        <!--JOB LISTING SECTION-->
        <section class="jobs sec-space obj-width extra-space">
            <h2>Jobs Available</h2>
            <p>Most viewed and all-time top-selling services</p>
            <br>
            <a id="g-btn" href="jobcreate.php">Create a Job Listing</a>
            
            <br>
            <br>
            

            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for jobs.." title="Type in a name">


            <ul id='myUL'>
            <?php
            $sql = "SELECT * FROM jobListing ORDER BY id DESC";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    //echo "<ul id='myUL'>";
                    echo "<br>";
                    echo "<div class='colored-box'>";
                    echo "<li><h3>" . htmlspecialchars($row["title"]) . "</h3></li>";
                    echo "<p>Rate: $" . htmlspecialchars($row["rate"]) . "</p>";
                    echo "<p>" . htmlspecialchars($row["companyname"]) . "</p>";
                    echo "<hr>";
                    echo "<br>";
                    echo "<a href='detailedjob.php?id=$id'><button id='g-btn'>Details</button></a>";

                  
                    echo "</div>";
                    //echo "</ul>";
                }
            } else {
                echo "No listings available.";
            }
            $conn->close();
            ?>
            </ul>
             
            
            <script>
                function myFunction() {
                     // Declare variables
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById('myInput');
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("myUL");
                    li = ul.getElementsByTagName('li');
                    console.log(li);
                    // Loop through all list items, and hide those who don't match the search query
                    
                    for (i = 0; i < li.length; i++) {
                    a = li[i].getElementsByTagName("h3")[0];
                    console.log(a);
                    //alert(a);
                        txtValue = a.textContent || a.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].parentElement.style.display = "";
                    } else {
                        li[i].parentElement.style.display = "none";
                    }
                }
            }
           
</script>
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

        <script src="job-list.js"></script>
        <script src="toggle.js"></script>
        <script src="jobSearch.js"></script>
        
    </body> 
</html>






