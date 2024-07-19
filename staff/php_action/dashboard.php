<?php  

$date_today=date('Y-m-d');
// total visitors
$visitors = "SELECT DISTINCT(visitor_id) FROM check_in WHERE staff_id='$staff_id' ";
$totalVisitors = $conn->query($visitors);
$counttotalVisitors = $totalVisitors->num_rows;

// approved visits
$staff = "SELECT * FROM check_in WHERE staff_id='$staff_id' AND time_out!=''";
$totalstaff = $conn->query($staff);
$counttotalstaff = $totalstaff->num_rows;

// total visits
$visits = "SELECT * FROM check_in WHERE staff_id='$staff_id'";
$totalVisits = $conn->query($visits);
$counttotalVisits = $totalVisits->num_rows;


// upcoming appointments

$upcomnAppoint = "SELECT * FROM check_in WHERE status_id=6 AND staff_id='$staff_id'";
$upcomingAppointments = $conn->query($upcomnAppoint);
$countupcomingAppointments = $upcomingAppointments->num_rows;



//upcoming appointment list
$staff=$conn->query("SELECT * FROM check_in 
LEFT JOIN status ON status.status_id=check_in.status_id
LEFT JOIN tbl_staff ON tbl_staff.staff_id=check_in.staff_id
LEFT JOIN visitors ON visitors.visitor_id=check_in.visitor_id
WHERE check_in.status_id=6 AND check_in.staff_id='$staff_id'
ORDER BY check_in.check_in_created_at DESC");
$upcomingAppoints=$staff->fetch_all(MYSQLI_ASSOC);


//breaktime
$breakRecords=$conn->query("SELECT * FROM break_records
LEFT JOIN tbl_staff ON tbl_staff.staff_id=break_records.staff_id
LEFT JOIN status ON status.status_id=tbl_staff.status_id
WHERE break_records.staff_id='$staff_id' AND date(break_records.break_created_at)='$date_today'");
$break=$breakRecords->fetch_all(MYSQLI_ASSOC);




