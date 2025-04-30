<?php
session_start();
include 'db_connect.php';

if (isset($_GET['id'])) {
    $report_id = intval($_GET['id']);
    
    // Updates the report's status to found
    $sql = "UPDATE reports SET found = TRUE WHERE id = $report_id";
    if (mysqli_query($conn, $sql)) {
        
        header("Location: notification.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "No report ID specified.";
}
?>
