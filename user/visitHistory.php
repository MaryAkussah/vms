<?php 
    include '../includes/UserSession.php'; 
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
                include '../includes/userSidebar.php';
            ?>
             <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header"><strong>Visit History</strong></div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>VISITOR NAME</th>
                          <th>STAFF NAME</th>
                          <th>PURPOSE</th>
                          <th>VISIT DATE</th>
                          <th>TIME IN</th>
                          <th>TIME OUT</th>
                          <th>STATUS</th>
                        </tr>
                      </thead>
                      <?php 
                      $visitHistory=$conn->query("SELECT * FROM check_in
                      LEFT JOIN visitors ON visitors.visitor_id=check_in.visitor_id
                      LEFT JOIN tbl_staff ON tbl_staff.staff_id=check_in.staff_id
                      LEFT JOIN status ON status.status_id=check_in.status_id
                      WHERE check_in.visitor_id='$visitor_id'
                      ORDER BY check_in_id DESC ");
                      $visits=$visitHistory->fetch_all(MYSQLI_ASSOC);

                      ?>
                      <tbody>
                        <?php $i=1; foreach ($visits as $fetch): ?>
                          <tr>
                            
                            <td><?=$i++;?></td>
                            <td><?= $fetch['full_name']?></td>
                            <td><?= $fetch['first_name']?></td>
                            <td><?= $fetch['purpose']?></td>
                            <td><?= $fetch['date_in']?></td>
                            <td><?= date('g:i A', strtotime($fetch['time_in']))?></td>
                            <td><?php if(empty($fetch['time_out'])){echo "<strong class='text-danger'><i>Not Set</i></strong>";}else{echo date('g:i A', strtotime($fetch['time_out']));}?></td>
                            <td><?php if($fetch['status_id']==4){echo "<span  class='badge badge-danger'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==5){echo "<span class='badge badge-success'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==6){echo "<span class='badge badge-warning'>".$fetch['status_name']."</span>";} elseif($fetch['status_id']==7){echo "<span class='badge badge-warning'>".$fetch['status_name']."</span>";}?></td>
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
    