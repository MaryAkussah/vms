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
                      <h4>Team Check In</h4>
                      </div>
                      <div class="card-body">
                          <div class="card-header">Basic Info</div>
                          <div id="formContainer">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-8 col-lg-6">
                                    <label for="frist_name">Visitor Name</label>
                                    <input id="frist_name" type="text" class="form-control visitor-name" name="full_name[]" autofocus required="">
                                    <div class="invalid-feedback">Please enter the visitor's name</div>
                                </div>
                                <div class="form-group col-sm-12 col-md-8 col-lg-6">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control visitor-phone" name="visitor_phone[]" required="">
                                    <div class="invalid-feedback">Please enter your phone number</div>
                                </div>
                                <div class="container">
                                    <button class="btn btn-sm btn-secondary add-field"><i class="fas fa-plus"></i></button>
                                    <button class="btn btn-sm btn-secondary remove-field" style="display:none; margin-top:10px;"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                        </div>
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="visitor_email">
                          </div>
                          
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="visitor_type">Visitor Type</label>
                              <select name="visitor_type_id" class="form-control" required>
                                      <option value="" selected disabled>--SELECT VISITOR TYPE--</option>
                                          <?php

                                          $result = mysqli_query($conn,"SELECT * FROM visitor_type");
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
                              <input  type="text" class="form-control" name="organization" required="">
                              <div class="invalid-feedback">Please enter visitors address or o rganization</div>
                          </div> 
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="id">Ghana Card / Voters ID</label>
                              <input id="id" type="text" class="form-control" name="identification">
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
                      <button type="submit" name="teamCheckIn" class="btn btn-primary"><i class="fas fa-arrow-down mx-2"></i>Check In</button>
                      </div>
                  </form>
                  </div>
              </div>
            </div>

        </section>
      </div>
            
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const formContainer = document.getElementById('formContainer');
        const addButton = formContainer.querySelector('.add-field');
        
        addButton.addEventListener('click', function (event) {
            event.preventDefault();
            const row = formContainer.querySelector('.row');
            const clone = row.cloneNode(true);
            const addButton = clone.querySelector('.add-field');
            const removeButton = clone.querySelector('.remove-field');
            
            // Clear input values
            clone.querySelectorAll('input').forEach(input => input.value = '');
            
            // Show remove button and hide add button
            addButton.style.display = 'none';
            removeButton.style.display = 'inline-block';
            
            formContainer.appendChild(clone);
        });
        
        formContainer.addEventListener('click', function (event) {
            event.preventDefault();
            if (event.target.classList.contains('remove-field')) {
                event.target.closest('.row').remove();
            }
        });
    });
</script>
    <?php include '../includes/footer.php'?>
</body>



    