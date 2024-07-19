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
                include '../includes/StaffSidebar.php';
            ?>
             <!-- Main Content -->
      <div class="main-content">
        <section class="section">
         
    
							<div class="card mb-0">
								<div class="card-header">
								</div>
								<div class="card-body">
									
              <form  method="post" action="php_action/leave.php "  onsubmit="return validateForm()">
											<div class="col-xl-12">
                      <h2  class="text-center">Leave Form  </h4>

												<h5 class="card-title">Personal details</h4>
												<div class="row">
													<label class="col-lg-3 col-form-label">Name</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-6">
																<div class="input-block mb-3">
                                  <input type="hidden" name="staff_id" value="<?= $staff_id?>">
																	<input type="text" placeholder="First Name" class="form-control" value="<?= $first_name?>" readonly>
																</div>
															</div>
															<div class="col-md-6">
																<div class="input-block mb-3">
																	<input type="text" placeholder="Last Name" class="form-control" value="<?= $last_name?>" readonly>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="input-block mb-3 row">
													<label class="col-lg-3 col-form-label" required>Email</label>
													<div class="col-lg-9">
                          <input type="text" placeholder="Email" class="form-control" value="<?= $staff_email?>" readonly>
													</div>
												</div>
												<div class="input-block mb-3 row">
													<label class="col-lg-3 col-form-label" required>Phone</label>
													<div class="col-lg-9">
                          <input type="text" placeholder="Phone" class="form-control" value="<?= $staff_phone?>" readonly>
													</div>
												</div>

                        <div class="input-block mb-3 row">
													<label class="col-lg-3 col-form-label" required>Position</label>
													<div class="col-lg-3">
                          <input type="text" placeholder="Position" class="form-control" value="<?= $staff_role_name?>" readonly>
													</div>
												
													<label class="col-lg-3 col-form-label" required>Employee No.</label>
													<div class="col-lg-3">
                          <input type="text" placeholder="Employee No." class="form-control" name="staff_id" value="<?= $staff_id?>" readonly>
													</div>
												</div>

												<?php 
$department_head = mysqli_query($conn, "SELECT * FROM tbl_staff WHERE app_role=1 AND department_id='$department_id'");
if ($department_head->num_rows === 1) {
    $depHeadData = $department_head->fetch_assoc();
    $headId = $depHeadData['staff_id'];
    $headName = $depHeadData['first_name'] . ' ' . $depHeadData['last_name'];
} else {
    // Handle the case where no department head is found (e.g., set $headName to a default value or display a message)
    $headName = 'No Department Head Found';
}

// Categorize users under their supervisors based on department and role
if ($department_id == 2) {
    if ($app_role == 1) {
        // Supervisor for Business
        $supervisor = $headName;
    } elseif ($app_role == 0) {
        // Member for Business
        $supervisor = "Business Team";
    }
} elseif ($department_id == 1) {
    if ($app_role == 1) {
        // Supervisor for IT
        $supervisor = $headName;
    } elseif ($app_role == 0) {
        // Member for IT
        $supervisor = "IT Team";
    }
} elseif ($department_id == 4) {
    if ($app_role == 1) {
        // Supervisor for Training
        $supervisor = $headName;
    } elseif ($app_role == 0) {
        // Member for Training
        $supervisor = "Training Team";
    }
} elseif ($department_id == 3) {
    if ($app_role == 1) {
        // Supervisor for Corporate
        $supervisor = $headName;
    } elseif ($app_role == 0) {
        // Member for Corporate
        $supervisor = "Corporate Team";
    }
} elseif ($department_id == 5) {
    if ($app_role == 1) {
        // Supervisor for Client
        $supervisor = $headName;
    } elseif ($app_role == 0) {
        // Member for Client
        $supervisor = "Client Team";
    }
} elseif ($department_id == 6) {
    if ($app_role == 1) {
        // Supervisor for Office
        $supervisor = $headName;
    } elseif ($app_role == 0) {
        // Member for Office
        $supervisor = "Office Team";
    }
} elseif ($department_id == 7) {
    if ($app_role == 1) {
        // Supervisor for HR
        $supervisor = $headName;
    } elseif ($app_role == 0 or 3) {
        // Member for HR
        $supervisor = "HR Team";
    }
} elseif ($department_id == 0) {
    if ($app_role == 3) {
        // Supervisor for Management
        $supervisor = $headName;
    } elseif ($app_role == 7) {
        // Member for Management
        $supervisor = "Management Team";
    }
} else {
    // Handle cases where department_id doesn't match any condition
    $supervisor = "Unknown";
}
?>

<h6 class="card-title">Supervisor</h6>
												<div class="row">
													<label class="col-lg-3 col-form-label">Name</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-6">
																<div class="input-block mb-3">
																	<input type="text" placeholder="First Name" value="<?= $depHeadData['first_name']?>" readonly class="form-control" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="input-block mb-3">
																	<input type="text" placeholder="Last Name" value="<?= $depHeadData['last_name']?>" readonly class="form-control" required>
                                  <input type="hidden" name="supervisor_id" value="<?= $headId?>"  class="form-control" required>
																</div>
															</div>
														</div>
													</div>
												</div>

                        <h6 class="card-title">Details of Leave/Absence </h6>
						<div>
							<p>Leave Days Left: <span class="badge badge-sm badge-primary"><?=$leave_days?></span></p>
						</div>
												<div class="row">
													<label class="col-lg-3 col-form-label">Start Date </label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-6">
																<div class="input-block mb-3">
																	<input type="date" placeholder="Date" name="start_date" class="form-control" >
																</div>
															</div>
														
														</div>
													</div>
												</div>

                        <div class="row">
													<label class="col-lg-3 col-form-label">End Date </label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-6">
																<div class="input-block mb-3">
																	<input type="date" placeholder="Date" name="end_date" class="form-control" >
																</div>
															</div>
															
														</div>
													</div>
												</div>
                        
                        
                        <h6 class="card-title">Reasons for Absence</h6>


															<div class="col-md-12">
                              <div class="input-block mb-3">
																	<select class="form-control"  name="leave_reason" >
																		<option value="Sick Leave">Sick Leave </option>
																		<option value="Annual Leave">Annual Leave </option>
																		<option value="Maternity Leave ">Maternity Leave </option>
																		<option value="Paternity Leave">Paternity Leave </option>
                                    <option value="Personal Time Off">Personal Time Off </option>

                                    <option value="6">Bereavement Leave </option>

																	</select>
																</div>
														</div><br>

                          <h6 class="card-title">Additional Comments </h6>
												<div class="row">
												<div class="col-lg-6">
														<textarea rows="4" name="leave_comment" cols="5" class="form-control" placeholder="Enter message"></textarea>
													</div>
													
										
											<label class="col-form-label col-md-2">File Input</label>
											<div class="col-md-4">
												<input class="form-control" name="attachment" type="file">
											</div>
										</div>
                    <br><br>
										<div class="text-end">
											<button type="submit" name="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

      
		
        </div>


        </section>
      </div>
            
        </div>
    </div>
</body>

<script>
        function validateForm() {
            var staff_id = document.getElementById('staff_id').value;
            var supervisor_id = document.getElementById('supervisor_id').value;
            var start_date = document.getElementById('start_date').value;
            var end_date = document.getElementById('end_date').value;
            var leave_reason = document.getElementById('leave_reason').value;
            var created_at = document.getElementById('created_at').value;

            if (staff_id === "" || supervisor_id === "" || start_date === "" || end_date === "" || leave_reason === "" || created_at === "") {
                alert("All fields are required");
                return false;
            }

            alert('Leave form submitted successfully!');
            return true; // Allow form submission to proceed
        }
    </script>

<?php include '../includes/footer.php'?>
    