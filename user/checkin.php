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
          <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                  <div class="card">
                  <form class="needs-validation" method="POST" action="php_action/checkin.php" novalidate="">
                      <div class="card-header">
                      <h4>Check In Visitor</h4>
                      </div>
                      <div class="card-body">
                          <div class="card-header">Basic Info</div>
                          <input type="hidden" name="visitor_id" id="" value="<?= $visitor_id?>">
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                          <label for="frist_name">Visitor Name</label>
                          <input id="frist_name" type="text" class="form-control" name="full_name" value="<?=$full_name ?>" readonly>
                          <div class="invalid-feedback">Please enter the visitor's name</div>
                          </div>
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="visitor_email"value="<?=$visitor_email ?>" readonly>
                              <div class="invalid-feedback">Please enter your email address</div>
                          </div>
                      </div>
                      <div class="row">
                          
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="phone">Phone</label>
                              <input type="number" class="form-control" name="visitor_phone"value="<?=$visitor_phone ?>" readonly>
                              <div class="invalid-feedback">Please enter your phone number</div>
                          </div> 
                          
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="visitor_type">Visitor Type</label>
                              <select name="visitor_type_id" class="form-control" required>
                                      <option value="1" selected >Visitor</option>
                                          <?php

                                          $result = mysqli_query($conn,"SELECT * FROM visitor_type WHERE visitor_type_id!=1");
                                          while($row = mysqli_fetch_array($result)) {
                                          ?>
                                          <option value="<?=$row["visitor_type_id"];?>"><?= $row["visitor_type_name"];?></option>
                                          <?php
                                          }
                                          ?>
                                  </select>
                              <div class="invalid-feedback">Please enter your email address</div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="id">Address / Organization</label>
                              <input  type="text" class="form-control" name="organization" value="<?=$organization ?>" readonly>
                              <div class="invalid-feedback">Please enter visitors address or o rganization</div>
                          </div> 
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="id">Ghana Card / Voters ID</label>
                              <input id="id" type="text" class="form-control" name="identification" value="<?=$identification ?>" readonly>
                              <div class="invalid-feedback">Please enter your identification number</div>
                          </div> 
                      </div>
                      <div class="card-header">Visit Info</div>

                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="staff">Host Name (Staff)</label>
                              <select name="staff_id" class="form-control select2" required>
                                      <option value="" selected disabled>--SELECT HOST NAME--</option>
                                          <?php

                                          $result = mysqli_query($conn,"SELECT * FROM tbl_staff WHERE status_id=1");
                                          while($row = mysqli_fetch_array($result)) {
                                          ?>
                                          <option value="<?=$row["staff_id"];?>"><?= $row["first_name"];?> <?= $row["last_name"];?></option>
                                          <?php
                                          }
                                          ?>
                                  </select>
                              <div class="invalid-feedback">Please enter the hostname</div>
                          </div>
                          <div class="form-group col-sm-6 col-md-6 col-lg-3">
                              <label for="id">Time In</label>
                              <input type="time" class="form-control" name="time_in" required="">
                              <div class="invalid-feedback">Visitor check in time is required</div>
                          </div> 
                          <div class="form-group col-sm-6 col-md-6 col-lg-3">
                              <label for="id">Date In</label>
                              <input type="date" class="form-control" name="date_in" required="" value="<?php echo date('Y-m-d');?>">
                              <div class="invalid-feedback">Check in date</div>
                          </div>
                      </div>

                      <div class="form-group mb-0">
                          <label>Purpose of Visit</label>
                          <textarea class="form-control" name="purpose" required=""></textarea>
                          <div class="invalid-feedback">
                          State purpose of visit
                          </div>
                      </div>
                      </div>
                      <div class="card-footer text-right">
                      <button type="submit" name="individualCheckIn" class="btn btn-primary"><i class="fas fa-arrow-down mx-2"></i>Check In</button>
                      </div>
                  </form>
                  </div>
              </div>
            </div>

        </section>
      </div>
            
        </div>
    </div>
</body>


<?php include '../includes/footer.php'?>
    