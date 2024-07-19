<?php 
include '../../includes/config.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the searchForm parameter is set
    if (isset($_POST['individualCheckIn'])) {
        
        // Retrieve form data
        $full_name = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['full_name'])));
        $visitor_email = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['visitor_email'])));
        $visitor_phone = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['visitor_phone'])));
        $visitor_type_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['visitor_type_id'])));
        $organization = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['organization'])));
        $identification = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['identification'])));
        $staff_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_id'])));
        $time_in = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['time_in'])));
        $date_in = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['date_in'])));
        $purpose = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['purpose'])));
        $visitor_id = rand(1000,9999);

        // Check if email, phone, or identification already exist
        $existingVisitorQuery = mysqli_query($conn, "SELECT * FROM visitors WHERE visitor_email = '$visitor_email' OR visitor_phone = '$visitor_phone' OR identification = '$identification'");
        if (mysqli_num_rows($existingVisitorQuery) > 0) {
            // Visitor with same email, phone, or identification already exists
            header("Location: ../individual_checkin.php?add_checkin=visitorexist");
            exit();
        }

        // Insert new visitor information
        $checkinQuery = mysqli_query($conn, "INSERT INTO check_in (staff_id, visitor_id, purpose, time_in, date_in) VALUES ('$staff_id', '$visitor_id', '$purpose', '$time_in', '$date_in')") or die(mysqli_error($conn));
        $visitorQuery = mysqli_query($conn, "INSERT INTO visitors (visitor_id, full_name, visitor_email, visitor_phone, identification, organization, visitor_type_id) VALUES ('$visitor_id', '$full_name', '$visitor_email', '$visitor_phone', '$identification', '$organization', '$visitor_type_id')") or die(mysqli_error($conn));
        $staffQuery = mysqli_query($conn, "UPDATE tbl_staff SET status_id = 2 WHERE staff_id = '$staff_id'") or die(mysqli_error($conn));

        // Check if all queries were successful
        if ($checkinQuery && $visitorQuery && $staffQuery) {
            header("Location: ../individual_checkin.php?add_checkin=success");
            exit();
        } else {
            header("Location: ../individual_checkin.php?add_checkin=error");
            exit();
        }
    }
} else {
    // Form not submitted using POST method
    header("Location: ../individual_checkin.php?add_checkin=notsubmitted");
    exit();
}


// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the searchForm parameter is set
    if (isset($_POST['returningVisitor'])) {

        $staff_id=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_id'])));
        $visitor_id=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['visitor_id'])));
        $time_in=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['time_in'])));
        $date_in=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['date_in'])));
        $purpose=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['purpose'])));
       

        $checkinQuery=mysqli_query($conn, "INSERT INTO check_in (staff_id, visitor_id, purpose, time_in,date_in) VALUES ('$staff_id', '$visitor_id', '$purpose', '$time_in', '$date_in')") or die(mysqli_error($conn));
        $staffQuery=mysqli_query($conn, "UPDATE tbl_staff SET status_id=2 WHERE staff_id='$staff_id'") or die(mysqli_error($conn));
        $visitorQuery=mysqli_query($conn, "UPDATE visitors SET status_id=2 WHERE visitor_id='$visitor_id'") or die(mysqli_error($conn));
if ($checkinQuery &&  $staffQuery) {
        // $message="Message Sent Successfully. Thank You";
        header("Location: ../returning_visitor.php?add_checkin=success");
   exit();
    }else{
        header("Location: ../returning_visitor.php?add_checkin=error");
   exit();
    }

    }
}else {
// Form not submitted using POST method
header("Location: ../returning_visitor.php?add_checkin=notsubmitted");
exit();
}

?>
