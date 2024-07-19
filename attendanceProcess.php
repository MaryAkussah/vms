<?php
session_start();

include 'includes/config.php';

<<<<<<< HEAD
if(isset($_POST['submitAttendance'])){

                      
=======
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
// Get user input (username, email, or phone number) and password
$user_input = $_POST['user_input'];
$password = $_POST['password'];

// Check if the user exists in the users table
$checkQuery = "SELECT * FROM tbl_staff WHERE staff_email = ? OR username = ? OR staff_phone = ?";
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("sss", $user_input, $user_input, $user_input);
$stmt->execute();
$checkResult = $stmt->get_result();

if ($checkResult->num_rows === 1) {
    // User exists in the users table, fetch user data
    $userData = $checkResult->fetch_assoc();

    // Check if the staff has already signed in for the day
    $currentDate = date('Y-m-d');
    $checkAttendanceQuery = "SELECT * FROM attendance WHERE staff_id = ? AND DATE(at_created_at) = ?";
    $checkStmt = $conn->prepare($checkAttendanceQuery);
    $checkStmt->bind_param("is", $userData['staff_id'], $currentDate);
    $checkStmt->execute();
    $checkAttendanceResult = $checkStmt->get_result();

    if ($checkAttendanceResult->num_rows > 0) {
        // Staff has already signed in for the day, show an error message
        echo 'Staff has already signed in for the day.';
        header("Location: attendance.php?message=already_signed_in");
        exit();
    } else {
        // Verify the entered password against the stored hashed password
        if (password_verify($password, $userData['password'])) {
            // Password is correct, get the current time
            $current_time = date('H:i:s');
<<<<<<< HEAD
            $time_limit = strtotime('8:30 AM'); 
            $time_limit_str = date('H:i:s', $time_limit);

            // Determine the status_id based on current time
            if ($current_time >= $time_limit_str) {
                $status_id = 9;
            } else {
                $status_id = 10;
            }
            
=======
            $time_limit = strtotime('8:30 AM');

            // Determine the status_id based on current time
            $status_id = ($current_time >= $time_limit) ? 10 : 9;
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e

            // Insert attendance record
            $insertQuery = "INSERT INTO attendance (staff_id, time_in, status_id) VALUES (?, ?, ?)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("iss", $userData['staff_id'], $current_time, $status_id);
            $insertStmt->execute();

            // Redirect to the attendance page with success message
            header("Location: attendance.php?message=success");
            exit();
        } else {
            // Incorrect password, show an error message
<<<<<<< HEAD
=======
            echo 'Incorrect password. Please try again.';
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
            header("Location: attendance.php?message=passerror");
            exit();
        }
    }
} else {
    // User not found, show an error message
<<<<<<< HEAD
    header("Location: attendance.php?message=nouser");
    exit();
}
}else{
    header("location: attendance.php/message=formnotsubmitted");
    exit();
}
=======
    echo 'User not found. Please check your credentials.';
    header("Location: attendance.php?message=nouser");
    exit();
}
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e

$conn->close();
?>
