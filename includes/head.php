<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>WGGHANA - VISITORS MANAGEMENT SYSTEM</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/wgg.ico' />

  <!-- datatables --> 
  <link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

  <!-- full calendar -->

  <link rel="stylesheet" href="../assets/bundles/fullcalendar/fullcalendar.min.css">
  <!-- select 2 -->
  <link rel="stylesheet" href="../assets/bundles/select2/dist/css/select2.min.css">

  <!-- toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<script>
  $(document).ready(function() {
    // Toastr initialization
    toastr.options = {
      // Add any additional options here (if needed) 
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    <?php
      
   // checkin form
   if (!isset($_GET['checkin'])) {
                
   }else{
   $submitCheck=$_GET['checkin'];

   if ($submitCheck == "invalid") {
   echo "toastr.error('Selected option is invalid');";
   }
   elseif ($submitCheck == "notsubmitted") {
   echo "toastr.error('Form not submitted');";

   }elseif ($submitCheck == "nodata") {
   echo "toastr.error('No parameter is set');";

   }elseif ($submitCheck == "success") {
   echo "toastr.success('Question Posted successfully');";
   }
   }
   
   // individual checkin form
   if (!isset($_GET['add_checkin'])) {
                
   }else{
   $submitCheck=$_GET['add_checkin'];

   if ($submitCheck == "error") {
   echo "toastr.error('Failed to check visitor in');";
   }elseif ($submitCheck == "visitorexist") {
   echo "toastr.error('Visitor already exists');";

   }
   elseif ($submitCheck == "notsubmitted") {
   echo "toastr.error('Form not submitted');";

   }elseif ($submitCheck == "success") {
   echo "toastr.success('Visitor Check In Success');";
   }
   }
   
   
   // checkout
   if (!isset($_GET['checkout'])) {
                
   }else{
   $submitCheck=$_GET['checkout'];

   if ($submitCheck == "error") {
   echo "toastr.error('Failed to check visitor out');";
   }
   elseif ($submitCheck == "empty") {
   echo "toastr.error('Check out time is required');";

   }elseif ($submitCheck == "success") {
   echo "toastr.success('Visitor Check Out Success');";
   }
   }

   // update visitor
   if (!isset($_GET['updateVisitor'])) {
                
   }else{
   $submitCheck=$_GET['updateVisitor'];

   if ($submitCheck == "error") {
   echo "toastr.error('Failed to update visitor details');";
   }
   elseif ($submitCheck == "empty") {
   echo "toastr.error('All fields are required');";

   }elseif ($submitCheck == "success") {
   echo "toastr.success('Visitor details updated Successfully');";
   }
   }

   // transfer visitor
   if (!isset($_GET['transferVisitor'])) {
                
   }else{
   $submitCheck=$_GET['transferVisitor'];

   if ($submitCheck == "error") {
   echo "toastr.error('Failed to transfer visitor');";
   }
   elseif ($submitCheck == "empty") {
   echo "toastr.error('All fields are required');";

   }elseif ($submitCheck == "success") {
   echo "toastr.success('Visitor Transfered Successfully');";
   }
   }
   
      // approve appointment
   if (!isset($_GET['approveAppointment'])) {
                
   }else{
   $submitCheck=$_GET['approveAppointment'];

   if ($submitCheck == "noapt") {
   echo "toastr.error('Appointment not found');";
   }
   elseif ($submitCheck == "error") {
   echo "toastr.error('Failed to approve appointment');";

   }elseif ($submitCheck == "success") {
   echo "toastr.success('Appointment approved successfully');";
   }
   }

   // decline appointment
   if (!isset($_GET['declineAppointment'])) {
                
   }else{
   $submitCheck=$_GET['declineAppointment'];

   if ($submitCheck == "noapt") {
   echo "toastr.error('Appointment not found');";
   }
   elseif ($submitCheck == "error") {
   echo "toastr.error('Failed to decline appointment');";

   }elseif ($submitCheck == "success") {
   echo "toastr.success('Appointment declined');";
   }
   }
   // add staff
   if (!isset($_GET['addStaff'])) {
                
   }else{
   $submitCheck=$_GET['addStaff'];

   if ($submitCheck == "error") {
   echo "toastr.error('Failed add Staff Member');";
   }
   elseif ($submitCheck == "staffexist") {
   echo "toastr.error('Staff Already Exist');";

   }elseif ($submitCheck == "success") {
   echo "toastr.success('Staff Added Successfully');";
   }
   }  
   
   // manage staff
   if (!isset($_GET['manageStaff'])) {
                
   }else{
   $submitCheck=$_GET['manageStaff'];

   if ($submitCheck == "error") {
   echo "toastr.error('Failed Update Staff Details');";
   }
   elseif ($submitCheck == "empty") {
   echo "toastr.error('All Fields are Required');";

   }elseif ($submitCheck == "success") {
   echo "toastr.success('Staff Details Updated Successfully');";
   }
   }

   
  //passwordreset
	if (!isset($_GET['updatePassword'])) {
             
	}else{
	 $submitCheck=$_GET['updatePassword'];

	 if ($submitCheck == "incorrectOldPassword") {
	   echo "toastr.error('The old password is incorrect');";
	   
	 }elseif ($submitCheck == "error") {
	   echo "toastr.error('Failed to reset password.Try again');";

	 }elseif ($submitCheck == "success") {
	   echo "toastr.success('Password Reset successfully')";
	 }elseif ($submitCheck == "usernotfound") {
	   echo "toastr.success('User not found. Try again')";
	 }elseif ($submitCheck == "passwordMismatch") {
    echo "toastr.success('Password do not match')";
  }elseif ($submitCheck == "empty") {
    echo "toastr.error('Password Fields are empty')";
  }
	}

  
//updateDetails
if (!isset($_GET['updateDetails'])) {
             
}else{
 $submitCheck=$_GET['updateDetails'];

 if ($submitCheck == "empty") {
   echo "toastr.error('Empty fields, please try again');";
   
 }elseif ($submitCheck == "error") {
   echo "toastr.error('Failed to update profile, please try again');";

 }elseif($submitCheck == "fileformat"){
  echo "toastr.error('Unsupported File Format. File must be jpeg, jpg or png')";

 }elseif($submitCheck == "movederror"){
  echo "toastr.error('Failed to move photo to destination')";

 }elseif ($submitCheck == "success") {
   echo "toastr.success('Profile updated successfully')";
 }
}
<<<<<<< HEAD
//insertRequest
if (!isset($_GET['insertRequest'])) {
             
}else{
 $submitCheck=$_GET['insertRequest'];

 if ($submitCheck == "empty") {
   echo "toastr.error('Empty fields, please try again');";
   
 }elseif ($submitCheck == "error") {
   echo "toastr.error('Failed to send request, please try again');";

 }elseif ($submitCheck == "success") {
   echo "toastr.success('Request sent successfully')";
 }
}
//insertRequest
if (!isset($_GET['editAttendance'])) {
             
}else{
 $submitCheck=$_GET['editAttendance'];

 if ($submitCheck == "empty") {
   echo "toastr.error('Empty fields are required, please try again');";
   
 }elseif ($submitCheck == "error") {
   echo "toastr.error('Failed to Update Attendance, please try again');";

 }elseif ($submitCheck == "success") {
   echo "toastr.success('Attendance updated successfully')";
 }
}

//staff request approval
if (!isset($_GET['approveRequest'])) {
             
}else{
 $submitCheck=$_GET['approveRequest'];

 if ($submitCheck == "empty") {
   echo "toastr.error('Empty fields are required, please try again');";
   
 }elseif ($submitCheck == "error") {
   echo "toastr.error('Failed approve request. please try again');";

 }elseif ($submitCheck == "success") {
   echo "toastr.success('Request Approved and sent to HR')";
 }
}

//staff request disapproval
if (!isset($_GET['declineRequest'])) {
             
}else{
 $submitCheck=$_GET['declineRequest'];

 if ($submitCheck == "empty") {
   echo "toastr.error('Empty fields are required, please try again');";
   
 }elseif ($submitCheck == "error") {
   echo "toastr.error('Failed decline request. please try again');";

 }elseif ($submitCheck == "success") {
   echo "toastr.success('Request Declined')";
 }
}

//break time
if (!isset($_GET['breaktime'])) {
             
}else{
 $submitCheck=$_GET['breaktime'];

if ($submitCheck == "error") {
   echo "toastr.error('Failed. please try again');";

 }elseif ($submitCheck == "success") {
   echo "toastr.success('Success. You have 1 hour')";
 }
}

//break time
if (!isset($_GET['breakover'])) {
             
}else{
 $submitCheck=$_GET['breakover'];

if ($submitCheck == "error") {
   echo "toastr.error('Failed. please try again');";

 }elseif ($submitCheck == "success") {
   echo "toastr.success('Success. Your break is over')";
 }
}

//changing default password alert
if (!isset($_GET['defpas'])) {
             
}else{
 $submitCheck=$_GET['defpas'];

if ($submitCheck == "defpass") {
   echo "toastr.error('Please change your default password');";

 }
}
//leave
if (!isset($_GET['addleave'])) {
             
}else{
 $submitCheck=$_GET['addleave'];

if ($submitCheck == "error") {
   echo "toastr.error('Failed to submit leave');";

 }elseif ($submitCheck == "success") {
   echo "toastr.success('Leave Submitted Successfully');";

 }elseif ($submitCheck == "exceed") {
   echo "toastr.error('Leave Limit Exceeded');";

 }elseif ($submitCheck == "insufficient") {
   echo "toastr.error('Requested Leave Days Exceed Allowed Leave Days');";

 }
}

//assessment
if (!isset($_GET['assessment'])) {
  // If assessment parameter is not set, do nothing
} else {
  $assessmentCheck = $_GET['assessment'];

  if ($assessmentCheck == "error") {
      echo "toastr.error('Failed to add assessment');";
  } elseif ($assessmentCheck == "success") {
      echo "toastr.success('Assessment added successfully');";
  }
}
=======
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e

   ?>
  });
  </script>