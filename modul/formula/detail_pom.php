<?php
error_reporting(0);
session_start();

$servername = "192.168.88.88";
$username = "root";
$password = "19K23O15P";
$db = "sim_krisanthium";

$sim = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$sim) {
 die("Connection failed: " . mysqli_connect_error());
}


/* include('../../../config/koneksi_sim.php'); */

/* if($_POST['idx']) {
        $id = $_POST['idx'];   */    
        /* $podetail2 = mysqli_query($sim, "SELECT p.DocNo, p.Qty, p.QtyReceived FROM purchaseorderd p
																				left join purchaseorderh h on p.DocNo = h.DocNo
																				where p.MaterialCode = '$id'
																				AND h.status NOT IN ('CLOSED', 'DELETE')
																				AND YEAR(h.DocDate) = YEAR(NOW());"); */
		
		echo"
		<h4><b>List of Outstanding PO - $forcal[componentName]</b></h4>
																<p>
																<table width='100%' border='1'>
																	<tr><th align='right'>PO No.</th><th align='right'>Qty</th><th align='right'>Qty Terima</th><th align='right'>Qty Sisa</th></tr>";
																
		/* while($pod2 = mysqli_fetch_array($podetail2)){
		echo "
        
																	<tr>
																		<td>$pod2[DocNo]</td><td>$pod2[Qty]</td><td>$pod2[QtyReceived]</td><td>".($pod2[Qty]-$pod2[QtyReceived])."</td>
																	</tr>
																	";
																}
																echo"
																</table>
															"; */
	/* 							   
        } */