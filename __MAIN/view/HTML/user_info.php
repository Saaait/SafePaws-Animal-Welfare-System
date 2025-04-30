<?php

session_start();

// Include database connection
include 'db_connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info - SafePaws</title>
    <link rel="stylesheet" href="../CSS/nav.css"> <!--  nav css -->
    <link rel="stylesheet" href="../CSS/footer.css"> <!--footer css-->
    <link rel="stylesheet" href="../CSS/user_info.css"> <!--main css-->
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
                        <div class="user-info-nav"> <!-- different name than other specific for this page -->
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

    <div class="user-info">
        <h1>User Informations</h1>
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
               
            <tbody>
                <?php
                    
                    $sql = "SELECT * FROM users"; 
                    $result = mysqli_query($conn, $sql);

                   
                    if (!$result) {
                        die("Database query failed: " . mysqli_error($conn));
                    }

                  
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>"; 
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>"; 
                        echo "<td>
                                <button class='edit-button' data-id='" . $row['id'] . "'>Edit</button> | 
                                <a href='delete_user.php?id=" . $row['id'] . "' class='delete-button' onclick='return confirmDelete();'>Delete</a>
                                </td>"; 
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Edit User Form -->
    <div id="edit-form" style="display: none;">
    <span class="close-button" onclick="document.getElementById('edit-form').style.display='none'">&times;</span>
    <h2>Edit User Information</h2>
    <form action="edit_user.php" method="post">
        <input type="hidden" name="user_id" id="edit-user-id">
        <label>Username:</label>
        <input type="text" name="username" id="edit-username">
        <label>Email:</label>
        <input type="email" name="email" id="edit-email">
        <label>Phone:</label>
        <input type="text" name="phone" id="edit-phone">
        <label>Password:</label>
        <input type="password" name="password" id="edit-password">
        <button type="submit">Save Changes</button>
    </form>
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this user?');
}
</script>



     <!-- footer section -->
     <footer>
        <div class="footer-bottom">
            <p>&copy; 2024 SafePaws. All rights reserved.</p>
        </div>
    </footer>

    <script src="../Js/edit_user.js"></script>
</body>
</html>