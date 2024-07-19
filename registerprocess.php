<?php
include 'includes/config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$full_name =$first_name ." ". $last_name;
$visitor_id = rand(1000,9999);
$visitor_email = $_POST['visitor_email'];
$visitor_phone = $_POST['visitor_phone'];
$username = $_POST['username'];
$organization = $_POST['organization'];
$identification = $_POST['identification'];
$visitor_type_id = $_POST['visitor_type_id'];
$password = $_POST['password'];
$status_id=1;

$hashed_password = password_hash($password, PASSWORD_DEFAULT);


// Check if user with the same email or username or phone number already exists
$checkQuery = "SELECT * FROM visitors WHERE visitor_id =? OR username = ? OR visitor_phone = ?";
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("sss", $visitor_id, $username, $visitor_phone);
$stmt->execute();
$checkResult = $stmt->get_result();
if ($checkResult->num_rows > 0) {
    // User with the same phone or username already exists
    
    header("location: register.php?message=userexist");
} else {
    // Insert user into database
    $insertQuery = "INSERT INTO visitors (visitor_id, full_name, visitor_email, visitor_phone, username, organization, identification, visitor_type_id, password, status_id)
                    VALUES (?, ?, ?, ?, ?, ?,?,? ,?,?)";

    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssssssssss", $visitor_id, $full_name, $visitor_email, $visitor_phone, $username,$organization,$identification, $visitor_type_id, $hashed_password, $status_id);

    if ($stmt->execute()) {
        // Registration successful
        
    header("location: register.php?message=success");

    } else {
        // Registration failed
       
        header("location: register.php?message=error");

    }
}


$conn->close();