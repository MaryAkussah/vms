<?php 
include '../../includes/config.php';

if(isset($_POST['submit'])){
    // Retrieve form data
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
    $supervisor_id = mysqli_real_escape_string($conn, $_POST['supervisor_id']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $leave_reason = mysqli_real_escape_string($conn, $_POST['leave_reason']);
    $leave_comment = mysqli_real_escape_string($conn, $_POST['leave_comment']);
    $attachment = mysqli_real_escape_string($conn, $_POST['attachment']);

    // Check for empty fields
    if (empty($staff_id) || empty($supervisor_id) || empty($start_date) || empty($end_date) || empty($leave_reason)) {
        header("Location: ../leave.php?addleave=error&message=All fields are required");
        exit();
    }

    // Check if start date is less than end date
    if (strtotime($start_date) >= strtotime($end_date)) {
        header("Location: ../leave.php?addleave=error&message=Start date must be before end date");
        exit();
    }

    // Check if start date is today or later
    $today = date("Y-m-d");
    if (strtotime($start_date) < strtotime($today)) {
        header("Location: ../leave.php?addleave=error&message=Start date cannot be in the past");
        exit();
    }

    // Check if start date and end date are not the same
    if ($start_date == $end_date) {
        header("Location: ../leave.php?addleave=error&message=Start date and end date cannot be the same");
        exit();
    }

    // Check if the user has exceeded the maximum number of leaves (30 leaves in a year)
    $currentYear = date('Y');
    $query = "SELECT COUNT(*) AS leave_count FROM staff_leave WHERE staff_id = '$staff_id' AND YEAR(start_date) = '$currentYear'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $leaveCount = $row['leave_count'];

    if ($leaveCount >= 30) {
        header("Location: ../leave.php?addleave=exceed");
        exit();
    }

    // Get the total leave days remaining for the employee
    $getLeaveDaysQuery = mysqli_query($conn, "SELECT leave_days FROM tbl_staff WHERE staff_id = '$staff_id'");
    $leaveDaysData = mysqli_fetch_assoc($getLeaveDaysQuery);
    $leaveDaysRemaining = (int)$leaveDaysData['leave_days'];

    // Calculate the number of requested days
    $startDate = new DateTime($start_date);
    $endDate = new DateTime($end_date);
    $interval = $startDate->diff($endDate);
    $requestDays = $interval->days + 1; // Add 1 to include both start and end dates

    // Check if requested days exceed leave days remaining
    if ($requestDays > $leaveDaysRemaining) {
        header("Location: ../leave.php?addleave=insufficient");
        exit();
    }

    // Insert new staff information
    $insertStaffQuery = mysqli_query($conn, "INSERT INTO staff_leave (staff_id, supervisor_id, start_date, end_date, leave_reason, leave_comment, attachment) VALUES ('$staff_id', '$supervisor_id', '$start_date', '$end_date', '$leave_reason', '$leave_comment', '$attachment')");

    // Check if the query was successful
    if ($insertStaffQuery) {
        // Update leave days remaining
        $newLeaveDaysRemaining = $leaveDaysRemaining - $requestDays;
        mysqli_query($conn, "UPDATE tbl_staff SET leave_days = $newLeaveDaysRemaining WHERE staff_id = '$staff_id'");
        
        header("Location: ../leave.php?addleave=success");
        exit();
    } else {
        header("Location: ../leave.php?addleave=error&message=Failed to add leave");
        exit();
    }
}
?>
