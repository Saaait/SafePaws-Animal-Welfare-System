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
    <link rel="stylesheet" href="../CSS/report_info.css"> <!-- main css for reports -->
    <link rel="icon" type="image/jpg" href="../Images/icon.png"> <!-- favicons tab icon -->
    <script src="https://kit.fontawesome.com/cca1e4bf72.js" crossorigin="anonymous"></script>
</head>
<body>
    

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
                <!-- SignUp / LogIn Button -->
             
            </nav>
        </div>
    </header>

    <!-- Reported Pets Information Section -->
    <div class="report-info">
        <h1>Reported Lost Pets</h1>
        <table class="reports-table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Pet Type</th>
                    <th>Pet Name</th>
                    <th>Description</th>
                    <th>Last Seen</th>
                    <th>Reporter Name</th>
                    <th>Contact Phone</th> 
                    <!-- <th>Users Email</th> email not shown -->
                    <th style='text-align: center;'>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  
                    $sql = "SELECT * FROM reports"; 
                    $result = mysqli_query($conn, $sql);

                 
                    if (!$result) {
                        die("Database query failed: " . mysqli_error($conn));
                    }

                
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><img src='" . htmlspecialchars($row['photo_path']) . "' alt='Pet Photo' class='pet-photo'></td>";
                        echo "<td>" . htmlspecialchars($row['pet_type']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['pet_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['last_seen']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                        // echo "<td>" . htmlspecialchars($row['user_email']) . "</td>";
                        echo "<td>";
                        // if ($row['approved']) {
                        //     echo "<span style='color:green;'>Approved | </span>";
                        // } else {
                        //     echo "<a href='approve_reports.php?id=" . $row['id'] . "' class='approve-button'>Approve</a> | ";
                        // }
                        // if ($row['unapproved']) {
                        //     echo "<span style='color:red;'>Unapproved | </span>";
                        // } else {
                        //     echo "<a href='unapprove_reports.php?id=" . $row['id'] . "' class='approve-button'>Unapprove</a> | ";
                        // }
                        //last moment change
                        if ($row['approved']) {
                            echo "<span style='color:green;'>Approved | </span>";
                            echo "<span style='color:gray;'>Unapprove</span> | "; // Unclickable text
                        } elseif ($row['unapproved']) {
                            echo "<span style='color:red;'>Unapproved | </span>";
                            echo "<span style='color:gray;'>Approve</span> | "; // Unclickable text
                        } else {
                            echo "<a href='approve_reports.php?id=" . $row['id'] . "' class='approve-button'>Approve</a> | ";
                            echo "<a href='unapprove_reports.php?id=" . $row['id'] . "' class='approve-button'>Unapprove</a> | ";
                        }
                        

                        if ($row['found']) {
                            echo "<span style='color:green;'>Found | </span>";
                        } else {
                            echo "<span style='color:green;'>Missing | </span>";
                        }
                        echo "<a href='delete_report.php?id=" . $row['id'] . "' class='delete-button' onclick='return confirmDelete();'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer section -->
    <footer>
        <div class="footer-bottom">
            <p>&copy; 2024 SafePaws. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript for confirmation dialog on delete action -->
    <script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this report?');
    }
    </script>
</body>
</html>
