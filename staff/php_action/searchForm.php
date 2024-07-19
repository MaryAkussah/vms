<?php 

include '../../includes/config.php';
// php_action/searchForm.php

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the searchForm parameter is set
    if (isset($_POST['checkinForm'])) {
        // Get the selected option value
        $selectedOption = $_POST['searchForm'];
    // Based on the selected option, redirect the user to the appropriate page
    switch ($selectedOption) {
        case '1':
            // Individual Check In option selected
            header("Location: ../individual_checkin.php");
            exit;
            break;
        case '2':
            // Team Check In option selected
            header("Location: ../team_checkin.php");
            exit;
            break;
        case '3':
            // Returning Visitor option selected
            header("Location: ../returning_visitor.php");
            exit;
            break;
        default:
            // Invalid option selected
            header("Location: ../checkin.php?checkin=invalid");
            exit();
            break;
    }
} else {
    // searchForm parameter is not set
    header("Location: ../checkin.php?checkin=nodata");
        exit();
}
} else {
// Form not submitted using POST method
header("Location: ../checkin.php?checkin=notsubmitted");
exit();
}
?>
