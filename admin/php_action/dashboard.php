<?php  
// total visitors
$visitors = "SELECT * FROM visitors";
$totalVisitors = $conn->query($visitors);
$counttotalVisitors = $totalVisitors->num_rows;

// total vists
$staff = "SELECT * FROM tbl_staff";
$totalstaff = $conn->query($staff);
$counttotalstaff = $totalstaff->num_rows;

// total staff
$visits = "SELECT * FROM check_in WHERE time_out!=''";
$totalVisits = $conn->query($visits);
$counttotalVisits = $totalVisits->num_rows;


// upcoming appointments

$upcomnAppoint = "SELECT * FROM check_in LEFT JOIN status ON status.status_id=check_in.status_id WHERE check_in.status_id=6";
$upcomingAppointments = $conn->query($upcomnAppoint);
$countupcomingAppointments = $upcomingAppointments->num_rows;

$date_today=date('Y-m-d');
// staff present
$staffPresent = "SELECT * FROM attendance WHERE date(at_created_at)='$date_today'";
$totalstaffPresent = $conn->query($staffPresent);
$counttotalstaffPresent = $totalstaffPresent->num_rows;

//staff absent
$staffAbsent=$counttotalstaff-$counttotalstaffPresent;

//staff on time
$staffOnTime = "SELECT * FROM attendance WHERE status_id=10 AND date(at_created_at)='$date_today'";
$totalstaffOnTime = $conn->query($staffOnTime);
$counttotalstaffOnTime = $totalstaffOnTime->num_rows;


//staff late today
$staffLate = "SELECT * FROM attendance WHERE status_id=9 AND date(at_created_at)='$date_today'";
$totalstaffLate = $conn->query($staffLate);
$counttotalstaffLate = $totalstaffLate->num_rows;


// visits today

$visitsToday = "SELECT * FROM check_in WHERE date_in='$date_today'";
$totalvisitsToday = $conn->query($visitsToday);
$counttotalvisitsToday = $totalvisitsToday->num_rows;

// total check in

$totalCheckIn = "SELECT * FROM check_in LEFT JOIN status ON status.status_id=check_in.status_id WHERE check_in.status_id=4 AND check_in.date_in='$date_today'";
$totaltotalCheckIn = $conn->query($totalCheckIn);
$counttotaltotalCheckIn = $totaltotalCheckIn->num_rows;

// total check OUT

$totalCheckOut= "SELECT * FROM check_in LEFT JOIN status ON status.status_id=check_in.status_id WHERE check_in.status_id=5 AND check_in.date_in='$date_today'";
$totaltotalCheckOut = $conn->query($totalCheckOut);
$counttotaltotalCheckOut = $totaltotalCheckOut->num_rows;

// expected visitors

$expectedVisitors= "SELECT * FROM check_in LEFT JOIN status ON status.status_id=check_in.status_id WHERE check_in.status_id=6 ";
$totalexpectedVisitors = $conn->query($expectedVisitors);
$counttotalexpectedVisitors = $totalexpectedVisitors->num_rows;


//upcoming appointment list
$staff=$conn->query("SELECT * FROM check_in 
LEFT JOIN status ON status.status_id=check_in.status_id
LEFT JOIN tbl_staff ON tbl_staff.staff_id=check_in.staff_id
LEFT JOIN visitors ON visitors.visitor_id=check_in.visitor_id
WHERE check_in.status_id=6
ORDER BY check_in.check_in_created_at DESC");
$upcomingAppoints=$staff->fetch_all(MYSQLI_ASSOC);


//staff availability
$staff=$conn->query("SELECT * FROM tbl_staff 
LEFT JOIN department ON department.department_id=tbl_staff.department_id
LEFT JOIN status ON status.status_id=tbl_staff.status_id
LEFT JOIN staff_role ON staff_role.staff_role_id=tbl_staff.staff_role_id
ORDER BY tbl_staff.status_id ASC");
$staffAvailability=$staff->fetch_all(MYSQLI_ASSOC);

//breaktime
$breakRecords=$conn->query("SELECT * FROM break_records
LEFT JOIN tbl_staff ON tbl_staff.staff_id=break_records.staff_id
LEFT JOIN status ON status.status_id=tbl_staff.status_id
WHERE break_records.staff_id='$staff_id' AND date(break_records.break_created_at)='$date_today'");
$break=$breakRecords->fetch_all(MYSQLI_ASSOC);

