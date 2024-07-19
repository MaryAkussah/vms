<?php 

include '../../includes/config.php';

if(isset($_POST['approveAppointment'])){
    // Sanitize input data
    $check_in_id = mysqli_real_escape_string($conn, $_POST['check_in_id']);

    // Check if the appointment exists
    $checkAppointmentQuery = "SELECT * FROM check_in WHERE check_in_id = '$check_in_id'";
    $checkAppointmentResult = mysqli_query($conn, $checkAppointmentQuery);

    if(mysqli_num_rows($checkAppointmentResult) > 0) {
        // Appointment exists, update status
        $visitorTransfer = mysqli_query($conn, "UPDATE check_in SET status_id = 4 WHERE check_in_id = '$check_in_id'");
        $staffUpdate = mysqli_query($conn, "UPDATE tbl_staff SET status_id = 2 WHERE staff_id = '$staff_id'");

        if ($visitorTransfer && $staffUpdate) {
            header("Location: ../dashboard.php?approveAppointment=success");
            exit(); 
        } else {
            header("Location: ../dashboard.php?approveAppointment=error");
            exit();
        }
    } else {
        // Appointment does not exist
        header("Location: ../dashboard.php?approveAppointment=noapt");
        exit();
    }
}


if(isset($_POST['declineAppointment'])){
    // Sanitize input data
    $check_in_id = mysqli_real_escape_string($conn, $_POST['check_in_id']);

    // Check if the appointment exists
    $checkAppointmentQuery = "SELECT * FROM check_in WHERE check_in_id = '$check_in_id'";
    $checkAppointmentResult = mysqli_query($conn, $checkAppointmentQuery);

    if(mysqli_num_rows($checkAppointmentResult) > 0) {
        // Appointment exists, update status
        $visitorTransfer = mysqli_query($conn, "UPDATE check_in SET status_id = 8 WHERE check_in_id = '$check_in_id'");
        $staffUpdate = mysqli_query($conn, "UPDATE tbl_staff SET status_id = 1 WHERE staff_id = '$staff_id'");

        if ($visitorTransfer && $staffUpdate) {
            header("Location: ../dashboard.php?declineAppointment=success");
            exit(); 
        } else {
            header("Location: ../dashboard.php?declineAppointment=error");
            exit();
        }
    } else {
        // Appointment does not exist
        header("Location: ../dashboard.php?declineAppointment=noapt");
        exit();
    }
}
?>
