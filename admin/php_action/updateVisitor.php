<?php 

include '../../includes/config.php';

if(isset($_POST['visitorUpdate'])){

	$visitor_id=$_POST['visitor_id'];
	$full_name=$_POST['full_name'];
    $visitor_email=$_POST['visitor_email'];
    $visitor_phone=$_POST['visitor_phone'];
	$organization=$_POST['organization'];
	$identification=$_POST['identification'];
	$status_id=$_POST['status_id'];

	if(empty($full_name) || empty($visitor_phone) || empty($organization) || empty($status_id)) {
        header("Location: ../manageVisitors.php?updateVisitor=empty");
		exit(); 
    }else{
			
        $visitorUpdate=mysqli_query($conn, "UPDATE visitors SET full_name='$full_name', visitor_email='$visitor_email', visitor_phone='$visitor_phone', organization='$organization', identification='$identification', status_id='$status_id' WHERE visitor_id='$visitor_id'") or die(mysqli_error($conn));
        
		}if ($visitorUpdate) {
			// $message="Message Sent Successfully. Thank You";
			header("Location: ../manageVisitors.php?updateVisitor=success");
		exit(); 
		}else{
			header("Location: ../manageVisitors.php?updateVisitor=error");
		exit();
		
	}
}