<?php 

include '../../includes/config.php';

if(isset($_POST['visitorCheckout'])){

	$check_in_id=$_POST['check_in_id'];
    $visitor_id=$_POST['visitor_id'];
    $staff_id=$_POST['staff_id'];
	$time_out=$_POST['time_out'];

	if(empty($time_out)) {
        header("Location: ../visitorCheckout.php?checkout=empty");
		exit(); 
    }else{
			
        $checkOutQuery = mysqli_query($conn, "UPDATE check_in SET time_out='$time_out', status_id=5 WHERE check_in_id='$check_in_id'") or die(mysqli_error($conn));
        $visitorUpdate=mysqli_query($conn, "UPDATE visitors SET status_id=1 WHERE visitor_id='$visitor_id'") or die(mysqli_error($conn));
        $staffUpdate=mysqli_query($conn, "UPDATE tbl_staff SET status_id=1 WHERE staff_id='$staff_id'") or die(mysqli_error($conn));
        
		}if ($checkOutQuery && $visitorUpdate && $staffUpdate) {
			// $message="Message Sent Successfully. Thank You";
			header("Location: ../visitorCheckout.php?checkout=success");
		exit(); 
		}else{
			header("Location: ../visitorCheckout.php?checkout=error");
		exit();
		
	}
}