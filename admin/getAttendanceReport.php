<?php 
    include '../includes/AdminSession.php'; 
    include '../includes/head.php';

    if (isset($_POST['generateReport'])) {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $query = "SELECT * FROM attendance
        LEFT JOIN tbl_staff ON tbl_staff.staff_id=attendance.staff_id
        LEFT JOIN department ON department.department_id=tbl_staff.department_id
        LEFT JOIN staff_role ON staff_role.staff_role_id=tbl_staff.staff_role_id
        
                    WHERE attendance.at_created_at >= ? 
                    AND attendance.at_created_at <= ?";
    
        $params = array($startDate, $endDate);
    
        // Check if optional fields are set and add them to the query and parameters.
        if (isset($_POST['staff_id']) && $_POST['staff_id'] !== '') {
            $query .= " AND attendance.staff_id = ?";
            $params[] = $_POST['staff_id'];
        }
    
        if (isset($_POST['status_id']) && $_POST['status_id'] !== '') {
            $query .= " AND attendance.status_id = ?";
            $params[] = $_POST['status_id'];
        }

        $query .= " ORDER BY attendance.at_created_at DESC";
    
        // Prepare and execute the SQL query with optional parameters.
        $stmt = $conn->prepare($query);
    
        // Bind parameters to the prepared statement.
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    
        // Execute the query.
        $stmt->execute();
    
        // Get the results.
        $result = $stmt->get_result();
    
        // Fetch the results in a way that works without get_result()
        $attendance = array();
        while ($row = $result->fetch_assoc()) {
            $attendance[] = $row;
        }
    }
    
?>

<body class="layout-4">
<!-- Page Loader -->
<div class="page-loader-wrapper">
  <span class="loader"><span class="loader-inner"></span></span>
</div>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
          <?php 
              include '../includes/header.php';
              include '../includes/sidebar.php';
          ?>
           <!-- Start app main Content -->
           <div class="main-content">
            <section class="section">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="">Datewise Attendance Report (<?php echo $startDate ?> : <?php echo $endDate ?>)</h4>
                                </div>
                                <div class="card-body">

                                    <div class="dropdown d-inline">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-download mx-1"></i>EXPORT</button>
                                        <div class="dropdown-menu">
                                            <form action="php_action/exportAttendance.php" method="POST">
                                                <input type="hidden" name="startDate" value="<?php echo $startDate;?>">
                                                <input type="hidden" name="endDate" value="<?php echo $endDate;?>">
                                                <input type="hidden" name="status_id" value="<?php echo isset($_POST['status_id']) ? $_POST['status_id'] : '';?>">
                                                <input type="hidden" name="staff_id" value="<?php echo isset($_POST['staff_id']) ? $_POST['staff_id'] : ''?>">
                                                <a href="" class="dropdown-item has-icon"><button type="submit" class="btn btn-sm btn-success text-light" name="exportAttendance"><i class="fas fa-file-csv px-1"></i>Export CSV</button></a>
                                            </form>
                                        </div>
                                    </div>
                                

                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>STAFF NAME</th>
                                            <th>DEPARTMENT</th>
                                            <th>POSITION - ROLE</th>
                                            <th>TIME IN</th>
                                            <th>TIME OUT</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach ($attendance as $fetch):
                                        $time_limit = strtotime('8:30 AM');
                                        $amber_time = strtotime('9:00 AM'); ?>
                                        <tr>
                                            
                                            <td><?=$i++;?></td>
                                            <td><?= $fetch['first_name']?> <?= $fetch['last_name']?></td>
                                            <td><?= $fetch['department_name']?></td>
                                            <td><?= $fetch['staff_role_name']?></td>
                                            <td><?php
                                                    if (strtotime($fetch['time_in']) > $time_limit) {
                                                        echo "<span class='badge badge-danger'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                                    }elseif(strtotime($fetch['time_in']) >= $time_limit && strtotime($fetch['time_in']) <= $amber_time) {
                                                        echo "<span class='badge badge-warning'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                                    } else {
                                                        echo "<span class='badge badge-success'>" . date('g:i A', strtotime($fetch['time_in'])) . "</span>";
                                                    }
                                                ?>
                                                </td>
                                                <td><?php
                                                
                                                    $date_today=date('Y-m-d');
                                                    $time_limit = strtotime('8:30 AM');
                                                    $amber_time = strtotime('9:00 AM');
                                                    $closing_time = strtotime('4:30 PM');
                                                    
                                                    if (strtotime($fetch['time_out']) > $closing_time) {
                                                        echo "<span class='badge badge-success'>" . date('g:i A', strtotime($fetch['time_out'])) . "</span>";
                                                    }elseif(empty(strtotime($fetch['time_out']))){
                                                        echo "<b class='text-danger'>Not Set</b>";

                                                    } else {
                                                        echo "<span class='badge badge-danger'>" . date('g:i A', strtotime($fetch['time_out'])) . "</span>";
                                                    }
                                                    ?>
                                                </td>
                                                 <td><?php echo date('d-m-Y', strtotime($fetch['at_created_at'])); ?></td>
                                            
                                        </tr>
                                           
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                        
                            </div>
                        </div>  
                    </div>
            </div>
            </section>
            </div>
            
            </div>
        </div>
    </body>
<?php include '../includes/footer.php'; ?>