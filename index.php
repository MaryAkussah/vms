<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>WGGHANA - VISITORS MANAGEMENT SYSTEM</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/wgg.ico' />

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
	 }elseif ($submitCheck == "adminsuccess") {
	   echo "toastr.success('Login Success!');";
	   echo 'setTimeout(function () { window.location.href = "admin/dashboard.php"; }, 1000);'; // Redirect after 2 seconds
	 }elseif ($submitCheck == "staffsuccess") {
	   echo "toastr.success('Login Success!');";
	   echo 'setTimeout(function () { window.location.href = "staff/dashboard.php"; }, 1000);'; // Redirect after 2 seconds
	 }elseif ($submitCheck == "success") {
	   echo "toastr.success('Login Success!');";
	   echo 'setTimeout(function () { window.location.href = "user/dashboard.php"; }, 1000);'; // Redirect after 2 seconds
	 }
	}

    ?>
  });
</script>
</head>
<body>
<body>
  <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="text-center"><img src="assets/img/wgg.png" alt="wgg logo" width="150px" height="150px">
                    <p><strong>VISITORS MANAGEMENT SYSTEM</strong></p>
                    </div>
                    <div class="card card-primary">
                    <div class="card-header">
                        <h4>LOGIN - WGGHANA VMS</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="loginprocess.php" class="needs-validation" novalidate="">
                        <div class="form-group">
                            <label for="email">Email / Phone / Username</label>
                            <input  type="text" class="form-control" name="user_input" tabindex="1" required autofocus>
                            <div class="invalid-feedback">
                            Please fill in your email / phone / username
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                            <div class="float-right">
                                <a href="forgot-password.php" class="text-small">
                                Forgot Password?
                                </a>
                            </div>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                            please fill in your password
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login
                            </button>
                        </div>
                        </form>
                    </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                    Don't have an account? <a href="register.php">Create One</a>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>

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
</html>