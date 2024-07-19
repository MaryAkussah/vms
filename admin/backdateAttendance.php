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
                  <form class="needs-validation" method="POST" action="php_action/backdateAttendance.php" novalidate="">
                      <div class="card-header">
                      <h4>Backdate Attendance</h4>
                      </div>
                      <div class="card-body">
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="staff">Staff Name</label>
                              <select name="staff_id" class="form-control select2" required>
                                      <option value="" selected disabled>--SELECT STAFF NAME--</option>
                                          <?php

                                          $result = mysqli_query($conn,"SELECT * FROM tbl_staff WHERE status_id=1");
                                          while($row = mysqli_fetch_array($result)) {
                                          ?>
                                          <option value="<?=$row["staff_id"];?>"><?= $row["first_name"];?> <?= $row["last_name"];?></option>
                                          <?php
                                          }
                                          ?>
                                  </select>
                              <div class="invalid-feedback">Please enter the staff name</div>
                          </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-6 col-md-6 col-lg-3">
                              <label for="id">Time In</label>
                              <input type="time" class="form-control" name="time_in" required="">
                              <div class="invalid-feedback">Visitor check in time is required</div>
                          </div>
                          
                          <div class="form-group col-sm-6 col-md-6 col-lg-3">
                              <label for="id">Time Out</label>
                              <input type="time" class="form-control" name="time_out" >
                          </div>
                          
                      </div>
                        

                      <div class="row">
                         <div class="form-group col-sm-6 col-md-6 col-lg-3">
                            <label for="id">Status</label>
                            <select name="status_id" class="form-control">
                                <option value="" selected>SELECT STATUS</option>
                                <option value="9">Late</option>\
                                <option value="10">On Time</option>
                            </select>

                            <div class="invalid-feedback">Check in date</div>
                        </div>
                        
                        <div class="form-group col-sm-6 col-md-6 col-lg-3">
                            <label for="id">Date In</label>
                            <input type="date" class="form-control" name="date_in" required="" value="<?php echo date('Y-m-d');?>">
                            <div class="invalid-feedback">Check in date</div>
                        </div>
                      </div>
                      </div>
                      <div class="card-footer text-right">
                      <button type="submit" name="submitAttendance" class="btn btn-primary"><i class="fas fa-arrow-down mx-2"></i>Sign In</button>
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
    