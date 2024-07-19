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
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">Absentees Today (<?php echo date('Y-m-d');?>)</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>STAFF NAME</th>
                          <th>DEPARTMENT</th>
                          <th>POSITION - ROLE</th>
                      </thead>
                      <?php 
                      $date_today=date('Y-m-d');
                      $time_limit = strtotime('8:30 AM');
                      $absentStaffQuery = "SELECT tbl_staff.*, department.department_name, staff_role.staff_role_name
                      FROM tbl_staff
                      LEFT JOIN department ON tbl_staff.department_id = department.department_id
                      LEFT JOIN staff_role ON tbl_staff.staff_role_id = staff_role.staff_role_id
                      WHERE tbl_staff.staff_id NOT IN 
                            (SELECT staff_id FROM attendance WHERE DATE(at_created_at) = ?)";
                                            $stmt = $conn->prepare($absentStaffQuery);
                                            $stmt->bind_param("s", $date_today);
                                            $stmt->execute();
                                            $absentStaffResult = $stmt->get_result();

                                            // Fetch the absent staff data
                                            $absentStaff = $absentStaffResult->fetch_all(MYSQLI_ASSOC);

                      ?>
                      <tbody>
                        <?php $i=1; foreach ($absentStaff as $fetch): ?>
                          <tr>
                            
                            <td><?=$i++;?></td>
                            <td><?= $fetch['first_name']?> <?= $fetch['last_name']?></td>
                            <td><?= $fetch['department_name']?></td>
                            <td><?= $fetch['staff_role_name']?></td>
                            
                            
                          </tr>
                        <?php endforeach?>
                        
                      </tbody>
                    </table>
                </div>
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
    