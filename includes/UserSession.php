<?php
    session_start();
    // Check if the user is logged in
    if (!isset($_SESSION['visitor_id']) || empty($_SESSION['visitor_id'])) {
        // Redirect to the login page if not logged in
        header("Location: index.php");
        exit();
    } 
    include 'config.php';

    $visitor_id = $_SESSION['visitor_id'];

    // Fetch the user's email from the database
    $getUserQuery = "SELECT * FROM visitors LEFT JOIN visitor_type ON visitor_type.visitor_type_id=visitors.visitor_type_id WHERE visitor_id = ?";
    $stmt = $conn->prepare($getUserQuery);
    $stmt->bind_param("i", $visitor_id);
    $stmt->execute();
    $userResult = $stmt->get_result();

    if ($userResult->num_rows === 1) {
        $userData = $userResult->fetch_assoc();
        $full_name = $userData['full_name'];
        $visitor_email = $userData['visitor_email'];
        $visitor_phone = $userData['visitor_phone'];
        $organization = $userData['organization'];
        $identification = $userData['identification'];
        $username = $userData['username'];
        $visitor_type_name = $userData['visitor_type_name'];
        // $profile_photo = $userData['profile_photo'];
    } else {
        // User not found, handle the error as needed
        $visitor_email = 'Email not found';
    }


?>
