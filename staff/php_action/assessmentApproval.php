<?php
include '../../includes/config.php';

if (isset($_POST['submit'])) {
    // Retrieve form data and sanitize
    $assessment_id = mysqli_real_escape_string($conn, $_POST['assessment_id']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $assessment_comment = mysqli_real_escape_string($conn, $_POST['assessment_comment']);
    echo $assessment_id, $state, $remarks;

    // Add any other fields you need to retrieve and sanitize

    // Perform validations
    if (empty($assessment_id)) {
        header("Location: ../assessmentApproval.php?assessmentapproval=empty");
        exit();
    }

 // Update status of assessment in staff_assessment table
$assessmentQuery = "UPDATE staff_assessment SET state = '$state', remarks = '$remarks' WHERE assessment_id = '$assessment_id' AND state = 'Pending'";
$assessmentUpdateResult = mysqli_query($conn, $assessmentQuery);

// Check if update was successful
if ($assessmentUpdateResult && mysqli_affected_rows($conn) > 0) {
    // Redirect to assessmentApproval.php with updated state and remarks
    header("Location: ../assessmentApproval.php?assessmentapproval=success&state=$state&remarks=$remarks");
    exit();
} elseif (mysqli_affected_rows($conn) == 0) {
    // No rows were updated (assessment with given ID not found or already updated)
    header("Location: ../assessmentApproval.php?assessmentapproval=notfound");
    exit();
} else {
    // Redirect in case of error
    header("Location: ../assessmentApproval.php?assessmentapproval=error");
    exit();
}


}
?>
