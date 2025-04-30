<?php
include 'db_connect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $userId = $_GET['id']; 

    
    $sql = "DELETE FROM users WHERE id = $userId"; 

    
    if (mysqli_query($conn, $sql)) {
        header("Location: user_info.php"); 
    } else {
        echo "Error deleting user: " . mysqli_error($conn); 
    }

    mysqli_close($conn); 
}
?>
