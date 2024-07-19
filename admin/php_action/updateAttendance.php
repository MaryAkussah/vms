<?php 

include '../../includes/config.php';

if(isset($_POST['updateAttendance'])){
	$attendance_id=$_POST['attendance_id'];
    $staff_id=$_POST['staff_id'];
	$time_out=$_POST['time_out'];

	if(empty($time_out)) {
        header("Location: ../dashboard.php?editAttendance=empty");
		exit(); 
    }else{
			
        $attendanceUpdate = mysqli_query($conn, "UPDATE attendance SET time_out='$time_out' WHERE attendance_id='$attendance_id' AND staff_id='$staff_id'") or die(mysqli_error($conn));
        
		}if ($attendanceUpdate) {
			// $message="Message Sent Successfully. Thank You";
			header("Location: ../dashboard.php?editAttendance=success");
		exit(); 
		}else{
			header("Location: ../dashboard.php?editAttendance=error");
		exit();
		
	}
}