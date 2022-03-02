<!-- <h4 class='heading_a uk-margin-bottom'>Forecasting PPIC</h4>
		<div class='md-card'>
            <div class='md-card-content'>
				<p align='right'>
				<button class='md-btn md-btn-success md-btn-wave' data-uk-modal="{target:'#modal_calculate'}">PRINT</button>
				</p>
					<hr />
					 <table id="example" class="display nowrap" style="width:100%"> -->
					 
<h4 class='heading_a uk-margin-bottom'>Report Forecasting - <?php 
$cust = mysqli_query($conn, "select *from mforecastingh where CustomerCode='$_GET[c]'");
$c = mysqli_fetch_array($cust);
echo strtoupper($c[CustomerName]);

?></h4>
    <div class='md-card'>
        <div class='md-card-content'>
			<div class='md-card uk-margin-medium-bottom'>
                <div class='md-card-content'>
                    <div class='dt_colVis_buttons'></div>
                    <table id='example' class="display nowrap" style="width:100%">
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
						 <tr><td  ></td><td ></td><td ></td><td ></td>
						 <td ></td><td ></td><td ></td><td ></td><td ></td></tr>
						<tr><td></td><td><b>TOTAL (PCS)</b></td><td align='right'><b>".($totalFor)."</b></td><td align='right'><b>".($totalForTol)."</b></td>";
							for($h=4; $h<mysqli_num_fields($result); $h++)
							{ 
								echo "<td align=right><b>".($totForMat[$h])."</b></td>";
								$totfor[$h] = $totForMat[$h];
							} 
						 echo"</tr>";
						  //JUMLAH UP TIAP KERTAS
						  echo "<tr><td></td><td><b>JUMLAH UP</b></td><td></td><td></td>";
						 
							for($h=4; $h<mysqli_num_fields($result); $h++)
							{ 
								
									echo "<td align=right><b>$jum_up[$h]</b></td>";
								
									$ju[$h]=$jum_up[$h];
						  }
						 echo"</tr>";
						 //TOTAL KEBUTUHAN
						  echo "<tr><td></td><td><b>TOTAL KEBUTUHAN (REAM)</b></td><td></td><td></td>";
							for($h=4; $h<mysqli_num_fields($result); $h++)
							{ 
								$kebutuhan[$h] = (($totfor[$h]/$ju[$h])/500);
								echo "<td align=right><b>".round($kebutuhan[$h],3)."</b></td>";
							} 
						 echo"</tr>";
						 //WAREHOUSE
						  echo "<tr><td bgcolor='yellow'></td><td bgcolor='yellow'><b>WAREHOUSE</b></td><td bgcolor='yellow'><b>(REAM)</b></td><td bgcolor='yellow'></td>";
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
						  echo "<tr><td bgcolor='yellow'>&nbsp;</td><td bgcolor='yellow'></td><td bgcolor='yellow'><b>(PCS)</b><td bgcolor='yellow'></td></td>";
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
								 echo '<td></td><td align=right><font color="red"><b>'.$row[3].'</b></font></td><td></td><td></td>';
								for($j=4; $j<(mysqli_num_fields($polist)); $j++)
								{ 
									echo '<td align=right><b>'.round($row[$j],4).'</b></td>';
									
									//$totMat = $row[$j];
									$totForMat[$j] += $row[$j];
									$nilai[$j]=$row[$j];
								} 
								echo "</tr>";
								 echo "<tr>";
								 echo '<td></td><td align=right><font color="red"><b>&nbsp;</b></font></td><td></td><td></td>';
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
							 <tr><td  ></td><td ></td><td ></td><td ></td>
							 <td ></td><td ></td><td ></td><td ></td><td ></td></tr>
							 <tr><td></td><td><b>MINUS PAPER</b></td><td><b>(PCS)</b></td><td></td>";
								for($h=4; $h<mysqli_num_fields($result); $h++)
								{ 
									$minus[$h]=$totfor[$h]-$warehouse[$h]-$outstanding[$h];
									echo "<td align=right><b>".(round(($minus[$h]),3))."</b></td>";
								} 
							 echo"</tr>";
							 
							 //REAM
							 echo "
							 <tr><td></td><td></td><td><b>(REAM)</b></td><td></td>";
								for($h=4; $h<mysqli_num_fields($result); $h++)
								{ 
									$minus[$h]=$totfor[$h]-$warehouse[$h]-$outstanding[$h];
									echo "<td align=right><b>".(($minus[$h]/$ju[$h])/500)."</b></td>";
								} 
							 echo"</tr>";
							 
							 //TON
							 echo "
							 <tr><td></td><td></td><td><b>(TON)</b></td><td></td>";
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
    $('#example').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
} );
 </script>
 <style>
 table.dataTable{width:100%;margin:0 auto;clear:both;border-collapse:separate;border-spacing:0}table.dataTable thead th,table.dataTable tfoot th{font-weight:bold}table.dataTable thead th,table.dataTable thead td{padding:10px 18px;border-bottom:1px solid #111}table.dataTable thead th:active,table.dataTable thead td:active{outline:none}table.dataTable tfoot th,table.dataTable tfoot td{padding:10px 18px 6px 18px;border-top:1px solid #111}table.dataTable thead .sorting,table.dataTable thead .sorting_asc,table.dataTable thead .sorting_desc,table.dataTable thead .sorting_asc_disabled,table.dataTable thead .sorting_desc_disabled{cursor:pointer;*cursor:hand;background-repeat:no-repeat;background-position:center right}table.dataTable thead .sorting{background-image:url("../images/sort_both.png")}table.dataTable thead .sorting_asc{background-image:url("../images/sort_asc.png")}table.dataTable thead .sorting_desc{background-image:url("../images/sort_desc.png")}table.dataTable thead .sorting_asc_disabled{background-image:url("../images/sort_asc_disabled.png")}table.dataTable thead .sorting_desc_disabled{background-image:url("../images/sort_desc_disabled.png")}table.dataTable tbody tr{background-color:#ffffff}table.dataTable tbody tr.selected{background-color:#B0BED9}table.dataTable tbody th,table.dataTable tbody td{padding:8px 10px}table.dataTable.row-border tbody th,table.dataTable.row-border tbody td,table.dataTable.display tbody th,table.dataTable.display tbody td{border-top:1px solid #ddd}table.dataTable.row-border tbody tr:first-child th,table.dataTable.row-border tbody tr:first-child td,table.dataTable.display tbody tr:first-child th,table.dataTable.display tbody tr:first-child td{border-top:none}table.dataTable.cell-border tbody th,table.dataTable.cell-border tbody td{border-top:1px solid #ddd;border-right:1px solid #ddd}table.dataTable.cell-border tbody tr th:first-child,table.dataTable.cell-border tbody tr td:first-child{border-left:1px solid #ddd}table.dataTable.cell-border tbody tr:first-child th,table.dataTable.cell-border tbody tr:first-child td{border-top:none}table.dataTable.stripe tbody tr.odd,table.dataTable.display tbody tr.odd{background-color:#f9f9f9}table.dataTable.stripe tbody tr.odd.selected,table.dataTable.display tbody tr.odd.selected{background-color:#acbad4}table.dataTable.hover tbody tr:hover,table.dataTable.display tbody tr:hover{background-color:#f6f6f6}table.dataTable.hover tbody tr:hover.selected,table.dataTable.display tbody tr:hover.selected{background-color:#aab7d1}table.dataTable.order-column tbody tr>.sorting_1,table.dataTable.order-column tbody tr>.sorting_2,table.dataTable.order-column tbody tr>.sorting_3,table.dataTable.display tbody tr>.sorting_1,table.dataTable.display tbody tr>.sorting_2,table.dataTable.display tbody tr>.sorting_3{background-color:#fafafa}table.dataTable.order-column tbody tr.selected>.sorting_1,table.dataTable.order-column tbody tr.selected>.sorting_2,table.dataTable.order-column tbody tr.selected>.sorting_3,table.dataTable.display tbody tr.selected>.sorting_1,table.dataTable.display tbody tr.selected>.sorting_2,table.dataTable.display tbody tr.selected>.sorting_3{background-color:#acbad5}table.dataTable.display tbody tr.odd>.sorting_1,table.dataTable.order-column.stripe tbody tr.odd>.sorting_1{background-color:#f1f1f1}table.dataTable.display tbody tr.odd>.sorting_2,table.dataTable.order-column.stripe tbody tr.odd>.sorting_2{background-color:#f3f3f3}table.dataTable.display tbody tr.odd>.sorting_3,table.dataTable.order-column.stripe tbody tr.odd>.sorting_3{background-color:whitesmoke}table.dataTable.display tbody tr.odd.selected>.sorting_1,table.dataTable.order-column.stripe tbody tr.odd.selected>.sorting_1{background-color:#a6b4cd}table.dataTable.display tbody tr.odd.selected>.sorting_2,table.dataTable.order-column.stripe tbody tr.odd.selected>.sorting_2{background-color:#a8b5cf}table.dataTable.display tbody tr.odd.selected>.sorting_3,table.dataTable.order-column.stripe tbody tr.odd.selected>.sorting_3{background-color:#a9b7d1}table.dataTable.display tbody tr.even>.sorting_1,table.dataTable.order-column.stripe tbody tr.even>.sorting_1{background-color:#fafafa}table.dataTable.display tbody tr.even>.sorting_2,table.dataTable.order-column.stripe tbody tr.even>.sorting_2{background-color:#fcfcfc}table.dataTable.display tbody tr.even>.sorting_3,table.dataTable.order-column.stripe tbody tr.even>.sorting_3{background-color:#fefefe}table.dataTable.display tbody tr.even.selected>.sorting_1,table.dataTable.order-column.stripe tbody tr.even.selected>.sorting_1{background-color:#acbad5}table.dataTable.display tbody tr.even.selected>.sorting_2,table.dataTable.order-column.stripe tbody tr.even.selected>.sorting_2{background-color:#aebcd6}table.dataTable.display tbody tr.even.selected>.sorting_3,table.dataTable.order-column.stripe tbody tr.even.selected>.sorting_3{background-color:#afbdd8}table.dataTable.display tbody tr:hover>.sorting_1,table.dataTable.order-column.hover tbody tr:hover>.sorting_1{background-color:#eaeaea}table.dataTable.display tbody tr:hover>.sorting_2,table.dataTable.order-column.hover tbody tr:hover>.sorting_2{background-color:#ececec}table.dataTable.display tbody tr:hover>.sorting_3,table.dataTable.order-column.hover tbody tr:hover>.sorting_3{background-color:#efefef}table.dataTable.display tbody tr:hover.selected>.sorting_1,table.dataTable.order-column.hover tbody tr:hover.selected>.sorting_1{background-color:#a2aec7}table.dataTable.display tbody tr:hover.selected>.sorting_2,table.dataTable.order-column.hover tbody tr:hover.selected>.sorting_2{background-color:#a3b0c9}table.dataTable.display tbody tr:hover.selected>.sorting_3,table.dataTable.order-column.hover tbody tr:hover.selected>.sorting_3{background-color:#a5b2cb}table.dataTable.no-footer{border-bottom:1px solid #111}table.dataTable.nowrap th,table.dataTable.nowrap td{white-space:nowrap}table.dataTable.compact thead th,table.dataTable.compact thead td{padding:4px 17px}table.dataTable.compact tfoot th,table.dataTable.compact tfoot td{padding:4px}table.dataTable.compact tbody th,table.dataTable.compact tbody td{padding:4px}table.dataTable th.dt-left,table.dataTable td.dt-left{text-align:left}table.dataTable th.dt-center,table.dataTable td.dt-center,table.dataTable td.dataTables_empty{text-align:center}table.dataTable th.dt-right,table.dataTable td.dt-right{text-align:right}table.dataTable th.dt-justify,table.dataTable td.dt-justify{text-align:justify}table.dataTable th.dt-nowrap,table.dataTable td.dt-nowrap{white-space:nowrap}table.dataTable thead th.dt-head-left,table.dataTable thead td.dt-head-left,table.dataTable tfoot th.dt-head-left,table.dataTable tfoot td.dt-head-left{text-align:left}table.dataTable thead th.dt-head-center,table.dataTable thead td.dt-head-center,table.dataTable tfoot th.dt-head-center,table.dataTable tfoot td.dt-head-center{text-align:center}table.dataTable thead th.dt-head-right,table.dataTable thead td.dt-head-right,table.dataTable tfoot th.dt-head-right,table.dataTable tfoot td.dt-head-right{text-align:right}table.dataTable thead th.dt-head-justify,table.dataTable thead td.dt-head-justify,table.dataTable tfoot th.dt-head-justify,table.dataTable tfoot td.dt-head-justify{text-align:justify}table.dataTable thead th.dt-head-nowrap,table.dataTable thead td.dt-head-nowrap,table.dataTable tfoot th.dt-head-nowrap,table.dataTable tfoot td.dt-head-nowrap{white-space:nowrap}table.dataTable tbody th.dt-body-left,table.dataTable tbody td.dt-body-left{text-align:left}table.dataTable tbody th.dt-body-center,table.dataTable tbody td.dt-body-center{text-align:center}table.dataTable tbody th.dt-body-right,table.dataTable tbody td.dt-body-right{text-align:right}table.dataTable tbody th.dt-body-justify,table.dataTable tbody td.dt-body-justify{text-align:justify}table.dataTable tbody th.dt-body-nowrap,table.dataTable tbody td.dt-body-nowrap{white-space:nowrap}table.dataTable,table.dataTable th,table.dataTable td{box-sizing:content-box}.dataTables_wrapper{position:relative;clear:both;*zoom:1;zoom:1}.dataTables_wrapper .dataTables_length{float:left}.dataTables_wrapper .dataTables_filter{float:right;text-align:right}.dataTables_wrapper .dataTables_filter input{margin-left:0.5em}.dataTables_wrapper .dataTables_info{clear:both;float:left;padding-top:0.755em}.dataTables_wrapper .dataTables_paginate{float:right;text-align:right;padding-top:0.25em}.dataTables_wrapper .dataTables_paginate .paginate_button{box-sizing:border-box;display:inline-block;min-width:1.5em;padding:0.5em 1em;margin-left:2px;text-align:center;text-decoration:none !important;cursor:pointer;*cursor:hand;color:#333 !important;border:1px solid transparent;border-radius:2px}.dataTables_wrapper .dataTables_paginate .paginate_button.current,.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{color:#333 !important;border:1px solid #979797;background-color:white;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #dcdcdc));background:-webkit-linear-gradient(top, #fff 0%, #dcdcdc 100%);background:-moz-linear-gradient(top, #fff 0%, #dcdcdc 100%);background:-ms-linear-gradient(top, #fff 0%, #dcdcdc 100%);background:-o-linear-gradient(top, #fff 0%, #dcdcdc 100%);background:linear-gradient(to bottom, #fff 0%, #dcdcdc 100%)}.dataTables_wrapper .dataTables_paginate .paginate_button.disabled,.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active{cursor:default;color:#666 !important;border:1px solid transparent;background:transparent;box-shadow:none}.dataTables_wrapper .dataTables_paginate .paginate_button:hover{color:white !important;border:1px solid #111;background-color:#585858;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111));background:-webkit-linear-gradient(top, #585858 0%, #111 100%);background:-moz-linear-gradient(top, #585858 0%, #111 100%);background:-ms-linear-gradient(top, #585858 0%, #111 100%);background:-o-linear-gradient(top, #585858 0%, #111 100%);background:linear-gradient(to bottom, #585858 0%, #111 100%)}.dataTables_wrapper .dataTables_paginate .paginate_button:active{outline:none;background-color:#2b2b2b;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #2b2b2b), color-stop(100%, #0c0c0c));background:-webkit-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);background:-moz-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);background:-ms-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);background:-o-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);background:linear-gradient(to bottom, #2b2b2b 0%, #0c0c0c 100%);box-shadow:inset 0 0 3px #111}.dataTables_wrapper .dataTables_paginate .ellipsis{padding:0 1em}.dataTables_wrapper .dataTables_processing{position:absolute;top:50%;left:50%;width:100%;height:40px;margin-left:-50%;margin-top:-25px;padding-top:20px;text-align:center;font-size:1.2em;background-color:white;background:-webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255,255,255,0)), color-stop(25%, rgba(255,255,255,0.9)), color-stop(75%, rgba(255,255,255,0.9)), color-stop(100%, rgba(255,255,255,0)));background:-webkit-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);background:-moz-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);background:-ms-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);background:-o-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);background:linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%)}.dataTables_wrapper .dataTables_length,.dataTables_wrapper .dataTables_filter,.dataTables_wrapper .dataTables_info,.dataTables_wrapper .dataTables_processing,.dataTables_wrapper .dataTables_paginate{color:#333}.dataTables_wrapper .dataTables_scroll{clear:both}.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody{*margin-top:-1px;-webkit-overflow-scrolling:touch}.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>th,.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>td,.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>th,.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>td{vertical-align:middle}.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>th>div.dataTables_sizing,.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>td>div.dataTables_sizing,.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>th>div.dataTables_sizing,.dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>td>div.dataTables_sizing{height:0;overflow:hidden;margin:0 !important;padding:0 !important}.dataTables_wrapper.no-footer .dataTables_scrollBody{border-bottom:1px solid #111}.dataTables_wrapper.no-footer div.dataTables_scrollHead table.dataTable,.dataTables_wrapper.no-footer div.dataTables_scrollBody>table{border-bottom:none}.dataTables_wrapper:after{visibility:hidden;display:block;content:"";clear:both;height:0}@media screen and (max-width: 767px){.dataTables_wrapper .dataTables_info,.dataTables_wrapper .dataTables_paginate{float:none;text-align:center}.dataTables_wrapper .dataTables_paginate{margin-top:0.5em}}@media screen and (max-width: 640px){.dataTables_wrapper .dataTables_length,.dataTables_wrapper .dataTables_filter{float:none;text-align:center}.dataTables_wrapper .dataTables_filter{margin-top:0.5em}}
 </style>