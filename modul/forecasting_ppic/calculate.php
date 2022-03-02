<?php
error_reporting(0);
session_start();
include("../../config/koneksi.php");
include("../../config/koneksi_sim.php");


$sim = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$sim) {
 die("Connection failed: " . mysqli_connect_error());
}

$f	=$_GET[n];  $act	=$_GET[act];
if($f=='formula' AND $act=='in'){

$idfor = $_GET[id];
$for = mysqli_query($conn, "select *from forecast where idFor = '$idfor';");
$ff = mysqli_fetch_array($for);
$matcode = count($_POST['materialcomp']);

for($j=0;$j<$matcode;$j++){
	$formula = $_POST['materialcomp'][$j];
	$qtyBom = $_POST['qtyc'][$j]; //Quantity BOM
	$qw = mysqli_query($sim, "select *from masterbomd where Formula = '$formula';");
	while($r = mysqli_fetch_array($qw))
		{  
			
			$matcomponent	= $r['MaterialCode'];
			$unit			= $r['Unit'];
			$qty_comp		= $r['Qty']; //Quantity Component

 			$hasilbagi 		= ($ff[qtyFor]/$qtyBom);
			$hasilAkhir 	= $hasilbagi*$qty_comp;
		
			 mysqli_query($conn, "INSERT INTO formula_calculate VALUES (NULL, '$idfor','$ff[qtyFor]','$qtyBom','$matcomponent',
								'$qty_comp','$hasilbagi','$hasilAkhir','$unit','$_SESSION[username]', NOW(), '$_GET[matcode]','$formula')"); 

		}
		mysqli_query($conn, "UPDATE forecast SET 
								 status				= 'Finish',
								 dateFinishFormula	= NOW()
								 WHERE idFor  	= '$idfor'");
}
	 echo"
		<script>
			alert('Calculate Process Successfully.');window.location = '../../f.php?n=formula&act=generate&id=$_GET[id]&matcode=$_GET[matcode]';
		</script>";
}
if($f=='formula' AND $act=='delete'){
	mysqli_query($conn, "DELETE FROM formula_calculate WHERE materialcode like '%$_GET[matcode]%'");
	
	$fcal = mysqli_query($conn, "select distinct component from formula_calculate where materialcode like '%$_GET[matcode]%';");
	$forcal = mysqli_num_rows($fcal);
	$bom = mysqli_query($sim, "select *from masterbomh where formula like '%$_GET[matcode]%';");
	$cbom = mysqli_num_rows($bom);
	if($forcal <= 0){
		mysqli_query($conn, "UPDATE forecast SET 
								 status			= 'Open'
								 WHERE idFor  	= '$_GET[id]'");
	}else{}
	echo"
		<script>
			alert('Deleted Successfully.');window.location = '../../f.php?n=formula&act=generate&id=$_GET[id]&matcode=$_GET[matcode]';
		</script>";
}
?>