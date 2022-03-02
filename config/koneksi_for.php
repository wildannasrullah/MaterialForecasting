<?php
$servername = "192.168.88.99";
$username = "maria";
$password = "maria123";
$db = "report_forecast";

$serversim = "192.168.88.88";
$usernamesim = "root";
$passwordsim = "19K23O15P";
$dbsim = "sim_krisanthium";

$conn = mysqli_connect($servername, $username, $password,$db);
$sim = mysqli_connect($serversim, $usernamesim, $passwordsim, $dbsim);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
if (!$sim) {
 die("SIM Connection failed: " . mysqli_connect_error());
}
?>