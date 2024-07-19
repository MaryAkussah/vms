<?php

include '../../includes/config.php';

if(isset($_POST['submitAttendance'])){
    $staff_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_id'])));
    $time_in = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['time_in'])));
    $time_out = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['time_out'])));
    $date_in = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['date_in'])));
    $status_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['status_id'])));

      // Insert attendance record
      $insertQuery = mysqli_query($conn, "INSERT INTO attendance (staff_id, time_in,time_out,status_id,at_created_at) VALUES ('$staff_id', '$time_in','$time_out','$status_id','$date_in')")or die(mysqli_error($conn));
    
      if($insertQuery){

      // Redirect to the attendance page with success message
      header("Location: ../backdateAttendance.php?message=success");
      exit();
  } else {
      // Incorrect password, show an error message
      header("Location: ../backdateAttendance.php?message=passerror");
      exit();
  }

}