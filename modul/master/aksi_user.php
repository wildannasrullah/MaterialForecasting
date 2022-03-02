<?php
error_reporting(0);
session_start();
if(isset($_POST['submit'])){

mysqli_query($conn, "INSERT INTO muser (fullName, username, password, level, idDep) 
						VALUES ('$_POST[fullname]', '$_POST[username]', '$_POST[password]', '$_POST[level]', '$_POST[dep]')");
	echo"
		<script>
			alert('Data Saved Successfully.');window.location = 'f.php?n=user';
		</script>";
}
if(isset($_POST['submit_edit'])){
	mysqli_query($conn, "UPDATE muser SET 
								 fullName  		= '$_POST[fullname]',
								 password		= '$_POST[password]',
								 level			= '$_POST[level]', 
								 idDep			= '$_POST[dep]'
								 WHERE idUser  	= '$_GET[id]'");

	echo"
		<script>
			alert('Data Updated Successfully.');window.location = 'f.php?n=user';
		</script>";
}
if($_GET[m]=='2'){
	mysqli_query($conn, "DELETE FROM muser WHERE idUser = '$_GET[id]'");
	echo"
		<script>
			alert('Data deleted successfully.');window.location = 'f.php?n=user';
		</script>";
}
?>