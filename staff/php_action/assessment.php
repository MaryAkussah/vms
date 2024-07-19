<?php
include '../../includes/config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    // Retrieve form data and escape special characters to prevent SQL injection
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $project_title = mysqli_real_escape_string($conn, $_POST['project_title']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $progress = mysqli_real_escape_string($conn, $_POST['progress']);


    // Check for empty fields
    if (empty($staff_id) || empty($project_title) || empty($remarks) || empty($date)) {
        header("Location: ../assessment.php?addassessment=error&message=All fields are required");
        exit();
    }

    // Generate a unique assessment ID
    $assessment_id = bin2hex(random_bytes(4));
    
    // Insert data into the staff_assessment table
    $insertQuery = "INSERT INTO staff_assessment (assessment_id, staff_id, date, project_title, remarks, progress)
    VALUES ('$assessment_id', '$staff_id', '$date', '$project_title', '$remarks', '$progress')";
    
    if (mysqli_query($conn, $insertQuery)) {
        header("Location: ../assessment.php?addassessment=success");
        exit();
    } else {
        header("Location: ../assessment.php?addassessment=error&message=Failed to add assessment");
        exit();
    }
  

}

if(isset($_POST['submit'])) {
    // Retrieve form data
    $project_title = $_POST['project_title'];
    $progress = $_POST['progress'];
    $date = $_POST['date'];
    $remarks = $_POST['remarks'];
    
    // Recipient email address
    $to = 'recipient@example.com';
    // Subject
    $subject = 'New Assessment Submitted';
    // Email message
    $message = "
    <p>Project Title: $project_title</p>
    <p>Progress: $progress</p>
    <p>Date: $date</p>
    <p>Remarks: $remarks</p>
    ";
    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: sender@example.com" . "\r\n";
    
    // Send email
    if(mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Email sent successfully.');</script>";
    } else {
        echo "<script>alert('Failed to send email.');</script>";
    }
}

?>


