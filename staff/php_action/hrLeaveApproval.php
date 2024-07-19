
<?php
include '../../includes/config.php';

if (isset($_POST['approveLeave'])) {
    // Retrieve form data and sanitize
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
    $leave_id = mysqli_real_escape_string($conn, $_POST['leave_id']);
    $leave_reason = mysqli_real_escape_string($conn, $_POST['leave_reason']);

    // Validate form data
    if (empty($staff_id) || empty($leave_id) || empty($leave_reason)) {
        header("Location: ../hrLeaveApproval.php?leaveapproval=error&message=All fields are required");
        exit();
    }

    // Update status of leave request in staff_leave table
    $hrQuery = "UPDATE staff_leave SET status_id = 14 WHERE leave_id = '$leave_id'";
    $resulthrQuery = mysqli_query($conn, $hrQuery);

    // Update leave_reason in deptHead_approvals table
    $hrleaveQuery = "UPDATE hr_approvals SET leave_reason = '$leave_reason' WHERE leave_id = '$leave_id'";
    $resulthrleaveQuery = mysqli_query($conn, $hrleaveQuery);

    // Insert into hr_approvals table
    $insertQuery = "INSERT INTO hr_approvals (leave_id, staff_id, start_date, end_date, leave_reason, leave_comment, attachment) VALUES ('$leave_id', '$staff_id','$start_date', '$end_date', '$leave_reason', '$leave_comment', '$attachment')";
    $resultInsertQuery = mysqli_query($conn, $insertQuery);

    // Check if all queries were successful
    if ($resultStaffQuery && $resultDeptHeadQuery && $resultInsertQuery) {
        header("Location: ../hrLeaveApproval.php?hrleaveapproval=success");
        exit();
    } else {
        // If any query failed, roll back changes
        // Optionally, you can provide more specific error messages
        header("Location: ../hrLeaveApproval.php?hrleaveapproval=error&message=Failed to update leave approval");
        exit();
    }

    
}
?>


