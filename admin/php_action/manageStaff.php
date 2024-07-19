<?php 

include '../../includes/config.php';

if(isset($_POST['updateStaff'])){
	
	$staff_id=$_POST['staff_id'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
    $staff_email=$_POST['staff_email'];
    $staff_phone=$_POST['staff_phone'];
	$department_id=$_POST['department_id'];
	$staff_role_id=$_POST['staff_role_id'];
	if(empty($first_name) || empty($last_name) || empty($staff_email) || empty($staff_phone) || empty($department_id) || empty($staff_role_id)) {
        header("Location: ../manageStaff.php?updateStaff=empty");
		exit(); 
    }else{
			
        $visitorUpdate=mysqli_query($conn, "UPDATE tbl_staff SET first_name='$first_name', last_name='$last_name', staff_email='$staff_email', staff_phone='$staff_phone', department_id='$department_id', staff_role_id='$staff_role_id' WHERE staff_id='$staff_id'") or die(mysqli_error($conn));
        
		}if ($visitorUpdate) {
			// $message="Message Sent Successfully. Thank You";
			header("Location: ../manageStaff.php?updateStaff=success");
		exit(); 
		}else{
			header("Location: ../manageStaff.php?updateStaff=error");
		exit();
		
	}
}