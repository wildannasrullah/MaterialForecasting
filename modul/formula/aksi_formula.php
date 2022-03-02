<?php
error_reporting(0);
session_start();
include("../../config/koneksi.php");

$f	=$_GET[n];  $act	=$_GET[act];
if($f=='forecast' AND $act=='in'){

mysqli_query($conn, "INSERT INTO forecast VALUES (NULL, '$_POST[sod]','$_POST[cust]','$_POST[qty_so]','$_POST[mat_cod]','$_POST[del_date]', '$_SESSION[username]', NOW(), '$_SESSION[username]', NOW())");
	echo"
		<script>
			alert('Data Saved Successfully.');window.location = '../../f.php?n=forecast';
		</script>";
}
if($f=='forecast' AND $act=='up'){
	mysqli_query($conn, "UPDATE forecast SET 
								 sod			= '$_POST[sod]',
								 customer		= '$_POST[cust]',
								 qtyFor			= '$_POST[qty_so]',
								 materialCode	= '$_POST[mat_cod]',
								 deliveryDate	= '$_POST[del_date]',
								 changedBy	 	= '$_SESSION[username]',
								 changedDate 	= NOW()
								 WHERE idFor  	= '$_POST[id]'");

	echo"
		<script>
			alert('Data Updated Successfully.');window.location = '../../f.php?n=forecast';
		</script>";
}
if($f=='forecast' AND $act=='del'){
	mysqli_query($conn, "DELETE FROM forecast WHERE idFor = '$_GET[id]'");
	echo"
		<script>
			alert('Deleted Successfully.');window.location = '../../f.php?n=forecast';
		</script>";
}
?>