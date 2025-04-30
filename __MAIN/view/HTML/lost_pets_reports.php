<?php
session_start();
include 'db_connect.php'; 


if (isset($_SESSION['email'])) {
    $userEmail = $_SESSION['email'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $petType = $_POST['pet-type'];
        $petName = $_POST['pet-name'];
        $description = $_POST['description'];
        $lastSeen = $_POST['last-seen'];
        $userName = $_POST['name'];
        $userPhone = $_POST['phone'];
        
        
        // Handle the file upload
        $photoName = basename($_FILES['photo']['name']);
        $photoTmpName = $_FILES['photo']['tmp_name'];
        $uploadDir = '../../report_img/';
        $photoPath = $uploadDir . $photoName;

        
        $allowedExtensions = ['jpeg', 'png', 'jpg'];
        $photoExtension = strtolower(pathinfo($photoName, PATHINFO_EXTENSION));

        // Check file format
        if (in_array($photoExtension, $allowedExtensions)) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($photoTmpName, $photoPath)) {
                
                $sql = "INSERT INTO reports (pet_type, pet_name, description, last_seen, name, phone, user_email, photo_path) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                
                
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssss", $petType, $petName, $description, $lastSeen, $userName, $userPhone, $userEmail, $photoPath);

                if ($stmt->execute()) {
                    echo "Report submitted successfully!";
                } else {
                    echo "Error: " . $stmt->error;
                }
                
                $stmt->close();
            } else {
                echo "Error: Failed to upload the photo.";
            }
        } else {
            echo "Error: Only JPEG, PNG, and JPG file formats are allowed.";
        }

    }
} else { 
    echo "Please Signup/Login to submit a report.";
    exit();
}

$conn->close();
?>
