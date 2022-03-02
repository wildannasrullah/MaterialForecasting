<!-- <h4 class='heading_a uk-margin-bottom'>Forecasting PPIC</h4>
		<div class='md-card'>
            <div class='md-card-content'>
				<p align='right'>
				<button class='md-btn md-btn-success md-btn-wave' data-uk-modal="{target:'#modal_calculate'}">PRINT</button>
				</p>
					<hr />
					 <table id="example" class="display nowrap" style="width:100%"> -->
					 
<h4 class='heading_a uk-margin-bottom'>Report Forecast</h4>
            <div class='md-card'>
                        <div class='md-card-content'>
						

			<div class='md-card uk-margin-medium-bottom'>
                <div class='md-card-content'>
                    <div class='dt_colVis_buttons'></div>
                    <table id='dt_tableExport' class='uk-table' cellspacing='0' width='100%' border='1'>
					<?php	
						$result= mysqli_query($conn, "CALL TotalForecastPPIC('$_GET[c]','$_GET[ct]');"); 
						/* if ($rest)
							mysqli_free_result($rest);

						if ($result)
							mysqli_free_result($result); */
						echo " 
						<thead>
                        <tr>
						";						
						for($i=0; $i<mysqli_num_fields($result); $i++)
						  {
							  $field = mysqli_fetch_field($result);
							 // printf($field->name);
							  echo "<td bgcolor=lightgray align='center'><b>".substr($field->name, 0, strpos($field->name, ">"))."</b></td>";
							  $fieldnya[$i]=substr($field->name, 0, strpos($field->name, ">"));
							  $jum_up[$i]=substr(strstr($field->name,'@'),1,-23);
							  $matname[$i]=substr(strstr($field->name,'>'),1);
						  }
					
						 echo "
						 </tr>
                        </thead>

                        <tbody>
						";
						 while ($row = mysqli_fetch_row($result))
						 {
							 echo "<tr>";
							 echo '<td align=center>'.$row[0].'.</td>
								   <td align=left>'.$row[1].'</td>
								   <td align=right>'.($row[2]).'</td>
								     <td align=right>'.($row[3]).'</td>';
							for($j=4; $j<mysqli_num_fields($result); $j++)
							{ 
								if($row[$j] <> '-'){
									echo '<td align=right>'.($row[$j]).'</td>';
								}else{
									echo '<td align=right>'.($row[$j]).'</td>';	
								}
								//$totMat = $row[$j];
								$totForMat[$j] += $row[$j];
								$up[$j]=$row[$j];
							} 
							echo "</tr>";
							$totalFor +=$row[2];
							$totalForTol +=$row[3];
						 }
						 //TOTAL FORECASTING
						 echo "
						 <tr><td colspan='9'><hr /></td></tr>
						 <tr><td colspan='2'><b>TOTAL (PCS)</b></td><td align='right'><b>".($totalFor)."</b></td><td align='right'><b>".($totalForTol)."</b></td>";
							for($h=4; $h<mysqli_num_fields($result); $h++)
							{ 
								echo "<td align=right><b>".($totForMat[$h])."</b></td>";
								$totfor[$h] = $totForMat[$h];
							} 
						 echo"</tr>";
						 
						 //JUMLAH UP TIAP KERTAS
						  echo "<tr><td colspan='4'><b>JUMLAH UP</b></td>";
						 
							for($h=4; $h<mysqli_num_fields($result); $h++)
							{ 
								
									echo "<td align=right><b>$jum_up[$h]</b></td>";
								
									$ju[$h]=$jum_up[$h];
						  }
						 echo"</tr>";
						 /* 
						  //KODE
						  echo "<tr><td colspan='4'><b>KODE</b></td>";
						 
							for($h=4; $h<mysqli_num_fields($result); $h++)
							{ 
								
									echo "<td align=right bgcolor='yellow'><b>$matname[$h]</b></td>";
								
									$mt[$h]=$matname[$h];
									$ids = join("','",$mt[$h]);
									print_r($ids);
						  }
						 echo"</tr>"; */
						 
						 //TOTAL KEBUTUHAN
						  echo "<tr><td colspan='4'><b>TOTAL KEBUTUHAN (REAM)</b></td>";
							for($h=4; $h<mysqli_num_fields($result); $h++)
							{ 
								$kebutuhan[$h] = (($totfor[$h]/$ju[$h])/500);
								echo "<td align=right><b>".round($kebutuhan[$h],3)."</b></td>";
							} 
						 echo"</tr>";
						 
						 //WAREHOUSE
						  echo "<tr><td rowspan='2' colspan='3' bgcolor='yellow'><b>WAREHOUSE</b></td><td bgcolor='yellow'><b>(REAM)</b></td>";
						  $rest= mysqli_query($conne, "CALL WarehousePPIC('JKT.0021','Paper');");
						  while ($rw = mysqli_fetch_row($rest))
							{
								for($j2=4; $j2<mysqli_num_fields($rest); $j2++)
								{ 
									echo '<td align=right bgcolor=yellow><b>'.round((($rw[$j2])/500),3).'</b></td>';
									$rim[$j2]=$rw[$j2]/500;
								}
							}
						 echo"</tr>";
						  echo "<tr><td bgcolor='yellow'><b>(PCS)</b></td>";
							for($h=4; $h<mysqli_num_fields($result); $h++)
							{ 
								$warehouse[$h] = (($rim[$h]*$ju[$h])*500);
								echo "<td align=right bgcolor='yellow'><b>".(round($warehouse[$h],3))."</b></td>";
							} 
						 echo"</tr>";
						 
						 //CEK PO Outstanding
						 $polist= mysqli_query($connec, "CALL OutstandingPO('$_GET[c]','$_GET[ct]');");
							while ($row = mysqli_fetch_row($polist))
							{	
								 echo "<tr>";
								 echo '<td align=right colspan=4><font color="red"><b>'.$row[3].'</b></font></td>';
								for($j=4; $j<(mysqli_num_fields($polist)); $j++)
								{ 
									echo '<td align=right><b>'.round($row[$j],4).'</b></td>';
									
									//$totMat = $row[$j];
									$totForMat[$j] += $row[$j];
									$nilai[$j]=$row[$j];
								} 
								echo "</tr>";
								 echo "<tr>";
								 echo '<td align=right colspan=4><font color="red"><b>&nbsp;</b></font></td>';
									for($i=4; $i<(mysqli_num_fields($polist)); $i++)
									{ 
										$outstanding[$i] += (($ju[$i]*$nilai[$i])*500);
										echo '<td align=right><b>'.round((($ju[$i]*$nilai[$i])*500),4).'</b></td>';
									}
								echo "</tr>";
							}				
						 
						 //MINUS PAPER
						 
						 //PCS
						 echo "
						 <tr><td colspan='9'><hr /></td></tr>
						 <tr><td colspan='3' rowspan='3'><b>MINUS PAPER</b></td><td><b>(PCS)</b></td>";
							for($h=4; $h<mysqli_num_fields($result); $h++)
							{ 
								$minus[$h]=$totfor[$h]-$warehouse[$h]-$outstanding[$h];
								echo "<td align=right><b>".(round(($minus[$h]),3))."</b></td>";
							} 
						 echo"</tr>";
						 
						 //REAM
						 echo "
						 <tr><td><b>(REAM)</b></td>";
							for($h=4; $h<mysqli_num_fields($result); $h++)
							{ 
								$minus[$h]=$totfor[$h]-$warehouse[$h]-$outstanding[$h];
								echo "<td align=right><b>".(($minus[$h]/$ju[$h])/500)."</b></td>";
							} 
						 echo"</tr>";
						 
						 //TON
						 echo "
						 <tr><td><b>(TON)</b></td>";
							for($h=4; $h<mysqli_num_fields($result); $h++)
							{ 
								$minus[$h]=$totfor[$h]-$warehouse[$h]-$outstanding[$h];
								echo "<td align=right><b>".(0.27*0.64*1.01*500*(($minus[$h]/$ju[$h])/500)/1000)."</b></td>";
							} 
						 echo"</tr>";
						 
					?>
					</tbody>
					</table>
                </div>
            </div></div>
	<?php
	
	echo"
		<div class='uk-modal' id='modal_calculate'>
            <div class='uk-modal-dialog'>
			<form id='form_validation' class='uk-form-stacked' method='POST' action='$aksi?n=forecasting-ppic&act=bulan'>
				<table width='100%' border='0'>
					<tr><td colspan='4'><h2>Calculate Form<hr></h2></td><td align='right'><button type='button' class='uk-modal-close uk-close'></button></td></tr>
					<tr><td width='30%'>Customer Name</td><td width='2%'>:</td><td colspan='3'>
                     <div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-large-1-1'>";?>
                            <select name="cust" id="cust" class='md-input'>
								<option selected>- Choose Customer -</option>
								<?php $tampil=mysqli_query($conn, "SELECT * FROM mforecastingh group by CustomerName ORDER BY IDForh ASC");
								  while($t=mysqli_fetch_array($tampil)){
									 echo "<option value='$t[CustomerCode]'>$t[CustomerName]</option>";
								  }
								?>
								</select>
								<?php
								echo"
                            </div>
                        </div>
					</td>
					</tr>
					<tr><td>Period</td><td>:</td><td width='25%'>
                     <div class='uk-margin' data-uk-grid-margin>
                            <div class='uk-width-medium-1-0'>
                                <div class='parsley-row'>	
                                    <select id='select_demo_4' name='begda' class='md-input'>
														<option value=''>Select Month.....</option>
														<option value='01'>January</option>
														<option value='02'>February</option>
														<option value='03'>Maret</option>
														<option value='04'>April</option>
														<option value='05'>May</option>
														<option value='06'>June</option>
														<option value='07'>July</option>
														<option value='08'>August</option>
														<option value='09'>September</option>
														<option value='10'>October</option>
														<option value='11'>November</option>
														<option value='12'>December</option>
									</select>
								</div>
                            </div>
                        </div>
					</td>
					<td width='5%' align='center'>S/D</td>
					<td width='25%'>
					<div class='uk-margin' data-uk-grid-margin>
                            <div class='uk-width-medium-1-0'>
                                <div class='parsley-row'>	
                                    <select id='select_demo_4' name='endda' class='md-input'>
														<option value=''>Select Month.....</option>
														<option value='01'>January</option>
														<option value='02'>February</option>
														<option value='03'>Maret</option>
														<option value='04'>April</option>
														<option value='05'>May</option>
														<option value='06'>June</option>
														<option value='07'>July</option>
														<option value='08'>August</option>
														<option value='09'>September</option>
														<option value='10'>October</option>
														<option value='11'>November</option>
														<option value='12'>December</option>
									</select>
								</div>
                            </div>
                        </div>
					</td>
					</tr>
				</table>
				<p align='right'><button type='submit' name='submit_go' id='submit_go' class='md-btn md-btn-small md-btn-danger md-btn-wave' >GO CALCULATE</button></p>
            </form>    
			</div>
        </div>";
	?>
<script language="javascript" src="modul/forecasting_ppic/jquery.js"></script>
<script>
$(document).ready(function() {
	$('#cust').change(function() { // Jika Select Box id provinsi dipilih
		var cust = $(this).val(); // Ciptakan variabel provinsi
		$.ajax({
			type: 'POST', // Metode pengiriman data menggunakan POST
			url: 'modul/forecasting_ppic/kota.php', // File yang akan memproses data
			data: 'nama_cust=' + cust, // Data yang akan dikirim ke file pemroses
			success: function(response) { // Jika berhasil
				$('#kota').html(response); // Berikan hasil ke id kota
			}
		});
    });



$(document).ready(function() {
	$('#kota').change(function() { // Jika select box id kota dipilih
		var kota = $(this).val(); // Ciptakan variabel kota
		$.ajax({
			type: 'POST', // Metode pengiriman data menggunakan POST
			url: 'kurir.php', // File pemroses data
			data: 'nama_kota=' + kota, // Data yang akan dikirim ke file pemroses
			success: function(response) { // Jika berhasil
				$('#kurir').html(response); // Berikan hasilnya ke id kurir
			}
		});
    });
	
$(document).ready(function() {
	$('#kurir').change(function() { // Jika select box id kurir dipilih
		var kurir = $(this).val(); // Ciptakan variabel kurir
		var kota = $('#kota').val(); // Ciptakan variabel kota
		$.ajax({
			type: 'POST', // Metode pengiriman data menggunakan POST
			url: 'tarif.php', // File pemroses data
			data: 'kurir=' + kurir + '&kota=' + kota, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
			success: function(response) { // Jika berhasil
				$('#biaya').val(response); // Berikan hasilnya ke id biaya
			}
		});
    });
	});

});
});
</script>
<script>
function myFunction() {
    var x = document.getElementById("submit");
}
</script>			
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'">'+
		   '<td><input type="hidden" name="no_surat_jalan[]" value="<?php echo $newID; ?>"/>'+
		   '<select id="select_demo_4" class="md-input" data-md-selectize name="bulan[]"><option value="">Select Month.....</option>'+
														'<option value="01">January</option>'+
														'<option value="02">February</option>'+
														'<option value="03">Maret</option>'+
														'<option value="04">April</option>'+
														'<option value="05">May</option>'+
														'<option value="06">June</option>'+
														'<option value="07">July</option>'+
														'<option value="08">August</option>'+
														'<option value="09">September</option>'+
														'<option value="10">October</option>'+
														'<option value="11">November</option>'+
														'<option value="12">December</option>'+
													 '</select></td>'+
		   '<td><input type="text" class="md-input" name="qty[]" placeholder="Quantity Forecst" required /></td>'+
		   '<td align="right"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
		   i--;
      });  
 });  
 
 $(document).ready(function(){  
	$('#submit').click(function(e){
		var date  = document.getElementById("date").value;
		var dataString = 'date'+date;
		$.ajax({  
                url:"modul/forecasting_ppic/forecastingppic.php",  
                method:"POST",  
                data:dataString,  
                success:function(data)  
                {    
				   alert(data);  
				   window.location='?n=forecasting-ppic';
                }  
			});
	 });  
 });  
 </script>
 <script>
 $(document).ready(function() {
    $('#example').dataTable( {
        "scrollX": true
    } );
} );
 </script>