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
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">Attendance History </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>STAFF NAME</th>
                          <th>DEPARTMENT</th>
                          <th>POSITION - ROLE</th>
                          <th>TIME IN</th>
                          <th>TIME OUT</th>
                          <th>DATE</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      <?php 
                      $date_today=date('Y-m-d');
                      $time_limit = strtotime('8:30 AM');
                      $amber_time = strtotime('9:00 AM');
                      $staffAttendace=$conn->query("SELECT * FROM attendance
                      LEFT JOIN tbl_staff ON tbl_staff.staff_id=attendance.staff_id
                      LEFT JOIN department ON department.department_id=tbl_staff.department_id
                      LEFT JOIN staff_role ON staff_role.staff_role_id=tbl_staff.staff_role_id
                      WHERE attendance.staff_id='$staff_id'
                      ORDER BY date(attendance.at_created_at) DESC");
                      $attendance=$staffAttendace->fetch_all(MYSQLI_ASSOC);

                      ?>
                      <tbody>
                        <?php $i=1; foreach ($attendance as $fetch): ?>
                          <tr>
                            
                            <td><?=$i++;?></td>
                            <td><?= $fetch['first_name']?> <?= $fetch['last_name']?></td>
                            <td><?= $fetch['department_name']?></td>
                            <td><?= $fetch['staff_role_name']?></td>
                            <td><?php
                                  if (strtotime($fetch['time_in']) > $amber_time) {
                                      echo "<span class='badge badge-danger'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                  }elseif(strtotime($fetch['time_in']) >= $time_limit && strtotime($fetch['time_in']) <= $amber_time) {
                                    echo "<span class='badge badge-warning'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                } else {
                                      echo "<span class='badge badge-success'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                  }
                                ?>
                            <td><?php if(empty(strtotime($fetch['time_out']))){echo "<b class='text-danger'>Not Set</b>";}else{echo date('g:i A', strtotime($fetch['time_out']));} ?></td>
                            <td><?= date('d-m-Y', strtotime($fetch['at_created_at'])); ?></td>
                            <td>
                                <?php 
                                if (empty(strtotime($fetch['time_out'])) && date('Y-m-d', strtotime($fetch['at_created_at']))==$date_today) {
                                    echo "<button class='btn btn-sm btn-primary' data-toggle='modal' data-backdrop='false' data-target='#editAttendance" . $fetch['attendance_id'] . "'><i class='fas fa-edit'></i></button>";
                                } else {
                                    echo ""; // Empty string since no action is needed
                                } 
                                ?>
                            </td>
                          </tr>
                          <?php include 'modals/editAttendanceModal.php' ?>
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
    