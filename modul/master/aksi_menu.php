<?php
error_reporting(0);
session_start();
if(isset($_POST['submit'])){

mysqli_query($conn, "INSERT INTO menu (MenuName, SubMenu, Link, icon) 
						VALUES ('$_POST[menu_name]', '$_POST[submenu]', '$_POST[link]', '$_POST[icon]')");
	echo"
		<script>
			alert('Data Saved Successfully.');window.location = 'f.php?n=menu';
		</script>";
}
if(isset($_POST['submit_edit'])){
	mysqli_query($conn, "UPDATE menu SET 
								 MenuName  		= '$_POST[menu_name]',
								 SubMenu		= '$_POST[submenu]',
								 Link			= '$_POST[link]', 
								 icon			= '$_POST[icon]'
								 WHERE idMenu  	= '$_GET[id]'");

	echo"
		<script>
			alert('Data Updated Successfully.');window.location = 'f.php?n=menu';
		</script>";
}
if($_GET[m]=='2'){
	mysqli_query($conn, "DELETE FROM menu WHERE idMenu = '$_GET[id]'");
	echo"
		<script>
			alert('Data deleted successfully.');window.location = 'f.php?n=menu';
		</script>";
}

//-------------------------------------------------------------

if(isset($_POST['submit_u'])){

mysqli_query($conn, "INSERT INTO menu_user (idMenu, idDep) 
						VALUES ('$_POST[menu]', '$_POST[dep]')");
	echo"
		<script>
			alert('Data Saved Successfully.');window.location = 'f.php?n=menuuser';
		</script>";
}
if(isset($_POST['submit_edit_u'])){
	mysqli_query($conn, "UPDATE menu_user SET 
								 idMenu  		= '$_POST[menu]',
								 idDep			= '$_POST[dep]'
								 WHERE idMu  	= '$_GET[id]'");

	echo"
		<script>
			alert('Data Updated Successfully.');window.location = 'f.php?n=menuuser';
		</script>";
}
if($_GET[m]=='4'){
	mysqli_query($conn, "DELETE FROM menu_user WHERE idMu = '$_GET[id]'");
	echo"
		<script>
			alert('Data deleted successfully.');window.location = 'f.php?n=menuuser';
		</script>";
}
?>