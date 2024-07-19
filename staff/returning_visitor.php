<?php 
    include '../includes/AdminSession.php'; 
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
                include '../includes/sidebar.php';
            ?>
             <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                  <div class="card">
                  <form class="needs-validation" method="POST" action="php_action/checkin.php" novalidate="">
                      <div class="card-header">
                      <h4>Check In Returning Visitor</h4>
                      </div>
                      <div class="card-body">
                          <div class="card-header">Basic Info</div>
                          <input type="hidden" name="user_id" id="" value="<?= $user_id?>">
                      <div class="row">
                          <div class="form-group col-12">
                              <label for="visitor">Select Visitor</label>
                              <select name="visitor_id" class="form-control select2" required>
                                      <option value="" selected disabled>--SELECT RETURNING VISITOR --</option>
                                          <?php

                                          $result = mysqli_query($conn,"SELECT * FROM visitors WHERE status_id=1");
                                          while($row = mysqli_fetch_array($result)) {
                                          ?>
                                          <option value="<?=$row["visitor_id"];?>"><?= $row["full_name"];?></option>
                                          <?php
                                          }
                                          ?>
                                  </select>
                              <div class="invalid-feedback">Please enter your email address</div>
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
                          <div class="form-group col-sm-12 col-md-8 col-lg-3">
                              <label for="id">Time In</label>
                              <input type="time" class="form-control" name="time_in" required="">
                              <div class="invalid-feedback">Visitor check in time is required</div>
                          </div> 
                          <div class="form-group col-sm-12 col-md-8 col-lg-3">
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
                      <button type="submit" name="returningVisitor" class="btn btn-primary"><i class="fas fa-arrow-down mx-2"></i>Check In</button>
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
    