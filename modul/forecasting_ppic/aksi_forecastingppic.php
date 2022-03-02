<?php
error_reporting(0);
session_start();
include("../../config/koneksi.php");
include("../../config/koneksi_sim.php");

$f	=$_GET[n];  $act	=$_GET[act];
if($f=='forecasting-ppic' AND $act=='bulan'){
$number = count($_POST["qty"]);
if($number > 0)  
		{  
			  for($i=0; $i<$number; $i++)  
			  {
				  $bulan = $_POST[bulan][$i];
				  $qty = $_POST[qty][$i];
				  
				  $cek_mat = mysqli_query($conn, "SELECT count(n.MaterialCode) as jum FROM mforecastingh m
												  left join mforecastingd n on m.IDForh=n.IDForh
												  where m.CustomerCode='$_POST[cust]' and m.ProductCode='$_POST[kota]'");
					$h = mysqli_fetch_array($cek_mat);
					if($h[jum] <= 0){
						echo"
						<script>
							alert('No Material for this product.');window.location = '../../f.php?n=forecasting-ppic';
						</script>";
					}else{
						
						if($bulan=='01') $nameb = 'January';
						else if($bulan=='02') $nameb = 'February';
						else if($bulan=='03') $nameb = 'March';
						else if($bulan=='04') $nameb = 'April';
						else if($bulan=='05') $nameb = 'May';
						else if($bulan=='06') $nameb = 'June';
						else if($bulan=='07') $nameb = 'July';
						else if($bulan=='08') $nameb = 'August';
						else if($bulan=='09') $nameb = 'September';
						else if($bulan=='10') $nameb = 'October';
						else if($bulan=='11') $nameb = 'Nopember';
						else $nameb = 'December';
						
							mysqli_query($conn, "INSERT INTO forecasting_ppic_month 
										VALUES (NULL, '$_POST[date]','$bulan','$qty','$_POST[tol]',
												'$_POST[cust]', '$_POST[kota]','$_SESSION[username]', NOW(), '$_POST[kategori]','$nameb')");
					}
					echo"
						<script>
							alert('Data Saved Successfully PPIC.');window.location = '../../f.php?n=forecasting-ppic';
						</script>";
			  }
		}
}
if($f=='forecasting-ppic' AND $act=='calculate'){
	
	//Cek Total Qty Forecast
	$cekq = mysqli_query($conn, "SELECT f.ProductCode, n.MaterialCode, n.MaterialName, (sum(f.qty))`TotalQty`, (sum(f.qty)*1.05)`TotalQtyTol`, n.JumlahUp FROM mforecastingh m
									left join mforecastingd n on m.IDForh=n.IDForh
									left join forecasting_ppic_month f on f.ProductCode=m.ProductCode
									WHERE n.CustomerCode = '$_POST[cust]' and n.category='$_POST[kategori]'
									AND (f.bulan between '$_POST[begda]' and '$_POST[endda]')
									GROUP BY f.ProductCode;");
	while($cekqty = mysqli_fetch_array($cekq)){
	$tahun = date('Y');
	$check="select *from forecasting_ppic_totqty where MaterialCode='$cekqty[MaterialCode]'
										AND begda='$_POST[begda]' AND endda='$_POST[endda]'
										AND CustomerCode='$_POST[cust]' AND Category = '$_POST[kategori]'
										AND Year = '$tahun';";
	$rs = mysqli_query($conn,$check);
	$data = mysqli_fetch_array($rs, MYSQLI_NUM);
	//echo "Data : $data[0]";
		$matname = $cekqty[MaterialName]." @".$cekqty[JumlahUp]." Up";
		
		//Cek QTY di Warehouse
		$quer = "select sum(QtyEnd)as QtyEnd , s.Periode, s.TagNo, s.MaterialCode, s.Location FROM stockbalance s
									where MaterialCode = '$cekqty[MaterialCode]' AND MONTH(Periode) = MONTH(NOW()) AND YEAR(Periode) = YEAR(NOW())
									AND Location IN ('G19BK')group by s.materialcode";
				$fc   = mysqli_query($sim, $quer);
				$rt = mysqli_fetch_array($fc);
				//echo " $cekqty[MaterialCode] = $rt[QtyEnd]";
				
		//Cek PO Outstanding
		
				
		//SIMPAN Calculate
				
					mysqli_query($conne, "INSERT INTO forecasting_ppic_totqty 
										VALUES (NULL, '$cekqty[MaterialCode]','$matname','$cekqty[TotalQty]','$cekqty[TotalQtyTol]',
												'$_POST[cust]', '$_POST[kategori]','$_SESSION[username]', NOW(), '$_POST[begda]','$_POST[endda]',YEAR(CURRENT_DATE()), 
												'$cekqty[ProductCode]','$cekqty[JumlahUp]','$rt[QtyEnd]')");
					
					//SIMPAN PO Outstanding
					$po = mysqli_query($simm, "SELECT p.MaterialCode, p.DocNo, p.Qty, p.QtyReceived FROM purchaseorderd p
																				left join purchaseorderh h on p.DocNo = h.DocNo
																				where p.MaterialCode = '$cekqty[MaterialCode]'
																				AND h.status NOT IN ('CLOSED', 'DELETED')
																				AND (Qty-QtyReceived) NOT LIKE '-%'
																				AND (Qty-QtyReceived) NOT IN ('0.0000')
																				AND YEAR(h.DocDate) = YEAR(NOW())");
					while($poout = mysqli_fetch_array($po)){
							$remain = $poout[Qty]-$poout[QtyReceived];
							mysqli_query($conne, "INSERT INTO forecasting_ppic_po 
										VALUES (NULL, '$cekqty[MaterialCode]','$poout[DocNo]','$poout[Qty]','$poout[QtyReceived]',
												'$remain', '$_POST[begda]','$_POST[endda]',YEAR(CURRENT_DATE()),'$matname')");
						}						
					echo"
						<script>
							alert('Data Calculate Successfully.');window.location = '../../f.php?n=forecasting-result&c=$_POST[cust]&ct=$_POST[kategori]&b=$_POST[begda]&e=$_POST[endda]';
						</script>";
			  }
}
if($f=='forecast' AND $act=='del'){
	mysqli_query($conn, "DELETE FROM forecast WHERE idFor = '$_GET[id]'");
	echo"
		<script>
			alert('Deleted Successfully.');window.location = '../../f.php?n=forecast';
		</script>";
}

if($_GET[n]=='forecasting-result' and $_GET[act]=='filter_result'){
						$value = filter_input(INPUT_POST, 'periode');
								$exploded_value = explode('|', $value);
								$periode = $exploded_value[0];
						$value2 = filter_input(INPUT_POST, 'periode');
								$exploded_value2 = explode('|', $value2);
								$period = $exploded_value2[1];
						echo "<script>		
							window.location = '../../f.php?n=forecasting-result&c=$_GET[c]&ct=$_GET[ct]&b=$periode&e=$period';
						</script>";
					}
if($_GET[n]=='forecasting-result' and $_GET[act]=='report_ppic'){
	$qq = mysqli_query($conn, "select *from forecasting_ppic_totqty where CustomerCode='$_POST[cust]' AND Category = '$_POST[kategori]' AND begda = '$_POST[begda]' AND endda = '$_POST[endda]'");
	$b = mysqli_num_rows($qq);
	if($b > 0){
		echo "<script>		
				window.location = '../../f.php?n=forecasting-result&c=$_POST[cust]&ct=$_POST[kategori]&b=$_POST[begda]&e=$_POST[endda]';
			  </script>";
	}else{
		echo"
		<script>
			alert('Data not found.');window.location = '../../f.php?n=report_forecastingppic';
		</script>";
	}
						
}
?>