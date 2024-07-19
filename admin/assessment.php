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
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Daily Assessments</h4>
								</div>
								<div class="card-body">
									<form method="post" action="php_action/assessment.php "  onsubmit="return validateForm()">
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Project Title</label>
											<div class="col-md-10">
												<input type="text" name="project_title" class="form-control">
											</div>
										</div>
                                        <div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Progress</label>
											<div class="col-md-4">
												<select class="form-control  form-select" name="status_id">
													<option>-- Select --</option>
                                                    <?php

$result = mysqli_query($conn,"SELECT * FROM status ORDER BY status_id DESC LIMIT 3"  );
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?=$row["status_id"];?>"><?= $row["status_name"];?></option>
<?php
}
?>
												</select>
											</div>
										
											<label class="col-form-label col-md-2">Date</label>
											<div class="col-md-4">
												<input type="date" class="form-control" name="date">
											</div>
										</div>
										
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">File Input</label>
											<div class="col-md-10">
												<input class="form-control" type="file" name="file_input">
											</div>
										</div>
										
									
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Remarks </label>
											<div class="col-md-10">
												<textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="remarks"></textarea>
											</div>
										</div>
										<div class="text-end">
											<button type="submit" name="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
							
						</div>
					</div>
				
        

        </section>
      </div>
            
        </div>
    </div>
</body>


<script>
	function validateForm() {
    var staff_id = document.getElementById('staff_id').value;
    var project_title = document.getElementById('project_title').value;
    var status_id = document.getElementById('status_id').value;
    var date = document.getElementById('date').value;
	var file_input = document.getElementById('file_input').value;

    var remarks = document.getElementById('remarks').value;


    if ( staff_id == "" || project_title == "" || status_id == "" || date == "" || remarks == "") {
        toastr.error("All fields are required");
        return false;
    }
    return true;
}

</script>


<?php include '../includes/footer.php'?>
    