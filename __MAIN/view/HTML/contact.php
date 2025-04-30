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
    <title>Contact - SafePaws</title>
    <link rel="stylesheet" href="../CSS/nav.css"> <!--  nav css -->
    <link rel="stylesheet" href="../CSS/signin_login.css"> <!-- form css -->
    <link rel="stylesheet" href="../CSS/contact.css"> <!-- Contact page CSS -->
    <link rel="stylesheet" href="../CSS/footer.css"> <!--footer css-->
    <link rel="icon" type="imge/jpg" href="../Images/icon.png"> <!-- favicons tab icon -->
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

    <main>
    <div class="contact-container">
        <h1>Contact Us</h1>
        <p>We're here to help! Reach out to us using the contact information below.</p>
        <div class="contact-info">
            <p><strong>Address:</strong> Kathmandu, Nepal</p>
            <p><strong>Phone:</strong> (+977) 9812345678</p>
            <p><strong>Email:</strong> <a href="mailto:info@safepaws.com">info@safepaws.com</a></p><br>
          <center><b><P>No act of kindness is ever too small. Offering help to someone in need is one of the greatest gifts you can give—it has the power to change lives and create a lasting impact.</p><b></center>
        </div>
    </div>
</main>
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

  <!-- Signup Popup Modal -->
  <div id="signup-modal" class="modal hidden">
        <div class="modal-content">
            <span id="close-modal" class="close">&times;</span>
            <div id="signup-form-container" class="form-container">
                <h2 class="signuph2">Sign Up</h2>
                <form id="signup-form" action="signup.php" method="POST">
                    <div>
                        <input type="text" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div>
                        <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
                    </div>
                    <div>
                        <input type="password" id="password" name="upassword" placeholder="Password" required>
                    </div>
                    <div>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                    </div>
                    <div id="password-error" class="error-message"></div>
                    <div>
                        <input type="submit" value="Signup">
                    </div>
                    <div class="or-line"></div>
                    <label>Have an account?</label> <a href="#" id="switch-to-login">Log In</a>
                    <br>
                    <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                </form>
            </div>
            <div id="login-form-container" class="form-container hidden">
                <h2 class="signuph2">Log In</h2>
                <form id="login-form" action="login.php" method="POST">
                    <div>
                        <input type="email" id="login-email" name="login-email" placeholder="Email" required>
                    </div>
                    <div>
                        <input type="password" id="login-password" name="login-password" placeholder="Password" required>
                    </div>
                    <div id="password-error-login" class="error-message-login"></div>
                    <div>
                        <input type="submit" value="Log In">
                    </div>
                    <div class="or-line"></div>
                    <label>Don't have an account?</label> <a href="#" id="switch-to-signup">Sign Up</a>
                    <br>
                    <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                </form>
            </div>
        </div>
        <script src="../Js/signin_login.js"></script>
    </div>

    <script src="../Js/ad.js"></script>
</body>
</html>