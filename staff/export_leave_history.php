<?php
// include '../includes/db.php'; // Assuming you have a file to connect to your database
include '../includes/StaffSession.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=leave_history.xls");
header("Pragma: no-cache");
header("Expires: 0");

$staff_id = $_SESSION['staff_id']; // Assuming staff_id is stored in session

$sql = "SELECT sl.*, ts.first_name, ts.last_name
        FROM staff_leave as sl 
        LEFT JOIN tbl_staff as ts ON sl.staff_id = ts.staff_id
        LEFT JOIN status as s ON s.status_id = sl.staff_id
        WHERE sl.staff_id = '$staff_id'
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

