<?php 
header('X-Content-Type-Options: nosniff');
date_default_timezone_set('Africa/Accra');

<<<<<<< HEAD
// session_start();

// // Set the allowed IP address
// $allowedIpAddress = '197.251.200.74';

// // Get the visitor's IP address
// $visitorIpAddress = $_SERVER['REMOTE_ADDR'];

// // Check if the visitor's IP address matches the allowed IP address
// if ($visitorIpAddress !== $allowedIpAddress) {
//     // IP address does not match, deny access
//     // You can redirect the visitor to an error page or display a message here
//     header("location: unauthorized.php");
//     exit(); // Stop further execution
// }
=======
session_start();

// Set the allowed IP address
$allowedIpAddress = '197.251.200.74';

// Get the visitor's IP address
$visitorIpAddress = $_SERVER['REMOTE_ADDR'];

// Check if the visitor's IP address matches the allowed IP address
if ($visitorIpAddress !== $allowedIpAddress) {
    // IP address does not match, deny access
    // You can redirect the visitor to an error page or display a message here
    header("location: unauthorized.php");
    exit(); // Stop further execution
}
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
?>
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>WGGHANA - ATTENDANCE</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
<<<<<<< HEAD
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/wgg.ico' />
=======
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e

  <!-- toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
      
       // login alerts
     if (!isset($_GET['message'])) {
             
	}else{
	 $submitCheck=$_GET['message'];

	 if ($submitCheck == "error") {
	   echo "toastr.error('Login Failed. Try again');";
	 }
	 elseif ($submitCheck == "nouser") {
	   echo "toastr.error('User not found. Please check your credentials.');";

	 }elseif ($submitCheck == "passerror") {
	   echo "toastr.error('Incorrect Password, Try Again');";
	 }elseif ($submitCheck == "already_signed_in") {
	   echo "toastr.error('You are already signed in for today');";
	 }elseif ($submitCheck == "success") {
	   echo "toastr.success('Attendance Recorded Successfully!');";
	  
	 }
	}

    ?>
  });
</script>
</head>
<body>
<body>
<<<<<<< HEAD
    <div id="app">
        <section class="section">
            <div class="container mt-5">
              <div>
                <a href="index" class="text-decoration-none btn btn-sm btn-info">Go To Dashboard</a>
              </div>
                <div class="row">
                  
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="text-center"><img src="assets/img/wgg.png" alt="wgg logo" width="150px" height="150px">
                    </div>
                    
                    <div class="card card-info">
=======
  <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="text-center"><img src="assets/img/wgg.png" alt="wgg logo" width="150px" height="150px">
                    </div>
                    <div class="card card-primary">
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                    <div class="card-header">
                        <h4>STAFF ATTENDANCE</h4>
                    </div>
                    <div class="card-body">
<<<<<<< HEAD
                        <form method="POST" action="attendanceProcess.php">
                        <div class="form-group">
                            <label for="user_input">Email / Phone / Username</label>
                            <input  type="text" class="form-control" id="user_input" name="user_input" tabindex="1" required=""  autofocus>
                            
=======
                        <form method="POST" action="attendanceProcess.php" class="needs-validation" novalidate="">
                        <div class="form-group">
                            <label for="email">Email / Phone / Username</label>
                            <input  type="text" class="form-control" name="user_input" tabindex="1" required autofocus>
                            <div class="invalid-feedback">
                            Please fill in your email / phone / username
                            </div>
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                           
<<<<<<< HEAD
                        </div>
                          <input id="password" type="password" class="form-control" name="password" required="" tabindex="2" >
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submitAttendance" class="btn btn-info btn-lg btn-block" tabindex="4"><i class="fas fa-lock mx-2 font-weight-600"></i>
                            SIGN IN / CLOCK IN
                            </button>
                        </div>
                        
                        </form>
                    </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                    Signing out of work? <a href="checkout">Check Out</a>
                    </div>
=======
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                            please fill in your password
                            </div>
                        </div>
                        <div>
                          <input type="time" name="time_in" value="<?= date('H:i:s')?>" hidden>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4"><i class="fas fa-lock"></i>
                            SIGN IN
                            </button>
                        </div>
                        </form>
                    </div>
                    </div>
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                </div>
                </div>
            </div>
        </section>
    </div>
<<<<<<< HEAD
</body>
=======

  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
</html>