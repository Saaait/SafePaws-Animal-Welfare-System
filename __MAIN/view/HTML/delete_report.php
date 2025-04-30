<?php
include 'db_connect.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $userId = $_GET['id']; 

   
    $sql = "DELETE FROM reports WHERE id = $userId";

    // Execute the delete query
    if (mysqli_query($conn, $sql)) {
        header("Location: report_info.php"); 
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }

    mysqli_close($conn); 
}
?>
