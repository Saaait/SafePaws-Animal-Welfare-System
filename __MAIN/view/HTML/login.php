<?php
session_start();

include 'db_connect.php';

// Check if the request method is POST (form submitted)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL statement to check if the user exists and retrieve the stored password
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    
    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("ss", $email, $password);

    // Execute the statements
    $stmt->execute();
    
    $result = $stmt->get_result();

    // Check if any row matches (valid login)
    if ($result->num_rows > 0) {
        
        $user = $result->fetch_assoc();

        // Set the username and email in the session
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        
        // Check if the user is an admin
        if ($user['username'] == 'safepawsadmin' && $user['email'] == 'safepawsadmin@gmail.com') {
            $_SESSION['is_admin'] = true; // to check and set vaule in session that admin has login 
            echo "Redirecting to admin page";  // Indicate admin login
        } else {
            echo "Login successful!";  // Indicate successful login for a normal user
        }
    } else {
        echo "Invalid email or password";  
    }

   
    $stmt->close();
    $conn->close();
}
?>
