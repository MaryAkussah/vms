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
                <div class="card-header">Visitor Checkout</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>STAFF NAME</th>
                          <th>DEPARTMENT</th>
                          <th>VISITOR NAME</th>
                          <th>VISITOR TYPE</th>
                          <th>CONTACT</th>
                          <th>PURPOSE</th>
                          <th>TIME IN</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      <?php 
                      $visitorCheckout=$conn->query("SELECT * FROM check_in
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
                      WHERE check_in.status_id=4 AND (check_in.team_id IS NULL OR check_in.visitor_id = team_lead.lead_visitor_id )
                      ORDER BY check_in.check_in_id DESC");
                      $checkout=$visitorCheckout->fetch_all(MYSQLI_ASSOC);

                      ?>
                      <tbody>
                        <?php $i=1; foreach ($checkout as $fetch): ?>
                          <tr>
                            
                            <td><?=$i++;?></td>
                            <td><?= $fetch['first_name']?> <?= $fetch['last_name']?></td>
                            <td><?= $fetch['department_name']?></td>
                            <td><?php 
                                    echo $fetch['full_name'];
                                    // Check if the visitor is part of a team
                                    if (!empty($fetch['team_id'])) {
                                        echo " <a href='javascript:void(0);'  class='team-toggler' data-team-id='{$fetch['team_id']}'><i class='fas fa-users text-success'></i></a>";
                                    }
                                ?>
                            </td>
                            <td><?= $fetch['visitor_type_name']?></td>
                            <td><?= $fetch['visitor_phone']?></td>
                            <td><?= $fetch['purpose']?></td>
                            <td><?= date('g:i A', strtotime($fetch['time_in']))?></td>
                            <td><button class="btn btm-sm btn-success" data-toggle="modal" data-backdrop="false" data-target="#checkout<?=$fetch['check_in_id']?>"><i class="fas fa-save mx-2"></i></button></td>
                          </tr>
                          <?php include 'modals/checkoutModal.php' ?>
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
    