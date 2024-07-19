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
                <div class="card-header"><strong>Transfer Visitors</strong></div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>STAFF NAME</th>
                          <th>DEPARTMENT</th>
                          <th>VISITOR NAME</th>
                          <th>PURPOSE</th>
                          <th>CONTACT</th>
                          <th>TIME IN</th>
                          <th>STATUS</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      <?php 
                      $visitorCheckout=$conn->query("SELECT * FROM check_in
<<<<<<< HEAD
                      LEFT JOIN visitors ON visitors.visitor_id = check_in.visitor_id
                      LEFT JOIN tbl_staff ON tbl_staff.staff_id = check_in.staff_id
                      LEFT JOIN status ON status.status_id = check_in.status_id
                      LEFT JOIN visitor_type ON visitor_type.visitor_type_id=visitors.visitor_type_id
                      LEFT JOIN department ON department.department_id=tbl_staff.department_id
                      LEFT JOIN (
                          SELECT team_id, MIN(visitor_id) AS lead_visitor_id
                          FROM tbl_team
                          GROUP BY team_id
                      ) AS team_lead ON check_in.team_id = team_lead.team_id
                      WHERE check_in.staff_id='$staff_id' AND check_in.status_id=4 AND (check_in.team_id IS NULL OR check_in.visitor_id = team_lead.lead_visitor_id )
                      ORDER BY check_in.check_in_id DESC");
=======
                      LEFT JOIN tbl_staff ON tbl_staff.staff_id=check_in.staff_id
                      LEFT JOIN visitors ON visitors.visitor_id=check_in.visitor_id
                      LEFT JOIN staff_role ON staff_role.staff_role_id=tbl_staff.staff_role_id
                      LEFT JOIN department ON department.department_id=tbl_staff.department_id
                      LEFT JOIN status ON status.status_id=check_in.status_id
                      WHERE check_in.staff_id='$staff_id' AND check_in.status_id=4");
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                      $checkout=$visitorCheckout->fetch_all(MYSQLI_ASSOC);

                      ?>
                      <tbody>
                        <?php $i=1; foreach ($checkout as $fetch): ?>
                          <tr>
                            
                            <td><?=$i++;?></td>
                            <td><?= $fetch['first_name']?> <?= $fetch['last_name']?></td>
                            <td><?= $fetch['department_name']?></td>
<<<<<<< HEAD
                            <td>
                                <?php 
                                    echo $fetch['full_name'];
                                    // Check if the visitor is part of a team
                                    if (!empty($fetch['team_id'])) {
                                        echo " <a href='javascript:void(0);'  class='team-toggler' data-team-id='{$fetch['team_id']}'><i class='fas fa-users text-success'></i></a>";
                                    }
                                ?>
                            </td>
=======
                            <td><?= $fetch['full_name']?></td>
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                            <td><?= $fetch['purpose']?></td>
                            <td><?= $fetch['visitor_phone']?></td>
                            <td><?= date('g:i A', strtotime($fetch['time_in']))?></td>
                            <td><?= $fetch['status_name']?></td>
                            <td><button class="btn btm-sm btn-success" data-toggle="modal" data-backdrop="false" data-target="#transfer<?=$fetch['check_in_id']?>"><i class="fas fa-save mx-2"></i></button></td>
                          </tr>
                          <?php include 'modals/transferVisitorModal.php' ?>
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
    