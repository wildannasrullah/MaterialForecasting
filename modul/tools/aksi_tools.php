<?php
error_reporting(0);
session_start();
include("../../config/koneksi.php");
include("../../config/koneksi_sim.php");

$f	=$_GET[n];  $act	=$_GET[act]; $m = $_GET[m]; $st = $_GET[st];

if($f=='change-calc-status' AND $act=='rst' AND $m==1){
	if($st == 'Finish'){
		mysqli_query($conn, "UPDATE forecast SET 
								 status				= 'In Progress',
								 dateFinishFormula	= NOW()
								 WHERE idFor  	= '$_GET[id]'");
		echo"
		<script>
			alert('Status changed to in progress.');window.location = '../../f.php?n=change-calc-status';
		</script>";
	}
	else if($st == 'In Progress'){
		mysqli_query($conn, "UPDATE forecast SET 
								 status			= 'Finish',
								 dateFinishFormula	= NOW()
								 WHERE idFor  	= '$_GET[id]'");
		echo"
		<script>
			alert('Status changed to finish.');window.location = '../../f.php?n=change-calc-status';
		</script>";
	}
	else if($st == 'Open'){
		echo"
		<script>
			alert('Status is still open.');window.location = '../../f.php?n=change-calc-status';
		</script>";
	}


	
}

?>