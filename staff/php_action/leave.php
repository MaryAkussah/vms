<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
include '../../includes/config.php';

if (isset($_POST['submit'])) {
    // Retrieve form data
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
    $supervisor_id = mysqli_real_escape_string($conn, $_POST['supervisor_id']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $leave_reason = mysqli_real_escape_string($conn, $_POST['leave_reason']);
    $leave_comment = mysqli_real_escape_string($conn, $_POST['leave_comment']);
    $attachment = mysqli_real_escape_string($conn, $_POST['attachment']);
    $created_at = date('Y-m-d');

    // Check for empty fields
    if (empty($staff_id) || empty($supervisor_id) || empty($start_date) || empty($end_date) || empty($leave_reason)) {
        header("Location: ../leave.php?addleave=error&message=All fields are required");
        exit();
    }

    // Check if start date is less than end date
    if (strtotime($start_date) >= strtotime($end_date)) {
        header("Location: ../leave.php?addleave=error&message=Start date must be before end date");
        exit();
    }

    // Check if start date is today or later
    $today = date("Y-m-d");
    if (strtotime($start_date) < strtotime($today)) {
        header("Location: ../leave.php?addleave=error&message=Start date cannot be in the past");
        exit();
    }

    // Check for duplicate leave requests by the same user
    $duplicateQuery = "SELECT * FROM staff_leave WHERE staff_id = '$staff_id' AND start_date = '$start_date' AND end_date = '$end_date'";
    $duplicateResult = mysqli_query($conn, $duplicateQuery);
    if (mysqli_num_rows($duplicateResult) > 0) {
        header("Location: ../leave.php?addleave=error&message=Duplicate leave request");
        exit();
    }

    // Calculate the number of weekdays excluding weekends
    $startDate = new DateTime($start_date);
    $endDate = new DateTime($end_date);
    
    $leaveWeekdays = 0;
    $currentDate = clone $startDate;
    while ($currentDate <= $endDate) {
        if ($currentDate->format('N') < 6) { // Check if the current day is not a weekend
            $leaveWeekdays++;
        }
        $currentDate->modify('+1 day'); // Move to the next day
    }

    // Generate a unique leave ID
    $leave_id = bin2hex(random_bytes(4));

    // Insert new staff leave information
    $insertStaffQuery = mysqli_query($conn, "INSERT INTO staff_leave (leave_id, staff_id, start_date, end_date, leave_reason, leave_comment, attachment, created_at) VALUES ('$leave_id', '$staff_id', '$start_date', '$end_date', '$leave_reason', '$leave_comment', '$attachment', '$created_at')");

    if ($insertStaffQuery) {
        // Fetch the email of the user and supervisor from the database
        $getUserEmailQuery = mysqli_query($conn, "SELECT staff_email FROM tbl_staff WHERE staff_id = '$staff_id'");
        $userEmailData = mysqli_fetch_assoc($getUserEmailQuery);
        $userEmail = filter_var($userEmailData['staff_email'], FILTER_SANITIZE_EMAIL);

        $getSupervisorEmailQuery = mysqli_query($conn, "SELECT staff_email FROM tbl_staff WHERE staff_id = '$supervisor_id'");
        $supervisorEmailData = mysqli_fetch_assoc($getSupervisorEmailQuery);
        $supervisorEmail = filter_var($supervisorEmailData['staff_email'], FILTER_SANITIZE_EMAIL);

        // Validate email addresses
        if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) || !filter_var($supervisorEmail, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../leave.php?addleave=error&message=Invalid email addresses");
            exit();
        }

        // Prepare the email content
        $subject = "Leave Request Notification";
        $message = "Dear Supervisor,\n\n";
        $message .= "A leave request has been submitted by $userEmail. Here are the details:\n";
        $message .= "Start Date: $start_date\n";
        $message .= "End Date: $end_date\n";
        $message .= "Reason: $leave_reason\n";
        $message .= "Comment: $leave_comment\n";
        $message .= "Attachment: $attachment\n\n";
        $message .= "Please review and take the necessary actions.\n\n";
        $message .= "Best regards,\n";
        $message .= "Leave Management System";

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'mail.wgghana.com';  // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username = 'wglaf@wgghana.com'; // SMTP username
            $mail->Password = 'Light123!@##'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom($userEmail, 'Leave Management System');
            $mail->addAddress($supervisorEmail); // Add a recipient

            // Content
            $mail->isHTML(false); // Set email format to plain text
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Send the email
            $mail->send();
            echo "Leave submitted successfully";
        } catch (Exception $e) {
            echo "Leave submitted, but failed to send email notification. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        header("Location: ../leave.php?addleave=error&message=Failed to add leave");
        exit();
    }
}
?>



