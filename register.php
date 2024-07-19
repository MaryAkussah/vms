
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
        function validateForm() {
            var user_email = document.getElementById('user_email').value;
            var phone = document.getElementById('phone').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var password2 = document.getElementById('password2').value;

            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var phonePattern = /^\d{10}$/;
            var usernamePattern = /^[a-zA-Z0-9_-]+$/;

            if (!user_email.match(emailPattern)) {
                toastr.error('Invalid email address');
                return false;
            }

            if (!phone.match(phonePattern)) {
                toastr.error('Invalid phone number');
                return false;
            }

            if (!username.match(usernamePattern)) {
                toastr.error('Invalid username');
                return false;
            }

            if (password !== password2) {
                toastr.error('Passwords do not match');
                return false;
            }

            return true;
        }
    </script>
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
      
       // register alerts
     if (!isset($_GET['message'])) {
             
	}else{
	 $submitCheck=$_GET['message'];

	 if ($submitCheck == "error") {
	   echo "toastr.error('Registration Failed. Try again');";
	 }
	 elseif ($submitCheck == "userexist") {
	   echo "toastr.error('User with the same email or username already exists.');";

	 }elseif ($submitCheck == "success") {
	   echo "toastr.success('User registered successfully!');";
	   echo 'setTimeout(function () { window.location.href = "index.php"; }, 2000);'; // Redirect after 2 seconds
	 }
	}

    ?>
  });
</script>
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <!-- logo -->
          <div class="text-center"><img src="assets/img/wgg.png" alt="wgg logo" width="150px" height="150px">
        <P><strong>VISITORS MANAGEMENT SYSTEM</strong></P>
        </div>
            <div class="card card-primary">
              <div class="card-header">
                <h4>REGISTER - WGGHANA </h4>
              </div>
              <div class="card-body">
                <form method="POST" action="registerprocess.php" class="needs-validation" novalidate="" onsubmit="return validateForm()">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">First Name</label>
                      <input id="frist_name" type="text" class="form-control" name="first_name" autofocus required="">
                      <div class="invalid-feedback">Please enter your first name</div>
                    </div>

                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name" required="">
                      <div class="invalid-feedback">Please enter your last name</div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="visitor_email">
                    </div>
                    <div class="form-group col-6">
                        <label for="phone">Phone</label>
                        <input id="phone" type="number" class="form-control" name="visitor_phone" required="">
                        <div class="invalid-feedback">Please enter your phone number
                    </div>
                  </div> 
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                        <label for="address">Address / Organization</label>
                        <input id="address" type="text" class="form-control" name="organization" required="">
                        <div class="invalid-feedback">Please enter your address or organization name</div>
                    </div>
                    <div class="form-group col-6">
                        <label for="phone">ID (Ghana Card / Voters ID)</label>
                        <input id="phone" type="text" class="form-control" name="identification" >
                        
                  </div> 
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control" name="username"  required="">
                        <div class="invalid-feedback">Please choose a username
                    </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="visitor">Visitor Type</label>
                        <select name="visitor_type_id" id="" class="form-control" required="">
                            <option value="" selected disabled>--SELECT VISITOR TYPE</option>
                            <option value="1">Visitor</option>
                            <option value="2">Service Provider</option>
                            <option value="3">Contractor</option>
                            <option value="4">Vendor</option>
                            <option value="5">Interview Candidate</option>
                        </select>
                    </div>
                    <div class="invalid-feedback">Please select visitor type</div>
                  </div> 
                  
                  
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password" required="">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                        
                      </div> <div class="invalid-feedback">Choose a password</div>
                    </div>
                   
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm" required="">
                      <div class="invalid-feedback">Enter same password as before</div>
                    </div>
                   
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Register">
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="index.php">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>