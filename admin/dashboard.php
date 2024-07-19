<?php 
    include '../includes/AdminSession.php'; 
    include '../includes/head.php'; 
    include 'php_action/dashboard.php';
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
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Visitors</h5>
                          <h2 class="mb-3 font-18 badge badge-danger"><?php if(empty($counttotalVisitors)){echo "0";}else{echo $counttotalVisitors;} ?></h2>
                          
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
<<<<<<< HEAD
                          <img src="../assets/img/banner/32.png" alt="" >
=======
                          <img src="../assets/img/banner/32.png" alt="" width="140" height="140">
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Total Visits</h5>
                          <h2 class="mb-3 font-18 badge badge-danger"><?php if(empty($counttotalVisits)){echo "0";}else{echo $counttotalVisits;} ?></h2>
                          
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Staff</h5>
                          <h2 class="mb-3 font-18 badge badge-danger"><?php if(empty($counttotalstaff)){echo "0";}else{echo $counttotalstaff;} ?></h2>
                          
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
<<<<<<< HEAD
                          <img src="../assets/img/banner/4.png" alt="" >
=======
                          <img src="../assets/img/banner/4.png" alt="" width="140" height="140">
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Upcoming Appointments</h5>
                          <h2 class="mb-3 font-18 badge badge-danger"><?php if(empty($countupcomingAppointments)){echo "0";}else{echo $countupcomingAppointments;} ?></h2>
                          
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Staff Present</h6>
                        <span class="font-weight-bold mb-0 font-20"><a href="attendance.php" class="text-decoration-none text-dark font-weight-600"><?php if(empty($counttotalstaffPresent)){echo "0";}else{echo $counttotalstaffPresent;} ?></a></span>
                      </div>
                      <i class="fas fa-users card-icon col-green font-30 p-r-30 mb-5"></i>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Staff Absent</h6>
                        <span class="font-weight-bold mb-0 font-20"><a href="absentStaff.php" class="text-decoration-none text-dark font-weight-600"><?php if(empty($staffAbsent)){echo "0";}else{echo $staffAbsent;} ?></a></span>
                      </div>
                      <i class="fas fa-user-minus card-icon col-red font-30 p-r-30 mb-5"></i>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Staff On Time</h6>
                        <span class="font-weight-bold mb-0 font-20"><?php if(empty($counttotalstaffOnTime)){echo "0";}else{echo $counttotalstaffOnTime;} ?></span>
                      </div>
                      <i class="fas fa-stamp card-icon col-indigo font-30 p-r-30 mb-5"></i>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Late Today</h6>
                        <span class="font-weight-bold mb-0 font-20"><?php if(empty($counttotalstaffLate)){echo "0";}else{echo $counttotalstaffLate;} ?></span>
                      </div>
                      <i class="fas fa-user-clock card-icon col-red font-30 p-r-30 mb-5"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card ">
                <div class="card-header">
                  <h4>Visitor Summary - <?php echo date('D, d M, Y'); ?></h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row mb-0">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="user-check"
                                class="col-green"></i>
                              <h5 class="m-b-0 mt-2"><?php if(empty($counttotalvisitsToday)){echo "0";}else{echo $counttotalvisitsToday;} ?></h5>
                              <p class="text-muted font-14 m-b-0">Visitors Today</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-down-circle"
                                class="col-orange"></i>
                              <h5 class="m-b-0 mt-2"><?php if(empty($counttotaltotalCheckIn)){echo "0";}else{echo $counttotaltotalCheckIn;} ?></h5>
                              <p class="text-muted font-14 m-b-0">Total Checked In</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                class="col-red"></i>
                              <h5 class="mb-0 m-b-0 mt-2"><?php if(empty($counttotaltotalCheckOut)){echo "0";}else{echo $counttotaltotalCheckOut;} ?></h5>
                              <p class="text-muted font-14 m-b-0">Total Checked Out</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="users"
                                class="col-green"></i>
                              <h5 class="mb-0 m-b-0 mt-2"><?php if(empty($counttotalexpectedVisitors)){echo "0";}else{echo $counttotalexpectedVisitors;} ?></h5>
                              <p class="text-muted font-14 m-b-0">Expected Visitors</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
          <!-- upcoming Appointments -->
          <div class="row">
          <div class="col-md-6 col-lg-12 col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h4>My Attendance</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-3">
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
                              $staffAttendace=$conn->query("SELECT * FROM attendance
                              LEFT JOIN tbl_staff ON tbl_staff.staff_id=attendance.staff_id
                              LEFT JOIN department ON department.department_id=tbl_staff.department_id
                              LEFT JOIN staff_role ON staff_role.staff_role_id=tbl_staff.staff_role_id
                              WHERE attendance.staff_id='$staff_id' AND date(attendance.at_created_at)='$date_today'
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
                                      if (strtotime($fetch['time_in']) > $time_limit) {
                                          echo "<span class='badge badge-danger'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                      }elseif(strtotime($fetch['time_in']) >= $time_limit && strtotime($fetch['time_in']) <= strtotime('9:00 AM')) {
                                          echo "<span class='badge badge-warning'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                      } else {
                                          echo "<span class='badge badge-success'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                      }
                                    ?>
                                <td><?php if(empty(strtotime($fetch['time_out']))){echo "<b class='text-danger'>Not Set</b>";}else{echo date('g:i A', strtotime($fetch['time_out']));} ?></td>
                                <td><?= date('d-m-Y', strtotime($fetch['at_created_at'])); ?></td>
                                <td>
                                    <?php 
                                    if (empty(strtotime($fetch['time_out']))) {
                                        echo "<button class='btn btn-sm btn-primary' data-toggle='modal' data-backdrop='false' data-target='#editAttendance" . $fetch['attendance_id'] . "'><i class='fas fa-edit'></i></button>";
                                    } else {
                                        echo ""; // Empty string since no action is needed
                                    } 
                                    ?>
                                </td>
                              </tr>
                          <?php include 'modals/editAttendanceModal.php' ?>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>

          
          <div class="row">
              <div class="col-md-4 col-lg-4 col-xl-2">
                <div class="card">
                  <div class="card-header">Break Time</div>
                  <div class="card-body">
                    <form action="php_action/addBreaktime.php" method="post">
                      <input type="hidden" name="staff_id" value="<?= $staff_id?>">
                      <?php 
                          $todayDate = date("Y-m-d");

                          // Check if there's a break record for today for the specific staff member
                          $breakQuery = mysqli_query($conn, "SELECT * FROM break_records WHERE staff_id = '$staff_id' AND break_over!='' AND DATE(break_created_at) = '$todayDate'");
                          if(mysqli_num_rows($breakQuery) > 0) {
                              // If a record exists, echo "Already gone for break"
                              echo "Already gone for break";
                          } else {
                              // If no record exists, output the appropriate button based on staff's current status
                              $statusQuery = mysqli_query($conn, "SELECT status_id FROM tbl_staff WHERE staff_id = '$staff_id'");
                              $statusData = mysqli_fetch_assoc($statusQuery);
                              $status_id = $statusData['status_id'];

                              // Output the button based on the staff's current status
                              if($status_id == 3) {
                                  echo "<button type='submit' name='backFromBreak' class='btn btn-sm btn-danger'><i class='fas fa-bell mx-2'></i>Break Over</button>";
                              } else {
                                  echo "<button type='submit' name='goOnBreak' class='btn btn-sm btn-info'><i class='fas fa-bell mx-2'></i>Go On Break</button>";
                              }
                          }                     
                      ?>
                      
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-8 col-lg-8 col-xl-10">
              <div class="card">
                <div class="card-header">
                  Break Details
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>BREAK TIME</th>
                                    <th>BREAK OVER</th>
                                    <th>STATUS</th>
                                    <th>ZONE</th>
                                    <th>DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($break as $fetch): ?>
                              <tr>
                                <td><?= $i++;?></td>
                                <td><?= $fetch['first_name'];?> <?= $fetch['last_name'];?></td>
                                <td><?= date('g:i A', strtotime($fetch['break_time']))?></td>
                                <td><?php if(empty($fetch['break_over'])){echo "<span class='text-danger font-weight-600'>On Break</span>";}else{echo  date('g:i A', strtotime($fetch['break_over']));}?></td>
                                <td><?php if($fetch['status_id']==3){echo "<span  class='badge badge-danger'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==1){echo "<span class='badge badge-success'>".$fetch['status_name']."</span>";}?></td>
                                <td><?php 
                                $break_start=strtotime($fetch['break_time']);
                                $break_end=strtotime($fetch['break_over']);
                                
                                if($break_end- $break_start>=3600){echo "<span class='text-danger'>RED ZONE</span>";}else{echo "<span class='text-success'>GREEN ZONE</span>";} ?></td>
                                <td><?= date('d-m-Y', strtotime($fetch['break_created_at']))?></td>
                              </tr>
                              
                           <?php endforeach?>
                            </tbody>
                        </table> 
                      </div>
                </div>
              </div>
            </div>
            </div>
          <div class="row">
            <div class="col-md-6 col-lg-12 col-xl-6">
              <div class="card">
                <div class="card-header">
                  <h4>Upcoming Appointments</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Staff</th>
                                    <th>Visitor</th>
                                    <th>Exp. Check In</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($upcomingAppoints as $fetch): ?>
                              <tr>
                                <td><?=$i++;?></td>
                                <td><?= $fetch['first_name']?> <?= $fetch['last_name']?></td>
                                <td><?= $fetch['full_name']?></td>
                                <td><?= date('g:i A', strtotime($fetch['time_in']))?></td>
                                <td><?= $fetch['check_in_created_at'];?></td>
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
             <!-- Staff Availability -->
            <div class="col-md-6 col-lg-12 col-xl-6">
              <div class="card">
                <div class="card-header">
                  <h4>Staff Availability</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Staff</th>
                          <th>Department - Role</th>
                          <th>Availability</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; foreach ($staffAvailability as $fetch): ?>
                          <tr>
                            <td><?= $i++;?></td>
                            <td><?= $fetch['first_name'] ?> <?= $fetch['last_name'] ?></td>
                            <td><?= $fetch['department_name']?> - <?= $fetch['staff_role_name']?></td>
                            <td><?php if($fetch['status_id']==1){echo "<span  class='badge badge-success'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==2){echo "<span class='badge badge-danger'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==3){echo "<span class='badge badge-danger'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==6){echo "<span class='badge badge-warning'>".$fetch['status_name']."</span>";} ?></td>
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
    