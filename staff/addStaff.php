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
                  <form class="needs-validation" method="POST" action="php_action/addStaff.php" novalidate="">
                      <div class="card-header">
                      <h4>Add Staff</h4>
                      </div>
                      <div class="card-body">
                          <div class="card-header">Basic Info</div>
                          <input type="hidden" name="user_id" id="" value="<?= $user_id?>">
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                          <label for="frist_name">First Name</label>
                          <input id="frist_name" type="text" class="form-control" name="first_name" autofocus required="">
                          <div class="invalid-feedback">Staff First Name is required</div>
                          </div>
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="last_name">Last Name</label>
                              <input type="text" class="form-control" name="last_name" required="">
                              <div class="invalid-feedback">Staff Last Name is required</div>
                          </div>
                      </div>
                      <div class="row">
<<<<<<< HEAD
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">`1
=======
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="staff_email" required="">
                              <div class="invalid-feedback">Please enter your email address</div>
                          </div>

                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="phone">Phone</label>
                              <input type="number" class="form-control" name="staff_phone" required="">
                              <div class="invalid-feedback">Please enter your phone number</div>
                          </div> 
                      </div>

                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="staff">Department</label>
                              <select name="department_id" class="form-control" required>
                                      <option value="" selected disabled>--SELECT DEPARTMENT--</option>
                                          <?php

                                          $result = mysqli_query($conn,"SELECT * FROM department ");
                                          while($row = mysqli_fetch_array($result)) {
                                          ?>
                                          <option value="<?=$row["department_id"];?>"><?= $row["department_name"];?></option>
                                          <?php
                                          }
                                          ?>
                                  </select>
                              <div class="invalid-feedback">Please enter the staff department</div>
                          </div>
                          
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="staff">Position / Role</label>
                              <select name="staff_role_id" class="form-control" required>
                                      <option value="" selected disabled>--SELECT POSITION / ROLE--</option>
                                          <?php

                                          $result = mysqli_query($conn,"SELECT * FROM staff_role");
                                          while($row = mysqli_fetch_array($result)) {
                                          ?>
                                          <option value="<?=$row["staff_role_id"];?>"><?= $row["staff_role_name"];?> </option>
                                          <?php
                                          }
                                          ?>
                                  </select>
                              <div class="invalid-feedback">Please enter the staff role</div>
                          </div>
                      </div>
                      </div>
                      <div class="card-footer text-right">
                      <button type="submit" name="addStaff" class="btn btn-primary"><i class="fas fa-plus mx-2"></i>Add Staff</button>
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
    