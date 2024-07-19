<?php

include '../../includes/config.php';

if(isset($_POST['visitorTransfer'])){
    
<<<<<<< HEAD
    $check_in_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['check_in_id'])));
    $visitor_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['visitor_id'])));
    $staff_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_id'])));
    $old_staff_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['old_staff_id'])));
    $time_in = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['time_in'])));
    $date_in = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['date_in'])));
    $purpose = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['purpose'])));
    $team_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['team_id'])));
=======
    $check_in_id=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['check_in_id'])));
    $visitor_id=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['visitor_id'])));
    $staff_id=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_id'])));
    $old_staff_id=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['old_staff_id'])));
    $time_in=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['time_in'])));
    $date_in=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['date_in'])));
    $purpose=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['purpose'])));
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e

    if(empty($staff_id) || empty($purpose)) {
        header("Location: ../transferVisitors.php?transferVisitor=empty");
<<<<<<< HEAD
        exit(); 
    } else {
        // Check if the visitor belongs to a team or is an individual visitor
        if ($team_id == NULL) {
            // Individual visitor transfer
            $visitorTransfer = mysqli_query($conn, "UPDATE check_in SET status_id=7 WHERE check_in_id='$check_in_id'") or die(mysqli_error($conn));
            $checkinQuery = mysqli_query($conn, "INSERT INTO check_in (staff_id, visitor_id, purpose, time_in, date_in) VALUES ('$staff_id', '$visitor_id', '$purpose', '$time_in', '$date_in')") or die(mysqli_error($conn));
            $visitorUpdate = mysqli_query($conn, "UPDATE visitors SET status_id=7 WHERE visitor_id='$visitor_id'") or die(mysqli_error($conn));
        } else {
            // Team transfer
            // Generate new team ID
            $new_team_id = rand(100000, 999999);
=======
		exit(); 
    }else{
			
        $visitorTransfer=mysqli_query($conn, "UPDATE check_in SET status_id=7 WHERE check_in_id='$check_in_id'") or die(mysqli_error($conn));
        $staffUpdate=mysqli_query($conn, "UPDATE tbl_staff SET status_id=1 WHERE staff_id='$old_staff_id'") or die(mysqli_error($conn));
        $checkinQuery=mysqli_query($conn, "INSERT INTO check_in (staff_id, visitor_id, purpose, time_in,date_in) VALUES ('$staff_id', '$visitor_id', '$purpose', '$time_in', '$date_in')") or die(mysqli_error($conn));
        $staffQuery=mysqli_query($conn, "UPDATE tbl_staff SET status_id=2 WHERE staff_id='$staff_id'") or die(mysqli_error($conn));
        $visitorQuery=mysqli_query($conn, "UPDATE visitors SET status_id=7 WHERE visitor_id='$visitor_id'") or die(mysqli_error($conn));
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e

            // Transfer all team members and insert new records
            $visitorTransfer = mysqli_query($conn, "UPDATE check_in SET status_id=7 WHERE team_id='$team_id'") or die(mysqli_error($conn));
            $teamMembersQuery = mysqli_query($conn, "SELECT * FROM check_in WHERE team_id='$team_id'") or die(mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($teamMembersQuery)) {
                $visitor_id = $row['visitor_id'];
                $checkinQuery = mysqli_query($conn, "INSERT INTO check_in (staff_id, visitor_id, team_id, purpose, time_in, date_in) VALUES ('$staff_id', '$visitor_id', '$new_team_id', '$purpose', '$time_in', '$date_in')") or die(mysqli_error($conn));
            }
            $visitorUpdate = mysqli_query($conn, "UPDATE visitors SET status_id=7 WHERE team_id='$team_id'") or die(mysqli_error($conn));

            // Insert new team record
            $teamInsert = mysqli_query($conn, "INSERT INTO tbl_team (team_id, staff_id, visitor_id) VALUES ('$new_team_id', '$staff_id', '$visitor_id')") or die(mysqli_error($conn));
        }

        // Update staff status
        $staffUpdate = mysqli_query($conn, "UPDATE tbl_staff SET status_id=1 WHERE staff_id='$old_staff_id'") or die(mysqli_error($conn));
        $staffQuery = mysqli_query($conn, "UPDATE tbl_staff SET status_id=2 WHERE staff_id='$staff_id'") or die(mysqli_error($conn));

        if ($visitorTransfer && $checkinQuery && $visitorUpdate && $teamInsert && $staffUpdate && $staffQuery) {
            header("Location: ../transferVisitors.php?transferVisitor=success");
            exit(); 
        } else {
            header("Location: ../transferVisitors.php?transferVisitor=error");
            exit();
        }
    }
}
?>
