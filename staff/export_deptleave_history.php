<?php
// include '../includes/db.php'; // Ensure the path to your db.php file is correct
include '../includes/StaffSession.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=deptleave_history.xls");
header("Pragma: no-cache");
header("Expires: 0");

$department_id = $_SESSION['department_id']; // Assuming department_id is stored in session

$sql = "SELECT sl.*, ts.first_name, ts.last_name
        FROM staff_leave as sl 
        LEFT JOIN tbl_staff as ts ON sl.staff_id = ts.staff_id
        LEFT JOIN status as s ON s.status_id = sl.staff_id
        WHERE ts.department_id = '$department_id'
        ORDER BY sl.leave_id DESC";

$result = $conn->query($sql);

echo "S/N\tSTAFF NAME\tLEAVE TYPE\tLEAVE DATE\tRESUMING DATE\tSTATUS\n";

if ($result->num_rows > 0) {
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        echo $i++ . "\t" .
             $row['first_name'] . ' ' . $row['last_name'] . "\t" .
             $row['leave_reason'] . "\t" .
             date('d-m-Y', strtotime($row['start_date'])) . "\t" .
             date('d-m-Y', strtotime($row['end_date'])) . "\t" .
             $row['state'] . "\n";
    }
} else {
    echo "No leave requests found.\n";
}

$conn->close();
?>
