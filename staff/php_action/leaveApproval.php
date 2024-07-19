<?php
include '../../includes/config.php';
if (isset($_POST['submit'])) {
    // Retrieve form data and sanitize
    $leave_id = mysqli_real_escape_string($conn, $_POST['leave_id']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $leave_comment = mysqli_real_escape_string($conn, $_POST['leave_comment']);
    echo $leave_id, $state, $leave_comment;

    // Perform validations
    if (empty($leave_id)) {
        header("Location: ../leaveApproval.php?leaveapproval=empty");
        exit();
    }

  
    // Update status of leave request in staff_leave table
  
$staffQuery = "UPDATE staff_leave SET state = '$state', leave_comment = '$leave_comment' WHERE leave_id = '$leave_id'";
$staffUpdateResult = mysqli_query($conn, $staffQuery);

$start_date = new DateTime($start_date);
$end_date = new DateTime($end_date);
$leaveDaysInterval = $startDate->diff($endDate);
$leaveDays = $leaveDaysInterval->days + 1; // +1 to include the start date

// Check if all queries were successful for approval states
if ($state == "Approved by HOD") {
    if ($staffUpdateResult) {
        header("Location: ../leaveApproval.php?leaveapproval=success");
        exit();
    } else {
        header("Location: ../leaveApproval.php?leaveapproval=error");
        exit();
    }
} else if ($state == "Approved by HR") {
    if ($staffUpdateResult) {
        header("Location: ../hrLeaveApproval.php?leaveapproval=success");
        exit();
    } else {
        header("Location: ../hrLeaveApproval.php?leaveapproval=error");
        exit();
    }
} else if ($state == "Approved by COO") {
    if ($staffUpdateResult) {
        // Update leave days remaining
        $newLeaveDaysRemaining = $leaveDaysRemaining - $leaveDays;
        mysqli_query($conn, "UPDATE tbl_staff SET leave_days = $newLeaveDaysRemaining WHERE staff_id = '$staff_id'");

        header("Location: ../cooLeaveApproval.php?leaveapproval=success");
        exit();
    } else {
        header("Location: ../cooLeaveApproval.php?leaveapproval=error");
        exit();
    }
}

// Check if all queries were successful for decline states
else if ($state == "Declined by HOD") {
    if ($staffUpdateResult) {
        header("Location: ../leaveApproval.php?leaveapproval=success");
        exit();
    } else {
        header("Location: ../leaveApproval.php?leaveapproval=error");
        exit();
    }
} else if ($state == "Declined by HR") {
    if ($staffUpdateResult) {
        header("Location: ../hrLeaveApproval.php?leaveapproval=success");
        exit();
    } else {
        header("Location: ../hrLeaveApproval.php?leaveapproval=error");
        exit();
    }
} else if ($state == "Declined by COO") {
    if ($staffUpdateResult) {
        header("Location: ../cooLeaveApproval.php?leaveapproval=success");
        exit();
    } else {
        header("Location: ../cooLeaveApproval.php?leaveapproval=error");
        exit();
    }
}
    
}
?>
