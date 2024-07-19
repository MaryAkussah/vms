<?php
include '../../includes/config.php';
include_once '../../includes/AdminSession.php';

if(isset($_POST["exportAttendance"])) {
    // Get mandatory parameters
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // Get optional parameters if set
    $status_id = isset($_POST['status_id']) ? $_POST['status_id'] : '';
    $staff_id = isset($_POST['staff_id']) ? $_POST['staff_id'] : '';

    // Set headers for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=ATTENDANCE_REPORT.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('FIRST NAME', 'LAST NAME', 'DEPARTMENT', 'ROLE', 'TIME IN', 'DATE ADDED'));

    // Prepare the SQL query with mandatory parameters
    $query = "SELECT tbl_staff.first_name, tbl_staff.last_name, department.department_name, staff_role.staff_role_name, attendance.time_in, attendance.at_created_at
              FROM tbl_staff
              INNER JOIN department ON tbl_staff.department_id = department.department_id
              INNER JOIN staff_role ON tbl_staff.staff_role_id = staff_role.staff_role_id
              INNER JOIN attendance ON tbl_staff.staff_id = attendance.staff_id
              WHERE attendance.at_created_at >= ? AND attendance.at_created_at <= ?";
    $params = array($startDate, $endDate); // Parameters for prepared statement

    // Add optional conditions if provided
    if (!empty($status_id)) {
        $query .= " AND attendance.status_id = ?";
        $params[] = $status_id;
    }

    if (!empty($staff_id)) {
        $query .= " AND attendance.staff_id = ?";
        $params[] = $staff_id;
    }

    $query .= " ORDER BY attendance.attendance_id DESC"; // Add ORDER BY clause

    // Prepare the SQL query
    $stmt = $conn->prepare($query);

    // Bind parameters if any
    if (!empty($params)) {
        $types = str_repeat('s', count($params)); // Generate type string for binding
        $stmt->bind_param($types, ...$params);
    }

    // Execute the query
    $stmt->execute();

    // Check for errors
    if($stmt->error) {
        echo "Error: " . $stmt->error;
    }

    // Get the results
    $result = $stmt->get_result();

    // Fetch the results and write to CSV
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }

    // Close output stream
    fclose($output);
}
?>
