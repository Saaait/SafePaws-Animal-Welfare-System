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
    <title>Blog - SafePaws</title>
    <link rel="stylesheet" href="../CSS/nav.css"> <!--  nav css -->
    <link rel="stylesheet" href="../CSS/signin_login.css"> <!-- form css -->
    <link rel="stylesheet" href="../CSS/footer.css"> <!--footer css-->
    <link rel="stylesheet" href="../CSS/blog.css"> <!--blog css-->
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
                            <a href="logout.php" class="logout-button">Logout</a>
                        </div>
                    <?php else: ?>
                        <button id="sign-up-button">SignUp / LogIn</button>
                    <?php endif; ?>
                <!-- SignUp / LogIn Button -->
            </nav>
        </div>
    </header>

 <!-- Blog Content -->
 <main>
      
      <center>
      <section class="blog-container">
        <div class="blog-entries">
        <article>
        <h2>The Importance of Pet Adoption</h2>
        <p>Adopting a pet can bring joy, companionship, and fulfillment into your life. When you choose to adopt, you're not only giving an animal a loving home, but you're also helping reduce overcrowding in shelters and fighting against animal homelessness. Many pets in shelters are abandoned or rescued from poor conditions, and by adopting, you’re giving them a second chance at a happy life.</p>
        <p>Adopted pets can provide unconditional love and emotional support, making them great companions for individuals and families alike. Additionally, adoption is often more affordable than purchasing pets from breeders, as many adoption fees cover initial vaccinations, microchipping, and spaying/neutering. If you're considering adoption, visit local shelters, ask questions, and take time to find a pet that fits your lifestyle and personality.</p>
    </article>
    
    <article>
        <h2>Pet Grooming Essentials</h2>
        <p>Regular grooming is essential for maintaining a pet’s health and happiness. Grooming isn’t just about keeping your pet looking neat; it also helps prevent infections, reduces shedding, and allows early detection of potential health issues such as skin conditions or parasites.</p>
        <p>Basic grooming includes brushing your pet’s fur to prevent matting, trimming their nails to avoid overgrowth, cleaning their ears to prevent infections, and giving them regular baths based on their coat type. At-home grooming can be a bonding experience, but professional groomers can provide specialized care for pets with thick coats or specific needs. Knowing when to seek professional grooming services ensures your pet remains comfortable and healthy.</p>
    </article>
    
    <article>
        <h2>Understanding Pet Behavior</h2>
        <p>Pets communicate in unique ways, and understanding their behavior can lead to a more harmonious relationship. Learning to read your pet’s body language helps you respond appropriately to their needs and emotions. For example, wagging tails, relaxed ears, and purring often indicate happiness, while flattened ears, growling, or hiding may signal fear or discomfort.</p>
        <p>Behavioral training, socialization, and routine playtime contribute to a well-adjusted pet. Pets may exhibit certain behaviors due to boredom, anxiety, or medical issues, so it’s crucial to observe changes and address them promptly. Seeking guidance from veterinarians or pet trainers can help resolve behavioral challenges and strengthen your bond with your pet.</p>
    </article>
    
    <article>
        <h2>Nutrition and Diet Tips for Pets</h2>
        <p>Providing a well-balanced diet is one of the most important aspects of pet care. Each pet has unique dietary needs based on their breed, age, size, and health conditions. High-quality pet food with essential nutrients, vitamins, and proteins ensures your pet stays energetic and healthy.</p>
        <p>Avoid giving pets human food that may be harmful, such as chocolate, onions, grapes, and caffeine. Consult with a veterinarian to determine the best diet plan for your pet. Proper hydration is also essential, so always provide fresh, clean water. A well-fed pet is a happy pet!</p>
    </article>
    
    <article>
        <h2>Exercise and Fitness for Pets</h2>
        <p>Regular exercise is essential for keeping pets physically and mentally healthy. Engaging in activities such as walking, running, and interactive play helps prevent obesity and reduces anxiety or destructive behavior.</p>
        <p>Different pets require varying levels of activity. While dogs enjoy outdoor walks and games, cats benefit from climbing structures and toys. Regular exercise strengthens the pet-owner bond and contributes to a well-balanced lifestyle. Always ensure your pet gets appropriate exercise based on their breed and energy levels.</p>
    </article>
    
    <article>
        <h2>Training and Obedience</h2>
        <p>Training your pet is crucial for developing good behavior and ensuring their safety. Teaching basic commands such as sit, stay, and come creates a foundation for proper manners and discipline.</p>
        <p>Positive reinforcement, including treats and praise, is an effective method to encourage good behavior. Consistency and patience are key in training, and professional trainers can assist with specific challenges. A well-trained pet is more adaptable to new environments and experiences.</p>
    </article>
    
    <article>
        <h2>Common Health Issues in Pets</h2>
        <p>Recognizing common pet health problems early can prevent serious complications. Issues like allergies, dental diseases, and ear infections are common in pets and require timely intervention.</p>
        <p>Regular check-ups and vaccinations help maintain good health. Owners should watch for changes in appetite, energy levels, or unusual behaviors, as these may indicate underlying health concerns. Consulting a veterinarian ensures pets receive the best possible care.</p>
    </article>
    
    <article>
        <h2>Pet Vaccination Guide</h2>
        <p>Vaccinations protect pets from life-threatening diseases like rabies, parvovirus, and distemper. Sticking to a proper vaccination schedule ensures long-term health and prevents outbreaks.</p>
        <p>Puppies and kittens require multiple vaccines in their early months, while adult pets need booster shots. Consulting a veterinarian for an appropriate vaccination plan helps keep pets safe and healthy throughout their lives.</p>
    </article>
    
    <article>
        <h2>Choosing the Right Pet</h2>
        <p>Before bringing a pet home, consider factors like living space, lifestyle, and time commitment. Different pets have different needs, and selecting the right one ensures a good match.</p>
        <p>Researching various breeds and species helps determine the best fit. Whether adopting a cat, dog, or small pet, understanding their temperament and requirements contributes to a happy and lifelong companionship.</p>
    </article>
    
    <article>
        <h2>Pet-Proofing Your Home</h2>
        <p>Making your home safe for pets is essential to prevent accidents and health risks. Secure loose wires, remove toxic plants, and keep hazardous substances out of reach.</p>
        <p>Providing designated play areas and comfortable resting spaces ensures pets feel secure. Pet-proofing helps create a safe and welcoming environment for your furry companions.</p>
    </article>
                    </div>
</section> 
      <!-- Resource Links Section -->
      <section class="resource-links">
          <div class="resource-card">
              <a href="https://www.pawlicy.com/blog/pet-care/" target="_blank">
                  <img src="../Images/pet-care.jpg" alt="Pet Care Blog" class="resource-image">
                  <h3>Pet Care Tips</h3>
                  <p>Essential advice and guidance for responsible pet care. Get insights into nutrition, exercise, and overall well-being for pets of all ages.</p>
                  <p class="resource-link">More on Pet Care</p>
              </a>
          </div>
          
          <div class="resource-card">
              <a href="https://www.pawlicy.com/blog/vet/" target="_blank">
                  <img src="../Images/vet-support.jpg" alt="Vet Support Blog" class="resource-image">
                  <h3>Veterinary Support</h3>
                  <p>Learn about the importance of regular veterinary care, including vaccinations, check-ups, and emergency care tips.</p>
                  <p class="resource-link">More on Vet Support</p>
              </a>
          </div>
          
          <div class="resource-card">
              <a href="https://www.pawlicy.com/blog/" target="_blank">
                  <img src="../Images/blog.jpg" alt="Pet Blog" class="resource-image">
                  <h3>More Blogs</h3>
                  <p>Explore a wide range of pet-related topics, from training tips to lifestyle guides, and discover how to enhance life with your pet.</p>
                  <p class="resource-link">More Blogs</p>
              </a>
          </div>
      </section>
  </main>
  </center> 

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