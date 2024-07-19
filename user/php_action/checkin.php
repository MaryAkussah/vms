<?php 
include '../../includes/config.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the searchForm parameter is set
    if (isset($_POST['individualCheckIn'])) {
        
        // Retrieve form data
        $staff_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_id'])));
        $time_in = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['time_in'])));
        $date_in = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['date_in'])));
        $purpose = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['purpose'])));
        $visitor_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['visitor_id'])));
        $status_id=6;

        // Insert new visitor information
        $checkinQuery = mysqli_query($conn, "INSERT INTO check_in (staff_id, visitor_id, purpose, time_in, date_in, status_id) VALUES ('$staff_id', '$visitor_id', '$purpose', '$time_in', '$date_in', '$status_id')") or die(mysqli_error($conn));
        $staffQuery = mysqli_query($conn, "UPDATE tbl_staff SET status_id = 6 WHERE staff_id = '$staff_id'") or die(mysqli_error($conn));

        // Check if all queries were successful
        if ($checkinQuery && $staffQuery) {
            header("Location: ../checkin.php?add_checkin=success");
            exit();
        } else {
            header("Location: ../checkin.php?add_checkin=error");
            exit();
        }
    }
} else {
    // Form not submitted using POST method
    header("Location: ../checkin.php?add_checkin=notsubmitted");
    exit();
}
