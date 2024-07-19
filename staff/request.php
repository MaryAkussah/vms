<?php 
    include '../includes/StaffSession.php'; 
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
                include '../includes/staffSidebar.php';
            ?>
             <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                  <div class="card">
                  <form class="needs-validation" method="POST" action="php_action/request.php" novalidate="">
                      <div class="card-header">
                      <h4>WGGHANA STAFF REQUEST FORM</h4>
                      </div>
                      <div class="card-body">
                      <div class="row">
                        <input type="hidden" name="staff_id" value="<?=$staff_id?>">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                          <label for="frist_name">Staff Name</label>
                          <input id="frist_name" type="text" class="form-control" name="first_name" value="<?=$first_name?> <?=$last_name?>"readonly>
                          <div class="invalid-feedback">Please enter the visitor's name</div>
                          </div>
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="visitor_email" value="<?=$staff_email?>" readonly>
                              <div class="invalid-feedback">Please enter your email address</div>
                          </div>
                      </div>
                      <div class="row">
                            <?php 
                            $department_head = mysqli_query($conn, "SELECT * FROM tbl_staff WHERE app_role=1 AND department_id='$department_id'
                                                                ");
                            if ($department_head->num_rows === 1) {
                                $depHeadData = $department_head->fetch_assoc();
                                $headId=$depHeadData['staff_id'];
                                $headName = $depHeadData['first_name'] . ' ' . $depHeadData['last_name'];
                            } else {
                                // Handle the case where no department head is found (e.g., set $headName to a default value or display a message)
                                $headName = 'No Department Head Found';
                            }
                            ?>
                            <div class="form-group col-sm-12 col-md-8 col-lg-6">
                                <label for="id">Department Head</label>
                                <input type="text" class="form-control" name="department_head" value="<?= $headName ?>" readonly>
                            </div>
                            <input type="hidden" name="department_head_id" value="<?= $headId?>">

                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="id">Department</label>
                              <input id="id" type="text" class="form-control" name="department_id" value="<?=$department_name?>" readonly>
                          </div> 
                      </div>
                    

                      <div class="form-group mb-0">
                          <label>Request Description</label>
                          <textarea class="form-control" name="description" required=""></textarea>
                          <div class="invalid-feedback">
                          State your request
                          </div>
                      </div>
                      </div>
                      <div class="card-footer text-right">
                      <button type="submit" name="request" class="btn btn-primary"><i class="fas fa-arrow-right mx-2"></i>Submit Request</button>
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
    