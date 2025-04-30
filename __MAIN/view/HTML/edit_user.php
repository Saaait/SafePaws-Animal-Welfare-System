<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET username='$username', email='$email', phone='$phone', password='$password' WHERE id='$userId'";
    if (mysqli_query($conn, $sql)) {
        header("Location: user_info.php"); 
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
