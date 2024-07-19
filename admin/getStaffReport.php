<?php 
    include '../includes/AdminSession.php'; 
    include '../includes/head.php';

    if (isset($_POST['generateReport'])) {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $query = "SELECT * FROM check_in
        LEFT JOIN tbl_staff ON tbl_staff.staff_id=check_in.staff_id
        LEFT JOIN department ON department.department_id=tbl_staff.department_id
        LEFT JOIN staff_role ON staff_role.staff_role_id=tbl_staff.staff_role_id
        LEFT JOIN visitors ON visitors.visitor_id=check_in.visitor_id
                    WHERE check_in.check_in_created_at >= ? 
                    AND check_in.check_in_created_at <= ?";
    
        $params = array($startDate, $endDate);
    
        // Check if optional fields are set and add them to the query and parameters.
        if (isset($_POST['staff_id']) && $_POST['staff_id'] !== '') {
            $query .= " AND check_in.staff_id = ?";
            $params[] = $_POST['staff_id'];
        }
    
        if (isset($_POST['status_id']) && $_POST['status_id'] !== '') {
            $query .= " AND check_in.status_id = ?";
            $params[] = $_POST['status_id'];
        }
        
        if (isset($_POST['department_id']) && $_POST['department_id'] !== '') {
            $query .= " AND tbl_staff.department_id = ?";
            $params[] = $_POST['department_id'];
        }
    
        // Prepare and execute the SQL query with optional parameters.
        $stmt = $conn->prepare($query);
    
        // Bind parameters to the prepared statement.
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    
        // Execute the query.
        $stmt->execute();
    
        // Get the results.
        $result = $stmt->get_result();
    
        // Fetch the results in a way that works without get_result()
        $staffVisitor = array();
        while ($row = $result->fetch_assoc()) {
            $staffVisitor[] = $row;
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
                            <h4 class="">Staff Report (<?php echo $startDate ?> : <?php echo $endDate ?>)</h4>
                                </div>
                                <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>STAFF NAME</th>
                                            <th>DEPARTMENT</th>
                                            <th>VISITOR NAME</th>
                                            <th>CONTACT</th>
                                            <th>PURPOSE</th>
                                            <th>TIME IN</th>
                                            <th>TIME OUT</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach ($staffVisitor as $fetch):
                                        $time_limit = strtotime('8:30 AM'); ?>
                                        <tr>
                                            
                                            <td><?=$i++;?></td>
                                            <td><?= $fetch['first_name']?> <?= $fetch['last_name']?></td>
                                            <td><?= $fetch['department_name']?>-<?= $fetch['staff_role_name']?></td>
                                            <td><?= $fetch['full_name']?></td>
                                            <td><?= $fetch['visitor_phone']?></td>
                                            <td><?= $fetch['purpose']?></td>
                                            <td><?=  date('g:i A', strtotime($fetch['time_in']))?></td>
                                            <td><?= date('g:i A', strtotime($fetch['time_out']))?></td>
                                            <td><?php echo date('d-m-Y', strtotime($fetch['date_in'])); ?></td>
                                            
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