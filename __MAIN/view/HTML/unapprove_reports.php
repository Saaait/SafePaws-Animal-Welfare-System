<?php
session_start();
include 'db_connect.php';

if (isset($_GET['id'])) {
    $report_id = intval($_GET['id']);
    
    // Update the report's status to unapproved
    $sql = "UPDATE reports SET unapproved = TRUE WHERE id = $report_id";
    if (mysqli_query($conn, $sql)) {
        
        header("Location: report_info.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "No report ID specified.";
}
?>
