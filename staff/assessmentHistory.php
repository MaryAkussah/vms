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
                <div class="card-header"><strong> Assessment History</strong></div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>STAFF NAME</th>
                          <th> PROJECT TITLE</th>
                          <th> REMARKS</th>
                          <th> PROGRESS</th>
                          <th> DATE</th>
                          <th>STATUS</th>

                        </tr>
                      </thead>
                      <?php 

                                                $staff_id = $_SESSION['staff_id']; // Assuming staff_id is stored in session
                                                $sql = "SELECT sa.*, ts.first_name, ts.last_name	
                                                FROM staff_assessment as sa 
                                                LEFT JOIN tbl_staff as ts ON sa.staff_id=ts.staff_id
                                                LEFT JOIN status as s ON s.status_id=sa.staff_id
                                                WHERE sa.staff_id = '$staff_id'
                                                ORDER BY sa.assessment_id DESC";
                                            
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $i = 1;
                                                while ($fetch = $result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $fetch['first_name'] ?> <?= $fetch['last_name'] ?></td>
                                                    <td><?= $fetch['project_title'] ?></td>
                                                    <td><?= $fetch['remarks'] ?></td>
                                                    <td><?= $fetch['progress'] ?></td>
                                                    <td><?= date('d-m-Y', strtotime($fetch['date'])) ?></td>
                                                    <td><?= $fetch['state'] ?></td>
                                                    <td>                                                   
                                                    </td>
                                                </tr>
                                                <!-- Include your modal files here -->
                                                <!-- Example: -->
                                            <?php 
                                                }
                                            } else {
                                                echo "<tr><td colspan='8'>No leave requests found.</td></tr>";
                                            }
                                            ?>
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
    