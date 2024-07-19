<?php
session_start();

include 'includes/config.php';
if(isset($_POST['login'])){
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
} else {
    // User not found in the users table, check the visitors table
    $checkQuery = "SELECT * FROM visitors WHERE visitor_email = ? OR username = ? OR visitor_phone = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("sss", $user_input, $user_input, $user_input);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult->num_rows === 1) {
        // User exists in the visitors table, fetch user data
        $userData = $checkResult->fetch_assoc();
    } else {
        // User not found in either table, show an error message
        echo 'User not found. Please check your credentials.';
        header("location: index.php?message=nouser");
        exit();
    }
}

// Verify the entered password against the stored hashed password
if (password_verify($password, $userData['password'])) {
    // Password is correct, log in the user
    $defaultpassword=password_hash(123456, PASSWORD_DEFAULT);
    if(password_verify($password, $userData['password'])==$defaultpassword){
        header("location: ");
    }
    // Store user information in the session 
    $_SESSION['staff_id'] = $userData['staff_id'];
    $_SESSION['visitor_id'] = $userData['visitor_id'];
    $_SESSION['username'] = $userData['username'];
    $_SESSION['role_id'] = $userData['role_id'];

    if ($userData['role_id'] == 1) {
        // Redirect the user to their preferred page (e.g., dashboard.php) for admin
        header("Location: admin/dashboard");
    }elseif($userData['role_id'] == 2){
        header("Location: staff/dashboard");
    } else {
        // Redirect the user to their preferred page (e.g., dashboard.php) for non-admin
        header("Location: index.php?message=success");
    }
    exit();
} else {
    // Incorrect password, show an error message
    echo 'Incorrect password. Please try again.';
    header("location: index.php?message=passerror");
    exit();
}}else{
    header("location: index.php/message=formnotsubmitted");
    exit;
}

$conn->close();
?>
