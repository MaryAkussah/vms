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
                <div class="card-header">Attendance Today (<?php echo date('Y-m-d');?>)</div>
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
<<<<<<< HEAD
                          <th>TIME OUT</th>
                          <th>DATE</th>
=======
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                        </tr>
                      </thead>
                      <?php 
                      $date_today=date('Y-m-d');
                      $time_limit = strtotime('8:30 AM');
<<<<<<< HEAD
                      $time_limit_str = date('H:i:s', $time_limit);
                      $amber_time = strtotime('9:00 AM');
                      $amber_time_str = date('H:i:s', $amber_time);
                      $closing_time = strtotime('4:30 PM');
=======
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                      $staffAttendace=$conn->query("SELECT * FROM attendance
                      LEFT JOIN tbl_staff ON tbl_staff.staff_id=attendance.staff_id
                      LEFT JOIN department ON department.department_id=tbl_staff.department_id
                      LEFT JOIN staff_role ON staff_role.staff_role_id=tbl_staff.staff_role_id
                      WHERE date(attendance.at_created_at)='$date_today'
                      ORDER BY time(attendance.time_in) DESC");
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
<<<<<<< HEAD
                                  if (strtotime($fetch['time_in']) > $amber_time) {
                                      echo "<span class='badge badge-danger'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                  }elseif(strtotime($fetch['time_in']) >= $time_limit && strtotime($fetch['time_in']) <= $amber_time) {
                                    echo "<span class='badge badge-warning'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                } else {
=======
                                  if (strtotime($fetch['time_in']) > $time_limit) {
                                      echo "<span class='badge badge-danger'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                  } else {
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                                      echo "<span class='badge badge-success'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                  }
                                ?>
                            </td>
<<<<<<< HEAD
                            <td><?php
                                  if (strtotime($fetch['time_out']) > $closing_time) {
                                      echo "<span class='badge badge-success'>" . date('g:i A', strtotime($fetch['time_out'])) . "</span>";
                                  }elseif(empty(strtotime($fetch['time_out']))){
                                    echo "<b class='text-danger'>Not Set</b>";

                                  } else {
                                      echo "<span class='badge badge-danger'>" . date('g:i A', strtotime($fetch['time_out'])) . "</span>";
                                  }
                                ?>
                            </td>
                            <td><?php echo date('d-m-Y', strtotime($fetch['at_created_at']));?></td>
=======
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                            
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
    