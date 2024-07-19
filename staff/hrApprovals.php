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
                                                    <th>DEPT. HEAD REMARKS</th>
                                                    <th>STATUS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                              $hr_id = mysqli_real_escape_string($conn, $_POST['hr_id']);

                                              $leaveApproval = $conn->query("SELECT * FROM hr_approvals
                                                  LEFT JOIN staff_leave ON staff_leave.leave_id = hr_approvals.leave_id
                                                  LEFT JOIN tbl_staff ON tbl_staff.staff_id = staff_leave.staff_id
                                                  LEFT JOIN status ON status.status_id = hr_approvals.status_id
                                                  WHERE hr_approvals.hr_id = '$hr_id' 
                                                  AND tbl_staff.department_id = hr_approvals.department_id 
                                                  AND DATE(hr_approvals.created_at) = CURDATE() ORDER BY hr_approvals.id DESC");
                                              
                                                $requestsHR = $requestHistoryHR->fetch_all(MYSQLI_ASSOC);

                                             
                                            ?>
                                            <tbody>
                                            <?php $i=1; foreach ($leave as $fetch): ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?= $fetch['first_name']?> <?= $fetch['last_name']?></td>
                                                    <td><?= $fetch['leave_reason']?></td>
                                                    <td><?= date('d-m-Y', strtotime($fetch['start_date']))?></td>
                                                    <td><?= date('d-m-Y', strtotime($fetch['end_date']))?></td>
                                                    <td><?= date('d-m-Y ')?></td>
                                                    <td><?= $fetch['status_id']?></td>
                                                    <td>
                                                 
                                                            <button class="btn btm-sm btn-primary" data-toggle="modal" data-backdrop="false" data-target="#editRequest<?=$fetchHR['request_id']?>"><i class="fas fa-edit"></i></button>
                                                            <button class="btn btm-sm btn-danger" data-toggle="modal" data-backdrop="false" data-target="#declineRequest<?=$fetchHR['request_id']?>"><i class="fas fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php include 'modals/editRequestModal.php';?>
                                                <?php endforeach ?>
                                                <?php foreach ($requestsCOO as $fetchCOO): ?>
                                                    <tr>
                                                        <!-- COO Approval details -->
                                                    </tr>
                                                    <?php include 'modals/editRequestModal.php';?>
                                                <?php endforeach ?>
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
