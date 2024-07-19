<?php 
include '../includes/StaffSession.php'; 
include '../includes/head.php'; 
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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <strong>All Leave History</strong>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>STAFF NAME</th>
                                                <th>LEAVE TYPE</th>
                                                <th>LEAVE DATE</th>
                                                <th>RESUMING DATE</th>
                                                <th>STATUS</th>
                                                <!-- <th>ACTION</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "SELECT sl.*, ts.first_name, ts.last_name	
                                                FROM staff_leave as sl 
                                                LEFT JOIN tbl_staff as ts ON sl.staff_id=ts.staff_id
                                                LEFT JOIN status as s ON s.status_id=sl.staff_id                                       
                                                ORDER BY sl.leave_id DESC";
                                            
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $i = 1;
                                                while ($fetch = $result->fetch_assoc()) {
                                            ?> 
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $fetch['first_name'] ?> <?= $fetch['last_name'] ?></td>
                                                    <td><?= $fetch['leave_reason'] ?></td>
                                                    <td><?= date('d-m-Y', strtotime($fetch['start_date'])) ?></td>
                                                    <td><?= date('d-m-Y', strtotime($fetch['end_date'])) ?></td>
                                                    <td><?= $fetch['state'] ?></td>
                                                    <td>
                                                        <!-- Include your form elements here -->
                                                        <!-- Example: -->
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


        