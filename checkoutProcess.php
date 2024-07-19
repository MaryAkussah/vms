<?php
session_start();
include 'includes/config.php';

if (isset($_POST['signout'])) {
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

        if ($checkAttendanceResult->num_rows == 1) {
            // Staff has signed in for the day
            $attendanceData = $checkAttendanceResult->fetch_assoc();

            if ($attendanceData['time_out'] != null) {
                // User already signed out, show an error message
                header("Location: checkout.php?message=alreadySignedOut");
                exit();
            } else {
                // Verify the entered password against the stored hashed password
                if (password_verify($password, $userData['password'])) {
                    // Password is correct, get the current time
                    $current_time = date('H:i:s');

                    // Update attendance record
                    $updateQuery = "UPDATE attendance SET time_out = ? WHERE attendance_id = ?";
                    $updateStmt = $conn->prepare($updateQuery);
                    $updateStmt->bind_param("si", $current_time, $attendanceData['attendance_id']);
                    $updateStmt->execute();

                    // Redirect to the checkout page with success message
                    header("Location: checkout.php?message=success");
                    exit();
                } else {
                    // Incorrect password, show an error message
                    header("Location: checkout.php?message=passerror");
                    exit();
                }
            }
        } else {
            // Staff has not signed in for the day, show an error message
            header("Location: checkout.php?message=notSignedIn");
            exit();
        }
    } else {
        // User not found, show an error message
        header("Location: checkout.php?message=nouser");
        exit();
    }
} else {
    // Form not submitted, show an error message
    header("Location: checkout.php?message=formnotsubmitted");
    exit();
}

$conn->close();
?>
