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
            <li class="menu-header">Portal</li>
            <li class="dropdown">
              <a href="attendance.php" class="nav-link"><i data-feather="user"></i><span>Attendance</span></a>
            </li>
            <li class="dropdown">
              <a href="assessment.php" class="nav-link"><i data-feather="user"></i><span>Assessment</span></a>
            </li>
            <li class="dropdown">
              <a href="leave.php" class="nav-link"><i data-feather="user"></i><span>Leave</span></a>
            </li>
            <li class="dropdown">
              <a href="checkin.php" class="nav-link"><i data-feather="user-plus"></i><span>Check In Visitors</span></a>
            </li>
           <li class="dropdown">
              <a href="visitorCheckout.php" class="nav-link"><i data-feather="user-x"></i><span>Check Out Visitors</span></a>
            </li>
<<<<<<< HEAD
          


            <?php 
              if($app_role==1){echo "
                <li class='menu-header'>department</li>
            <li class='dropdown'>
              <a href='request.php' class='nav-link'><i data-feather='user-check'></i><span>Requests</span></a>
            </li>
                ";}elseif($app_role==3){echo "
                <li class='menu-header'>department</li>
            <li class='dropdown'>
              <a href='ceorequest.php' class='nav-link'><i data-feather='user-check'></i><span>Requests</span></a>
            </li>
                ";}else{echo "";}
            ?>

=======
            <li class="dropdown">
              <a href="attendance.php" class="nav-link"><i data-feather="user"></i><span>Attendance</span></a>
            </li>
           
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
            <li class="menu-header">STAFF</li>
            <li class="dropdown">
              <a href="addStaff.php" class="nav-link"><i data-feather="user-check"></i><span>Add Staff Members</span></a>
            </li>
            <li class="dropdown">
              <a href="manageStaff.php" class="nav-link"><i data-feather="users"></i><span>Manage Staff</span></a>
            </li>

            <li class="menu-header">VISITORS</li>
            <li class="dropdown">
              <a href="manageVisitors.php" class="nav-link"><i data-feather="users"></i><span>Manage Visitors</span></a>
            </li>
            <li class="dropdown">
              <a href="transferVisitors.php" class="nav-link"><i data-feather="repeat"></i><span>Transfer Visitors</span></a>
            </li>
            <li class="dropdown">
              <a href="visitHistory.php" class="nav-link"><i data-feather="archive"></i><span>Visit History</span></a>
            </li>
            <li class="menu-header">REPORTS</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Staff</span></a>
              <ul class="dropdown-menu">
<<<<<<< HEAD
                <li><a class="nav-link" href="staffReport.php">Staff Report</a></li>
                <li><a class="nav-link" href="attendanceReport.php">Attendance Report</a></li>
                
=======
                <li><a class="nav-link" href="">Staff Report</a></li>
                <li><a class="nav-link" href="attendanceReport.php">Attendance Report</a></li>
                <li><a href="">Detailed Staff Report</a></li>
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i><span>Visitors</span></a>
              <ul class="dropdown-menu">
                <li><a href="visitorsReport.php">Visitors Report</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>