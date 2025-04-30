<?php
session_start();
include 'db_connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reported Pets - SafePaws</title>
    <link rel="stylesheet" href="../CSS/nav.css"> <!-- nav css -->
    <link rel="stylesheet" href="../CSS/footer.css"> <!-- footer css -->
    <link rel="stylesheet" href="../CSS/report_info.css"> <!-- main css for reports/notification -->
    <link rel="icon" type="image/jpg" href="../Images/icon.png"> <!-- favicons tab icon -->
    <script src="https://kit.fontawesome.com/cca1e4bf72.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <!-- Header Section with updated Navigation -->
    <header>
        <div class="container">
            <nav>
                <!-- Logo Section -->
                <a href="ad.php" class="logo">
                <img src="../Images/OFFICIAL_logoV.1.png" alt="SafePaws Logo" class="logo-img">
                </a>
    
                <!-- Navigation Links -->
                <ul class="nav-links">
                    <li><a href="ad.php">Home</a></li>
                    <li class="services-dropdown">
                        <a href="#">Services</a>
                        <div class="dropdown-content">
                            <a href="report.php">Report Lost Pet</a>
                            <a href="lost.php">Lost Pets</a>
                            <a href="adopt.php">Adoption</a>
                            <a href="training.php">Training & Grooming</a>
                            <a href="vet.php">Vet Support</a>
                        </div>
                    </li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="donate.php">Donate</a></li>
                    <li><a href="Aboutus.php">About us</a></li>
                </ul>
    
                    <!-- User Greeting / Logout Button -->
                    <?php if (isset($_SESSION['username'])): ?>
                        <div class="user-info">
                            <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                            
                            <!-- Notifications -->
                            <div class="notification-nav">
                            <a href="notification.php" class="notification-btn">
                                <i class="fa-solid fa-bell"></i>
                            </a>
                            </div>

                            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                                <a href="admin.php" class="admin-link"><i class="fa-solid fa-user"></i></a>
                            <?php endif; ?>
                            <a href="logout.php" class="logout-button">Logout</a>
                        </div>
                    <?php else: ?>
                        <button id="sign-up-button">SignUp / LogIn</button>
                    <?php endif; ?>
               
            </nav>
        </div>
    </header>

    <!-- Reported Pets Information Section -->
    <div class="report-info">
        <h1>Notification</h1>
        <table class="reports-table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Pet Type</th>
                    <th>Pet Name</th>
                    <th>Reporter Name</th>
                    <th>Contact Phone</th> 
                    <th style='text-align: center;'>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Ensure the user is logged in and the email is set in the session
                    if (isset($_SESSION['email'])) {
                        $loggedInEmail = mysqli_real_escape_string($conn, $_SESSION['email']); 

                      
                        $sql = "SELECT * FROM reports WHERE user_email = '$loggedInEmail'";
                        $result = mysqli_query($conn, $sql);

                        
                        if (!$result) {
                            die("Database query failed: " . mysqli_error($conn));
                        }

                        // Check if there are any reports for the user
                        if (mysqli_num_rows($result) > 0) {
                           
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td><img src='" . htmlspecialchars($row['photo_path']) . "' alt='Pet Photo' class='pet-photo'></td>";
                                echo "<td>" . htmlspecialchars($row['pet_type']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['pet_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                                echo "<td>";
                                if ($row['approved']) {
                                    echo "<span style='color:green;'>Approved | </span>";
                                    
                                    if ($row['found']) {
                                        echo "<span style='color:green;'>Founded</span>";
                                    } else {
                                        echo "<a href='found_report.php?id=" . $row['id'] . "' class='found-button'>Found?</a>";
                                    }
                                    
                                } else if ($row['unapproved']) {
                                    echo "<span style='color:red;'>Unapproved</span>";
                                } else {
                                    echo "<span> Pending </span>";
                                }
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' style='text-align: center;'>No reports.</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' style='text-align: center;'>You must be logged in to view reports.</td></tr>";
                    }
                ?>
            </tbody>

        </table>
    </div>

    <!-- footer section -->
    <footer>
        <div class="footer-content">
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="ad.php">Home</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="donate.php">Donate</a></li>
                    <li><a href="Aboutus.php">About us</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
            <div class="footer-contact">
                <h3>Contact Information</h3>
                <p>Address: Kathmandu, Nepal</p>
                <p>Phone: (+977) 9812345678 </p>
                <p>Email: <a href="mailto:#">info@safepaws.com</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 SafePaws. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
