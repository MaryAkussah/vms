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
              <div class="col-12 col-md-6 col-lg-8">
                  <div class="card">
                    <div class="card-header">Attendance Report</div>
                    <div class="card-body">
                    <form action="getAttendanceReport.php" method="POST">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">Start Date <span><strong class="text-danger">*</strong></span></label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">End Date<span><strong class="text-danger">*</strong></span></label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">Status</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="status_id" placeholder="Select Status">
                                                        <option value="" selected disabled>--SELECT STATUS</option>
                                                            <?php

                                                                $result = mysqli_query($conn,"SELECT * FROM status ORDER BY status_id DESC limit 2");
                                                                while($row = mysqli_fetch_array($result)) {
                                                                ?>
                                                                <option value="<?=$row["status_id"];?>"><?= $row["status_name"];?></option>
                                                                <?php
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">Staff</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control select2" name="staff_id" placeholder="Select Staff">
                                                        <option value="" selected disabled>--SELECT Staff--</option>
                                                        <?php

                                                            $result = mysqli_query($conn,"SELECT * FROM tbl_staff");
                                                            while($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?=$row["staff_id"];?>"><?= $row["first_name"];?> <?= $row["last_name"];?></option>
                                                            <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
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
    