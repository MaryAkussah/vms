<?php
// Include the database configuration file
include '../includes/config.php';

// Check if the team ID is provided via GET request
if(isset($_GET['team_id'])) {
    // Sanitize the input
    $teamId = mysqli_real_escape_string($conn, $_GET['team_id']);

    // Prepare the SQL query to fetch team members' details
    $sql = "SELECT visitors.full_name, visitors.visitor_phone, tbl_staff.first_name, tbl_staff.last_name, check_in.time_in, check_in.time_out, check_in.date_in
            FROM check_in
            LEFT JOIN visitors ON visitors.visitor_id = check_in.visitor_id
            LEFT JOIN tbl_staff ON tbl_staff.staff_id = check_in.staff_id
            WHERE check_in.team_id = '$teamId'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Initialize an array to store team members' details
    $teamMembers = array();

    // Check if the query executed successfully and fetch the results
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            // Add each row (team member's details) to the team members array
            $teamMembers[] = $row;
        }
    }

    // Return the team members' details as JSON response
    echo json_encode($teamMembers);
} else {
    // If team ID is not provided, return an error message
    echo json_encode(array('error' => 'Team ID is not provided.'));
}
?>
