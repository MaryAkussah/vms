<?php 
include '../../includes/config.php';

if (isset($_POST['approveRequest'])) {
    // Use prepared statements to prevent SQL injection
    $request_id = mysqli_real_escape_string($conn, $_POST['request_id']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $hrId = mysqli_real_escape_string($conn, $_POST['hrId']);

    // Validate input data
    if (empty($remarks)) {
        // Redirect with an appropriate error message if remarks are empty
        header("Location: ../request.php?approveRequest=empty");
        exit();
    } else {
        // Use prepared statements to prevent SQL injection
        $requestUpdate = mysqli_prepare($conn, "UPDATE requests SET request_status_id=2 WHERE request_id=?");
        mysqli_stmt_bind_param($requestUpdate, "s", $request_id);
        $result1 = mysqli_stmt_execute($requestUpdate);

        $depUpdate = mysqli_prepare($conn, "UPDATE department_approvals SET request_status_id=2, depHead_remarks=? WHERE request_id=?");
        mysqli_stmt_bind_param($depUpdate, "ss", $remarks, $request_id);
        $result2 = mysqli_stmt_execute($depUpdate);

        $hrInsert = mysqli_prepare($conn, "INSERT INTO hr_approvals(request_id, staff_id) VALUES (?, ?)");
        mysqli_stmt_bind_param($hrInsert, "ss", $request_id, $hrId);
        $result3 = mysqli_stmt_execute($hrInsert);

        if ($result1 && $result2 && $result3) {
            // Redirect with success message upon successful operations
            header("Location: ../request.php?approveRequest=success");
            exit();
        } else {
            // Redirect with error message if any operation fails
            header("Location: ../request.php?approveRequest=error");
            exit();
        }
    }
}


if (isset($_POST['declineRequest'])) {
    // Validate and sanitize input data
    $request_id = isset($_POST['request_id']) ? mysqli_real_escape_string($conn, $_POST['request_id']) : '';
    $remarks = isset($_POST['remarks']) ? mysqli_real_escape_string($conn, $_POST['remarks']) : '';

    // Check if request_id is empty
    if (empty($request_id)) {
        header("Location: ../request.php?declineRequest=empty");
        exit();
    } else {
        // Use prepared statements to prevent SQL injection
        $requestUpdate = mysqli_prepare($conn, "UPDATE requests SET request_status_id=5 WHERE request_id=?");
        mysqli_stmt_bind_param($requestUpdate, "s", $request_id);
        $result1 = mysqli_stmt_execute($requestUpdate);

        $depUpdate = mysqli_prepare($conn, "UPDATE department_approvals SET request_status_id=5, remarks=? WHERE request_id=?");
        mysqli_stmt_bind_param($depUpdate, "ss", $remarks, $request_id);
        $result2 = mysqli_stmt_execute($depUpdate);

        if ($result1 && $result2) {
            // Redirect with success message upon successful update
            header("Location: ../request.php?declineRequest=success");
            exit();
        } else {
            // Redirect with error message if update fails
            header("Location: ../request.php?declineRequest=error");
            exit();
        }
    }
}