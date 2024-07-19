<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="dashboard.php"> <img alt="image" src="../assets/img/wgg.png" class="header-logo" /> <span
                class="logo-name">wgghana</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
<<<<<<< HEAD
           

            <li class="menu-header">PORTAL</li>
=======
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
            <li class="dropdown">
              <a href="attendance.php" class="nav-link"><i data-feather="monitor"></i><span>My Attendance</span></a>
            </li>

<<<<<<< HEAD
            <li class="dropdown">
              <a href="assessment.php" class="nav-link"><i data-feather="monitor"></i><span>Assessment</span></a>
            </li>

            <li class="dropdown">
              <a href="leave.php" class="nav-link"><i data-feather="monitor"></i><span>Leave</span></a>
            </li>


            <li class="dropdown">
              <a href="request.php" class="nav-link"><i data-feather="repeat"></i><span>Make Request</span></a>
            </li>

            <?php 
            if ($department_id == 2 && $app_role == 1 ) {
              echo "
                  <li class='menu-header'>COO approvals</li>
                  <li class='dropdown'>
                      <a href='cooLeaveApproval.php' class='nav-link'><i data-feather='user-check'></i><span>COO Leave Approval</span></a>
                  </li>

                
     
                  
              ";
          } else{echo "";}
            ?>
           
            
            <?php 
            if ($department_id == 7 && $app_role == 1 ) {
              echo "
                  <li class='menu-header'>HR approvals</li>
                  <li class='dropdown'>
                      <a href='hrApprovals.php' class='nav-link'><i data-feather='user-check'></i><span>Requests</span></a>
                  </li>
                  <li class='dropdown'>
              <a href='assessmentApproval.php' class='nav-link'><i data-feather='user-check'></i><span>HR Assessment  Approval</span></a>
            </li>
                  <li class='dropdown'>
                      <a href='hrLeaveApproval.php' class='nav-link'><i data-feather='user-check'></i><span>HR Leave  Approval</span></a>
                  </li>
     
                  
              ";
          } else{echo "";}
            ?>

<?php 
            if ( $app_role == 1 ) {
              echo "
                  <li class='menu-header'>Approvals</li>
                 
                  <li class='dropdown'>
              <a href='assessmentApproval.php' class='nav-link'><i data-feather='user-check'></i><span>Assessment  Approval</span></a>
            </li>
                  <li class='dropdown'>
                      <a href='leaveApproval.php' class='nav-link'><i data-feather='user-check'></i><span> Leave  Approval</span></a>
                  </li>
     
                  
              ";
          } else{echo "";}
            ?>


            <li class="menu-header">HISTORY</li>
            <li class="dropdown">
              <a href="assessmentHistory.php" class="nav-link"><i data-feather="archive"></i><span>Assessment History</span></a>
            </li>
            <li class="dropdown">
              <a href="leaveHistory.php" class="nav-link"><i data-feather="archive"></i><span>Leave History</span></a>
            </li>

            
            <?php 
            if ($department_id == 2 && $app_role == 1 ) {
              echo "
              <li class='dropdown'>
              <a href='allLeaveHistory.php' class='nav-link'><i data-feather='archive'></i><span>All Leave History</span></a>
          </li>

                
     
                  
              ";
          } else{echo "";}
            ?>

            <?php 
            if ($department_id == 7 && $app_role == 1 ) {
              echo "
               
                  <li class='dropdown'>
                      <a href='allLeaveHistory.php' class='nav-link'><i data-feather='user-check'></i><span>All Leave History</span></a>
                  </li>
     
                  
              ";
          } else{echo "";}
            ?>


            <?php 
            if ( $app_role == 1 ) {
              echo "
              <li class='menu-header'> DEPARTMENT HISTORY</li>
              <li class='dropdown'>
              <a href='deptLeaveHistory.php' class='nav-link'><i data-feather='archive'></i><span>Department Leave History</span></a>
          </li>
          <li class='dropdown'>
          <a href='deptAssessmentHistory.php' class='nav-link'><i data-feather='archive'></i><span>Department Assessment History</span></a>
      </li>


                  
              ";
          } else{echo "";}
            ?>


            <li class="dropdown">
              <a href="requestHistory.php" class="nav-link"><i data-feather="archive"></i><span>Request History</span></a>
            </li>




=======
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
            <li class="menu-header">VISITORS</li>
            <li class="dropdown">
              <a href="transferVisitors.php" class="nav-link"><i data-feather="repeat"></i><span>Transfer Visitors</span></a>
            </li>
            <li class="dropdown">
              <a href="visitHistory.php" class="nav-link"><i data-feather="archive"></i><span>Visit History</span></a>
            </li>
            <li class="menu-header">REPORTS</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i><span>Visitors</span></a>
              <ul class="dropdown-menu">
<<<<<<< HEAD
                <li><a href="visitorsReport.php">Visitors Report</a></li>
=======
                <li><a href="">Visitors Report</a></li>
                <li><a class="nav-link" href="">Detailed Visitors Report</a></li>
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
              </ul>
            </li>
          </ul>
        </aside>
      </div>