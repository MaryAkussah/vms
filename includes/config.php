<?php 
header('X-Content-Type-Options: nosniff');
date_default_timezone_set('Africa/Accra');

// $host = "localhost";
// $username = "wgtechin_vms";
// $password = "4jCi1rR~xy[*";
// $database = "wgtechin_vms";


$host = "localhost";
$username = "root";
$password = "";
$database = "vms";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>

