<?php 
    include '../includes/StaffSession.php'; 
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
                include '../includes/staffSidebar.php';
            ?>
             <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Total Visitors</h6>
                        <span class="font-weight-bold mb-0 font-20"><?php if(empty($counttotalVisitors)){echo "0";}else{echo $counttotalVisitors;} ?></span>
                      </div>
                      <i class="fas fa-users card-icon col-red font-30 p-r-30 mb-5"></i>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Number of Visits</h6>
                        <span class="font-weight-bold mb-0 font-20"><?php if(empty($counttotalVisits)){echo "0";}else{echo $counttotalVisits;} ?></span>
                      </div>
                      <i class="fas fa-user-plus card-icon col-green font-30 p-r-30 mb-5"></i>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Approved Visits</h6>
                        <span class="font-weight-bold mb-0 font-20"><?php if(empty($counttotalstaff)){echo "0";}else{echo $counttotalstaff;} ?></span>
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
                        <h6 class="mb-0">Booked Visits</h6>
                        <span class="font-weight-bold mb-0 font-20"><?php if(empty($countupcomingAppointments)){echo "0";}else{echo $countupcomingAppointments;} ?></span>
                      </div>
                      <i class="fas fa-user-clock card-icon col-cyan font-30 p-r-30 mb-5"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<<<<<<< HEAD
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

=======
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
          <!-- upcoming Appointments -->
          <div class="row">
            <div class="col-md-6 col-lg-12 col-xl-6">
              <div class="card">
                <div class="card-header">
                  <h4>Upcoming Appointments</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <form action="php_action/approveVisit.php" method="POST">
                        <table class="table table-striped" id="table-2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Visitor</th>
                                    <th>Purpose</th>
                                    <th>Exp. Check In</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($upcomingAppoints as $fetch): ?>
                              <tr>
                                <input type="hidden" name="check_in_id" value="<?= $fetch['check_in_id']?>">
                                <td><?=$i++;?></td>
                                <td><?= $fetch['full_name']?></td>
                                <td><?= $fetch['purpose']?></td>
                                <td><?= date('g:i A', strtotime($fetch['time_in']))?></td>
                                <td><?= date('d-m-Y', strtotime($fetch['check_in_created_at']))?></td>
                                <td>
                                  <button type="submit" name="approveAppointment" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                  <button type="submit" name="declineAppointment" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                </td>
                           
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
                      </form>
                    </div>
                </div>
              </div>
              <!-- Calendar -->
            </div>
            <div class="col-md-6 col-lg-12 col-xl-6">
              <div class="card">
                <div class="card-header">
                  <h4>Calendar</h4>
                </div>
                <div class="card-body">
                  <div id="myEvent"></div>
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
    