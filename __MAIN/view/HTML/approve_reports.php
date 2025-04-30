<?php
session_start();
include 'db_connect.php';

if (isset($_GET['id'])) {
    $report_id = intval($_GET['id']);
    
    // Update the report's status to approved
    $sql = "UPDATE reports SET approved = TRUE WHERE id = $report_id";
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the reports page
        header("Location: report_info.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "No report ID specified.";
}
?>
