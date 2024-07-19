<?php
include '../../includes/config.php';

// Check if the form has been submitted for going on break
if(isset($_POST['goOnBreak'])){
    // Get the current staff ID from the form
    $staff_id = $_POST['staff_id']; 
    date_default_timezone_set('Africa/Accra');
    $currentTime = date("H:i:s");
    
    // Insert the break start time into the break_records table
    $insertBreakQuery = mysqli_query($conn, "INSERT INTO break_records (staff_id, break_time) VALUES ('$staff_id', '$currentTime')") or die(mysqli_error($conn));

    // Update staff status to "On Break" (status ID = 3)
    $updateStaffQuery = mysqli_query($conn, "UPDATE tbl_staff SET status_id = 3 WHERE staff_id = '$staff_id'") or die(mysqli_error($conn));

    // Check if both queries were successful
    if($insertBreakQuery && $updateStaffQuery) {
        header("Location: ../dashboard.php?breaktime=success");
        exit();
    } else {
        header("Location: ../dashboard.php?breaktime=error");
        exit();
    }
} 

// Check if the form has been submitted for coming back from break
elseif(isset($_POST['backFromBreak'])){
    // Get the current staff ID from the form
    $staff_id = $_POST['staff_id']; 
    date_default_timezone_set('Africa/Accra');
    $currentTime = date("H:i:s");

    // Update the break end time in the break_records table
    $updateBreakQuery = mysqli_query($conn, "UPDATE break_records SET break_over='$currentTime',status_id=1 WHERE staff_id='$staff_id'") or die(mysqli_error($conn));

    // Update staff status to "Available" (status ID = 1)
    $updateStaffQuery = mysqli_query($conn, "UPDATE tbl_staff SET status_id = 1 WHERE staff_id = '$staff_id'") or die(mysqli_error($conn));

    // Check if both queries were successful
    if($updateBreakQuery && $updateStaffQuery) {
        header("Location: ../dashboard.php?breakover=success");
        exit();
    } else {
        header("Location: ../dashboard.php?breakover=error");
        exit();
    }
} else {
    // Redirect to the dashboard with a notification if the form was not submitted
    header("Location: ../dashboard.php?breakform=notsubmit");
    exit();
}
?>
