<?php 
include '../../includes/config.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the addStaff parameter is set
    if (isset($_POST['submit'])) {
        
        // Retrieve form data
        $staff_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_id'])));
        $project_title = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['project_title'])));
        $status_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['status_id'])));
        // Get current date
        $date = date("Y-m-d");
        $file_input = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['file_input'])));

        $remarks = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['remarks'])));
        
        // Insert new staff information
        $insertStaffQuery = mysqli_query($conn, "INSERT INTO staff_assessment (staff_id, project_title, status_id, date, file_input,remarks) VALUES ('$staff_id', '$project_title', '$status_id', '$date','$file_input', '$remarks')") or die(mysqli_error($conn));
        
        // Check if the query was successful
        if ($insertStaffQuery) {
            header("Location: ../assessment.php?assessment=success");
            exit();
        } else {
            header("Location: ../assessment.php?assessment=error");
            exit();
        }
    }
} else {
    // Form not submitted using POST method
    header("Location: ../assessment.php?assessment=notsubmitted");
    exit();
}
?>
