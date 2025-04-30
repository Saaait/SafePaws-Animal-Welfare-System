<?php

session_start(); 


include 'db_connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt - SafePaws</title>
    <link rel="stylesheet" href="../CSS/nav.css"> <!--  nav css -->
    <link rel="stylesheet" href="../CSS/signin_login.css"> <!-- form css -->
    <link rel="stylesheet" href="../CSS/footer.css"> <!--footer css-->
    <link rel="stylesheet" href="../CSS/about.css"> <!--aboutus css-->
    <link rel="icon" type="imge/jpg" href="../Images/icon.png"> <!-- favicons tab icon -->
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

                            <!-- SignUp / LogIn Button -->
                            <a href="logout.php" class="logout-button">Logout</a>
                        </div>
                    <?php else: ?>
                        <button id="sign-up-button">SignUp / LogIn</button>
                    <?php endif; ?>
               
            </nav>
        </div>
    </header>

 
    <main>
        <section class="about-us">
           <center><h1>About Us</h1>
            <p>Welcome to SafePaws, a platform dedicated to improving the lives of animals in need. Our mission is to connect shelters with resources, promote animal welfare, and provide a supportive community for pet lovers. We believe that every animal deserves a loving home, and through our innovative platform, we strive to make that a reality.</p>
        </center> 
         <center> <h2>Our Founders</h2>  
            <div class="founders">
                <div class="founder">
                    
                    <h3>Anuj Sijapati</h3>
                    <p>I am a passionate and dedicated student currently in the 4th semester of my BCA program. My enthusiasm for technology drives me to explore innovative solutions that can positively impact our world. As a pet lover, I have always believed in the importance of animal welfare, which inspired me to co-create SafePaws together with Saait. My goal is to utilize my skills in web design and development to create a user-friendly platform that empowers pet owners and enhances the lives of animals in need. Through SafePaws, I aim to connect our community with essential resources, fostering a culture of compassion and care for our furry friends.</p>
                </div>
                   
                <div class="founder">
                    
                    <h3>Saait Prasad Pradhan</h3>
                    <p>As a fellow BCA student and a strong advocate for animal welfare, I share a deep commitment to our mission at SafePaws. I focus on ensuring that our platform not only meets the needs of pet owners but also serves as a valuable resource for anyone looking to help animals in distress. My passion for technology and design fuels my drive to make SafePaws an engaging and impactful experience, where users can find everything from adoption information to training resources. Our collective vision is to create a supportive community that inspires action and fosters a better environment for pets and their owners alike.</p>
                </div>
            </div>
        </center>
            <center>
            <h2>Our Vision</h2>
        
            <p>
                Here’s an expanded version of your vision statement for the SafePaws "About Us" section:
                
                At SafePaws, we envision a world where every animal finds a safe and loving home. Our mission extends beyond just providing a platform; we are dedicated to educating pet owners about the responsibilities that come with pet ownership. By offering valuable resources and information, we strive to promote responsible practices that ensure the well-being of pets throughout their lives.
                
                We aim to create a robust network of support for everyone involved in animal welfare, from pet owners and shelters to veterinarians and volunteers. Through collaboration and shared knowledge, we hope to foster a community that prioritizes the needs of animals and advocates for their rights. Our commitment to awareness and advocacy seeks to bridge the gap between those who need help and those who can provide it, ultimately leading to a brighter future for all animals in our care. Together, we can make a meaningful difference and ensure that every pet has the opportunity to thrive in a loving environment.</p>
            </center>
          <center> <h2>Get Involved</h2>
            <p>If you’re passionate about making a difference in the lives of animals, we invite you to join us in our mission! At SafePaws, there are many ways to get involved and contribute to the well-being of pets in our community. Whether you’re looking to adopt a loving companion, provide a safe foster home, volunteer your time and skills, or simply learn more about responsible animal care, SafePaws is the perfect place to begin your journey. Together, we can create a supportive environment that champions the welfare of animals and fosters a culture of compassion and responsibility.</p>
        </center> 
        </section>
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
                        <input type="tel" id="phone" name="phone" placeholder="Phone Number" minlength="10" maxlength="10" required>
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