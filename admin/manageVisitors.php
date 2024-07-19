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
                <div class="card-header"><strong>Manage Visitors</strong></div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>VISITOR ID</th>
                          <th>NAME</th>
                          <th>EMAIL</th>
                          <th>PHONE</th>
                          <th>ADDRESS</th>
                          <th>ID</th>
                          <th>STATUS</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      <?php 
                      $visitorCheckout=$conn->query("SELECT * FROM visitors
                      LEFT JOIN status ON status.status_id=visitors.status_id
                      ORDER BY visitors.status_id ASC");
                      $checkout=$visitorCheckout->fetch_all(MYSQLI_ASSOC);

                      ?>
                      <tbody>
                        <?php $i=1; foreach ($checkout as $fetch): ?>
                          <tr>
                            
                            <td><?=$i++;?></td>
                            <td><?= $fetch['visitor_id']?></td>
                            <td><?= $fetch['full_name']?></td>
                            <td><?php if(empty($fetch['visitor_email'])){echo "<b class='text-danger'>Not Set</b>";}else{echo $fetch['visitor_email'];}?></td>
                            <td><?= $fetch['visitor_phone']?></td>
                            <td><?= $fetch['organization']?></td>
                            <td><?php if(empty($fetch['identification'])){echo "<b class='text-danger'>Not Set</b>";}else{echo $fetch['identification'];}?></td>
                            <td><?php if($fetch['status_id']==1){echo "<span  class='badge badge-success'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==4){echo "<span class='badge badge-danger'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==2){echo "<span class='badge badge-warning'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==7){echo "<span class='badge badge-warning'>".$fetch['status_name']."</span>";} ?></td>
                            <td><button class="btn btm-sm btn-primary" data-toggle="modal" data-backdrop="false" data-target="#manageVisitor<?=$fetch['visitor_id']?>"><i class="fas fa-edit"></i></button></td>
                          </tr>
                          <?php include 'modals/manageVisitorModal.php' ?>
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
    