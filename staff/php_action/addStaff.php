<?php 
include '../../includes/config.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the searchForm parameter is set
    if (isset($_POST['addStaff'])) {
        
        // Retrieve form data
        $first_name = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['first_name'])));
        $last_name = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['last_name'])));
        $staff_email = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_email'])));
        $staff_phone = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_phone'])));
        $staff_role_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_role_id'])));
        $department_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['department_id'])));
        

        // Check if email or phone already exist
        $existingStaffQuery = mysqli_query($conn, "SELECT * FROM tbl_staff WHERE staff_email = '$staff_email' OR staff_phone = '$staff_phone'");
        if (mysqli_num_rows($existingStaffQuery) > 0) {
            // staff with same email, phone, or identification already exists
            header("Location: ../addStaff.php?addStaff=staffexist");
            exit();
        }

        // Insert new staff information
        $insertStaffQuery = mysqli_query($conn, "INSERT INTO tbl_staff (first_name, last_name, staff_email, staff_phone, staff_role_id, department_id) VALUES ('$first_name', '$last_name', '$staff_email', '$staff_phone', '$staff_role_id', '$department_id')") or die(mysqli_error($conn));
        
        // Check if all queries were successful
        if ($insertStaffQuery) {
            header("Location: ../addStaff.php?addStaff=success");
            exit();
        } else {
            header("Location: ../addStaff.php?addStaff=error");
            exit();
        }
    }
} else {
    // Form not submitted using POST method
    header("Location: ../addStaff.php?addStaff=notsubmitted");
    exit();
}



?>
