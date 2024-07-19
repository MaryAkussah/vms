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
                <div class="card-header"><strong>Manage Staff</strong></div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>FULL NAME</th>
                          <th>EMAIL</th>
                          <th>PHONE</th>
                          <th>DEPARTMENT</th>
                          <th>ROLE</th>
                          <th>STATUS</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      <?php 
                      $manageStaff=$conn->query("SELECT * FROM tbl_staff
                      LEFT JOIN department ON department.department_id=tbl_staff.department_id
                      LEFT JOIN staff_role ON staff_role.staff_role_id=tbl_staff.staff_role_id
                      LEFT JOIN status ON status.status_id=tbl_staff.status_id");
                      $staff=$manageStaff->fetch_all(MYSQLI_ASSOC);

                      ?>
                      <tbody>
                        <?php $i=1; foreach ($staff as $fetch): ?>
                          <tr>
                            
                            <td><?=$i++;?></td>
                            <td><?= $fetch['first_name']?> <?= $fetch['last_name']?></td>
                            <td><?= $fetch['staff_email']?></td>
                            <td><?= $fetch['staff_phone']?></td>
                            <td><?= $fetch['department_name']?></td>
                            <td><?= $fetch['staff_role_name']?></td>
                            <td><?php if($fetch['status_id']==1){echo "<span  class='badge badge-success'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==2){echo "<span class='badge badge-danger'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==6){echo "<span class='badge badge-warning'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==3){echo "<span class='badge badge-danger'>".$fetch['status_name']."</span>";} ?></td>
                            <td><button class="btn btm-sm btn-primary" data-toggle="modal" data-backdrop="false" data-target="#manageStaff<?=$fetch['staff_id']?>"><i class="fas fa-edit"></i></button></td>
                          </tr>
                          <?php include 'modals/manageStaffModal.php' ?>
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
    