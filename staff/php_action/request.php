<?php

include '../../includes/config.php'; 

if (isset($_POST['request'])) {
    // Use prepared statements to prevent SQL injection
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
    $department_head_id = mysqli_real_escape_string($conn, $_POST['department_head_id']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Validate input data
    if (empty($description)) {
        // Redirect with an appropriate error message if description is empty
        header("Location: ../request.php?insertRequest=empty");
        exit();
    } else {
        // Generate a secure random request_id
        $request_id = bin2hex(random_bytes(4)); // 4 bytes converted to hex gives an 8-character string

        // Use prepared statements to prevent SQL injection
        $insertRequest = mysqli_prepare($conn, "INSERT INTO requests (request_id, staff_id, description) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($insertRequest, "sss", $request_id, $staff_id, $description);
        $result1 = mysqli_stmt_execute($insertRequest);

        $insertDepRequest = mysqli_prepare($conn, "INSERT INTO department_approvals (request_id, staff_id) VALUES (?, ?)");
        mysqli_stmt_bind_param($insertDepRequest, "ss", $request_id, $department_head_id);
        $result2 = mysqli_stmt_execute($insertDepRequest);

        if ($result1 && $result2) {
            // Redirect with success message upon successful insertion
            header("Location: ../request.php?insertRequest=success");
            exit();
        } else {
            // Redirect with error message if insertion fails
            header("Location: ../request.php?insertRequest=error");
            exit();
        }
    }
}
?>
