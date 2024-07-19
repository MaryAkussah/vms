
<?php 
    include '../includes/UserSession.php'; 
    include '../includes/head.php'; 
    // include 'php_action/dashboard.php';
?>
</head>
<body>
  <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php 
                include '../includes/header.php';
                include '../includes/userSidebar.php';
            ?>
             <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                    <img src="<?php if(empty($profile_photo)){echo "../assets/img/users/user-2.png";}else{echo preg_replace('/^\.\.\//', '',$profile_photo);} ?>" alt="profile photo" width="250px" height="250px" id="profile-photo">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?= $full_name?></a>
                      </div>
                      <div class="author-box-job"><?= $visitor_type_name?></div>
                    </div>
                    <div class="text-center">
                      <div class="author-box-description">
                        <p>
                          User description here if needed. i don't think it is important but let me just leave this here just in case
                        </p>
                      </div>
                      <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-github">
                        <i class="fab fa-github"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                        <i class="fab fa-instagram"></i>
                      </a>
                      <div class="w-100 d-sm-none"></div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Personal Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          <?= $visitor_phone?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                          <?= $visitor_email?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Address / Organization
                        </span>
                        <span class="float-right text-muted">
                          <?= $organization ?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          ID (Ghana Card / Voters ID)
                        </span>
                        <span class="float-right text-muted">
                          <?php if(empty($identification)){echo "<b class='text-danger'>Not Set</b>";}else{ echo $identification;} ?>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="card-header">Settings</div>
                  <div class="card-body">                    
                    <form method="POST" action="php_action/profileSetting.php"  class="needs-validation" novalidate="" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="visitor_id" value="<?php echo $visitor_id; ?>">
                        <div class="form-group col-md-6 col-12">
                            <label>Visitor Name</label>
                            <input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>">
                            <div class="invalid-feedback">Please fill in the first name</div>
                        </div>
                        
                        <div class="form-group col-md-6 col-12">
                            <label>Visitor ID</label>
                            <input type="text" class="form-control" name="visitor_id" value="<?= $visitor_id?>" readonly>
                            <div class="invalid-feedback">Please fill in the last name</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Contact Number</label>
                            <input type="tel" class="form-control" name="visitor_phone" value="<?php echo $visitor_phone; ?>" required>
                            <div class="invalid-feedback">Please fill in the phone number</div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="user_email" class="form-control" name="visitor_email" value="<?php echo $visitor_email; ?>" required>
                            <div class="invalid-feedback">Please fill in the email</div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $username?>" required="">
                                  <div class="invalid-feedback">Please fill in the Username</div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Profile Photo</label>
                                <input type="file" class="form-control" name="profile_photo" >
                                <div class="invalid-feedback">Please choose a profile photo</div>
                            </div>
                            
                    </div>
                    <div class="card-footer text-right">
                            <button type="submit" name="updateDetails" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                  </div>
                  <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                      <form method="POST" action="php_action/profileSetting.php" class="needs-validation" novalidate="">
                          <div class="card-header">
                              <h4>Edit Password</h4>
                          </div>
                          <div class="card-body">
                              <div class="row">
                              <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                                  <div class="form-group col-md-6 col-12">
                                      <label>Old Password</label>
                                      <input type="password" class="form-control" name="oldPassword" placeholder="Enter your old password">
                                      
                                  </div>
                                  <div class="form-group col-md-6 col-12">
                                      <label>Password</label>
                                      <input type="password" class="form-control" name="password" placeholder="Enter a new password">
                                      
                                  </div>
                                  <div class="form-group col-md-6 col-12">
                                      <label>Confirm Password</label>
                                      <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                                      
                                  </div>
                              </div>
                          <div class="card-footer text-right">
                              <button type="submit" name="updatePassword" class="btn btn-primary">Update Password</button>
                          </div>
                      </form>
                  </div>
              </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
            
        </div>
    </div>

<?php include '../includes/footer.php'?>
</body>