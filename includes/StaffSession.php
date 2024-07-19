<?php
    session_start();
    // Check if the user is logged in
    if (!isset($_SESSION['staff_id']) || empty($_SESSION['staff_id']) ||  $_SESSION['role_id'] != 2) {
        // Redirect to the login page if not logged in
        header("Location: index.php");
        exit();
    } 
    include 'config.php';

    $staff_id = $_SESSION['staff_id'];

    // Fetch the user's email from the database
    $getUserQuery = "SELECT * FROM tbl_staff 
    LEFT JOIN department ON department.department_id=tbl_staff.department_id 
    LEFT JOIN staff_role ON staff_role.staff_role_id=tbl_staff.staff_role_id 
    WHERE tbl_staff.staff_id = ?";
    $stmt = $conn->prepare($getUserQuery);
    $stmt->bind_param("i", $staff_id);
    $stmt->execute();
    $userResult = $stmt->get_result();

    if ($userResult->num_rows === 1) {
        $userData = $userResult->fetch_assoc();
        $first_name = $userData['first_name'];
        $last_name = $userData['last_name'];
        $staff_phone = $userData['staff_phone'];
        $username = $userData['username'];
        $staff_email = $userData['staff_email'];
        $profile_photo = $userData['profile_photo'];
        $department_id = $userData['department_id'];
        $department_name = $userData['department_name'];
        $app_role = $userData['app_role'];
        $staff_role_name = $userData['staff_role_name'];
        $staff_id = $userData['staff_id'];
        $leave_days = $userData['leave_days'];
        $status_id = $userData['status_id'];
    // Check if the user has changed their password
    if ($userData['password_changed'] == 0 && basename($_SERVER['PHP_SELF']) != 'profile.php') {
        // Redirect the user to the profile page to change their password
        header("Location: profile.php?defpas=defpass");
        exit();
    }
} else {
    // User not found, handle the error as needed
    $user_email = 'Email not found';
}
