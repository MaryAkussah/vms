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
              <div class="col-12 col-md-6 col-lg-8">
                  <div class="card">
                    <div class="card-header">Visitors Report</div>
                    <div class="card-body">
                    <form action="getVisitorsReport.php" method="POST">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">Start Date <span><strong class="text-danger">*</strong></span></label>
                                                <div class="col-sm-4 col-lg-6">
                                                    <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">End Date<span><strong class="text-danger">*</strong></span></label>
                                                <div class="col-sm-4 col-lg-6">
                                                    <input type="date" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="staff_id" value="<?=$staff_id?>">
                                        <div class="text-center col-sm-6">
                                            <button type="submit"  name="generateReport" class="btn btn-primary btn-sm my-3"><i class="fas fa-file-export px-1"></i>Generate Report</button>
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


<?php include '../includes/footer.php'?>
    