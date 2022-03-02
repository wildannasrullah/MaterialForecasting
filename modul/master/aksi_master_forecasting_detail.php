<?php
error_reporting(0);
session_start();
if(isset($_POST['submit'])){
	
$number = count($_POST["matcode"]);
if($number > 0)  
		{  
			  for($i=0; $i<$number; $i++)  
			  {
					$value = filter_input(INPUT_POST, 'customer');
								$exploded_value = explode('|', $value);
								$custcode = $exploded_value[0];
					$value2 = filter_input(INPUT_POST, 'customer');
								$exploded_value2 = explode('|', $value2);
								$custname = $exploded_value2[1];
					$t = mysqli_fetch_array(mysqli_query($conn, "select max(IDForh) as no from mforecastingh"));
										$noUrut = (int) substr($t[no], 4, 3);
										$noUrut++;
										$char = "MFOR";
										$newID = $char . sprintf("%03s", $noUrut);
										
					mysqli_query($conn, "INSERT INTO mforecastingh  
											VALUES ('$newID', '$custcode', '".$_POST[matcode][$i]."', '$_SESSION[username]',NOW(),'$_SESSION[username]',NOW(),'".$_POST[matname][$i]."','$custname')");
						echo"
							<script>
								alert('Data Saved Successfully.');window.location = 'f.php?n=master-forecasting';
							</script>";
			   }  
			   
		 }  
		 else  
		 {  
			  echo "Tidak ada produk yang dipilih ";  
		 }  
}
?>