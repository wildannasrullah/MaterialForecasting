<?php
error_reporting(0);
session_start();
if(isset($_POST['submit'])){

mysqli_query($conn, "INSERT INTO mdepartment (idDep, namaDep) 
						VALUES (NULL, '$_POST[nama_dep]')");
	echo"
		<script>
			alert('Data Saved Successfully.');window.location = 'f.php?n=department';
		</script>";
}
if(isset($_POST['submit_edit'])){
	
	mysqli_query($conn, "UPDATE mdepartment SET 
								 namaDep			= '$_POST[nama_dep]'
								 WHERE idDep  	= '$_POST[id]'");

	echo"
		<script>
			alert('Data Updated Successfully.');window.location = 'f.php?n=department';
		</script>";
}
if($_GET[m]=='2'){
	mysqli_query($conn, "DELETE FROM mdepartment WHERE idDep = '$_GET[id]'");
	echo"
		<script>
			alert('Data deleted successfully.');window.location = 'f.php?n=department';
		</script>";
}
?>