<?php
error_reporting(0);
session_start();
if(isset($_POST['submit'])){
	$value = filter_input(INPUT_POST, 'customer');
								$exploded_value = explode('|', $value);
								$custcode = $exploded_value[0];
	$value2 = filter_input(INPUT_POST, 'customer');
								$exploded_value2 = explode('|', $value2);
								$custname = $exploded_value2[1];
//PRODUCT NAME	
$number = count($_POST["prodcode"]);
if($number > 0)  
		{  
			  for($i=0; $i<$number; $i++)  
			  {
					
					$prodcode = $_POST[prodcode][$i];
					$prodname = $_POST[prodname][$i];
					$m = mysqli_query($sim, "select *from mastermaterial where Code='$prodcode'");
					$t = mysqli_fetch_array($m);
					mysqli_query($conn, "INSERT INTO mforecastingh  
											VALUES (NULL, '$custcode', '$prodcode', '$_SESSION[username]',NOW(),'$_SESSION[username]',NOW(),
											'$t[Name]','$custname')");
						
			   } 
			   echo"
							<script>
								alert('Data Saved Successfully. $num');window.location = 'f.php?n=master-forecasting';
							</script>";
		 }  
		 else  
		 {  
			  echo "Tidak ada produk yang dipilih ";  
		 }  

}

if(isset($_POST['submit_add'])){
//PRODUCT NAME	
$number = count($_POST["matcode"]);
if($number > 0)  
		{  
			  for($i=0; $i<$number; $i++)  
			  {
					$prod = $_POST[product];
					
					$matcode = $_POST[matcode][$i];
					$matname = $_POST[matname][$i];
					
					$up = $_POST[jumlah_up];
					$m = mysqli_query($sim, "select *from mastermaterial where Code='$matcode'");
					$t = mysqli_fetch_array($m);
					$cek_paper = strpos($t[Code],"K.");
					$cek_foil  = strpos($t[Name],"FOIL");
					if($cek_paper !== false AND $cek_foil !== true){
						$kat = "Paper";
						mysqli_query($conn, "INSERT INTO mforecastingd  
											VALUES (NULL, '$_GET[c]', '$matcode', '$t[Name]','$prod','$_SESSION[username]',NOW(),'$kat','$up')");
					}
					if($cek_paper !== true AND $cek_foil !== false){
						$kat = "Foil";
						mysqli_query($conn, "INSERT INTO mforecastingd  
											VALUES (NULL, '$_GET[c]', '$matcode', '$t[Name]','$prod','$_SESSION[username]',NOW(),'$kat',NULL)");
					}
					
						
			   } 
			   echo"
							<script>
								alert('Data Saved Successfully.');window.location = 'f.php?n=add_material&id=$_GET[id]&c=$_GET[c]&p=';
							</script>";
		 }  
		 else  
		 {  
			  echo "Tidak ada material yang dipilih ";  
		 }  

}
if(isset($_POST['del_cust'])){
	mysqli_query($conn, "DELETE FROM mforecastingh WHERE CustomerCode = '' AND ProductCode = ''");
	echo"
		<script>
			alert('Data deleted successfully.');window.location = 'f.php?n=user';
		</script>";
}
?>