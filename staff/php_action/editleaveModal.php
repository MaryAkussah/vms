<?php 
include '../../includes/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approveLeave'])) {
    // Retrieve form data
    $leave_id = $_POST['leave_id'];
    $staff_id = $_POST['staff_id'];
    $status_id = 1; // Assuming 1 represents approved status
    $start_date= date('Y-m-d ');
    $end_date = date('Y-m-d H:i:s');
    $created_at = date('Y-m-d H:i:s');

  

    // Insert data into hr_approvals table
    $sql = "INSERT INTO hr_approvals (`leave_id`, `staff_id`,  `created_at`)
    VALUES ('$leave_id', '$staff_id', '$created_at')";


if (mysqli_query($conn, $sql)) {
    echo "Leave request approved successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);

}
?>
