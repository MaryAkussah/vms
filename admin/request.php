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
                <div class="card-header"><strong>Request History</strong></div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>STAFF NAME</th>
                          <th>REQUEST</th>
                          <th>REQUEST DATE</th>
                          <th>STATUS</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      <?php 
                      $requestHistory=$conn->query("SELECT * FROM department_approvals 
                      LEFT JOIN requests ON requests.request_id=department_approvals.request_id
                      LEFT JOIN request_status ON request_status.request_status_id=requests.request_status_id
                      LEFT JOIN tbl_staff ON tbl_staff.staff_id=requests.staff_id
                      WHERE tbl_staff.department_id='$department_id' AND department_approvals.staff_id='$staff_id'
                      ORDER BY department_approvals.request_status_id ASC");
                      $requests=$requestHistory->fetch_all(MYSQLI_ASSOC);

                      ?>
                      <tbody>
                        <?php $i=1; foreach ($requests as $fetch): ?>
                          <tr>
                            
                            <td><?=$i++;?></td>
                            <td><?= $fetch['first_name']?> <?= $fetch['last_name']?></td>
                            <td><?= $fetch['description']?></td>
                            <td><?= date('d-m-Y', strtotime($fetch['request_created_at']))?></td>
                            <td><?php if($fetch['request_status_id']==1){echo "<span  class='badge badge-danger'>".$fetch['request_status_name']."</span>";}elseif($fetch['request_status_id']==2){echo "<span class='badge badge-warning'>".$fetch['request_status_name']."</span>";}elseif($fetch['request_status_id']==3){echo "<span class='badge badge-warning'>".$fetch['request_status_name']."</span>";} elseif($fetch['request_status_id']==4){echo "<span class='badge badge-success'>".$fetch['request_status_name']."</span>";}elseif($fetch['request_status_id']==5){echo "<span class='badge badge-danger'>".$fetch['request_status_name']."</span>";}elseif($fetch['request_status_id']==6){echo "<span class='badge badge-danger'>".$fetch['request_status_name']."</span>";}elseif($fetch['request_status_id']==7){echo "<span class='badge badge-danger'>".$fetch['request_status_name']."</span>";}?></td>
                            <td><button class="btn btm-sm btn-primary" data-toggle="modal" data-backdrop="false" data-target="#editRequest<?=$fetch['request_id']?>"><i class="fas fa-edit"></i></button>
                            <button class="btn btm-sm btn-danger" data-toggle="modal" data-backdrop="false" data-target="#declineRequest<?=$fetch['request_id']?>"><i class="fas fa-trash"></i></button></td>
                          </tr>
                        <?php include 'modals/editRequestModal.php' ?>
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
    