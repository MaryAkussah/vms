<?php 
    require_once '../../includes/config.php';
 
    if(isset($_POST['updatePassword'])) {
        $staff_id = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_id'])));
        $username = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['username'])));
        $oldPassword = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['oldPassword'])));
        $password = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['password'])));
        $password2 = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['password2'])));
    
        if($password == $password2) {
            if(empty($password) || empty($password2)) {
                header("Location: ../profile.php?updatePassword=empty");
                exit();
            } else {
                // Retrieve the hashed password from the database
                $passwordQuery = mysqli_query($conn, "SELECT password FROM tbl_staff WHERE staff_id='$staff_id'");
                $userData = mysqli_fetch_assoc($passwordQuery);
                $hashedPassword = $userData['password'];
    
                // Verify if the old password matches the hashed password
                if(password_verify($oldPassword, $hashedPassword)) {
                    // Hash the new password
                    $hashedNewPassword = password_hash($password, PASSWORD_DEFAULT);
    
                    // Update the password in the database
                    $updateQuery = mysqli_query($conn, "UPDATE tbl_staff SET password='$hashedNewPassword', password_changed=1 WHERE staff_id='$staff_id'");
                    
                    if($updateQuery) {
                        header("Location: ../profile.php?updatePassword=success");
                        exit();
                    } else {
                        header("Location: ../profile.php?updatePassword=error");
                        exit();
                    }
                } else {
                    // Old password does not match
                    header("Location: ../profile.php?updatePassword=incorrectOldPassword");
                    exit();
                }
            }
        } else {
            // Passwords do not match
            header("Location: ../profile.php?updatePassword=passwordMismatch");
            exit();
        }
    }

    
    

    if(isset($_POST['updateDetails'])){
        $staff_id=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_id'])));
        $first_name=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['first_name'])));
        $last_name=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['last_name'])));
        $username=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['username'])));
        $staff_email=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_email'])));
        $staff_phone=htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['staff_phone'])));

        $type = explode('.', $_FILES['profile_photo']['name']);
        $type = $type[count($type)-1];		
        $url = '../../images/profile/'.uniqid(rand()).'.'.$type;
        if(in_array($type, array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'))) {
            if(is_uploaded_file($_FILES['profile_photo']['tmp_name'])) {			
                if(move_uploaded_file($_FILES['profile_photo']['tmp_name'], $url)) {
                    $detailsUpdate=mysqli_query($conn, "UPDATE tbl_staff SET profile_photo='$url', first_name='$first_name',last_name='$last_name', username='$username', staff_phone='$staff_phone', staff_email='$staff_email' WHERE staff_id='$staff_id'")or die(mysqli_error($conn));
                    if($detailsUpdate){
                        header("Location: ../profile.php?updateDetails=success");
                        exit();
                    }else{
                        header("Location: ../profile.php?updateDetails=error");
                        exit();
                    }
                }else{
                    header("Location: ../profile.php?updateDetails=movederror");
                    exit();
                }
            }else{
                header("Location: ../profile.php?updateDetails=notuploaded");
                exit();
            }
        }else{
            header("Location: ../profile.php?updateDetails=fileformat");
            exit();
        }
    }