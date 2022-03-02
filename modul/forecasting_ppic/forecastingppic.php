<h4 class='heading_a uk-margin-bottom'>Forecasting PPIC</h4>
            <div class='md-card'>
                        <div class='md-card-content'>
						<?php
						if($_GET[m]==1){
							echo"<div class='uk-accordion' data-uk-accordion='{showfirst: false}' data-accordion-section-open='1'>";
						}
						else{
                            echo"<div class='uk-accordion' data-uk-accordion='{showfirst: false}' data-accordion-section-open='2'>";
						}


						?>
<h3 class='uk-accordion-title uk-accordion-title-primary'>Forecasting PPIC</h3>
    <div class='uk-accordion-content'>
        <p>
			<div class='md-card'>
                <div class='md-card-content large-padding'>
				<?php
				$y = mysqli_query($conn, "select YEAR(f.deliveryDate) as y, MONTH(f.deliveryDate) as m, DAY(f.deliveryDate) as d, f.* from forecast f where idFor = '$_GET[id]'");
				$p = mysqli_fetch_array($y);
				$aksi = "modul/forecasting_ppic/aksi_forecastingppic.php";
				
				echo"
					<form id='form_validation' class='uk-form-stacked' method='POST' action='$aksi?n=forecasting-ppic&act=bulan'>
                     <div class='uk-margin' data-uk-grid-margin>
                            <div class='uk-width-medium-1-2'>
                                <div class='parsley-row'>
                                    <label for='nik'>Date<span class='req'>*</span></label>	
                                    <input class='md-input' type='text' name='date' id='uk_dp_1' data-uk-datepicker='{format:yyyy-MM-dd}' value='".date('Y-m-d')."'/>
								</div>
                            </div>
                        </div>
					  <div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-large-1-1'>
							 <label for='gender' class='uk-form-label'>Customer<span class='req'>*</span></label>";?>
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
						 <div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-large-1-1'>
							 <label for='gender' class='uk-form-label'>Product<span class='req'>*</span></label>";?>
                            <select name="kota" id="kota" class='md-input' >
								<option selected>- Choose Product -</option>
							</select>
								<?php
								echo"
                            </div>
                        </div>
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-2'>
                                <div class='parsley-row'>
                                    ";
									?>
									
									<label for='gender' class='uk-form-label'>Period (Month)<span class='req'>*</span></label>
										
										<p align='right'><button type="button" name="add" id="add" class='md-btn md-btn-small md-btn-success md-btn-wave'>Add Month</button></p>
										<div class="text">  
										   <table class="table table-bordered" id="dynamic_field" width='100%'>  
										   <thead>
													<tr>
														<th nowrap>Month.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
														<th nowrap>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quantity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
													</tr>
												</thead>
												<tbody>
												<tr>  
												   <td>
													 <select id='select_demo_4' data-md-selectize name='bulan[]'>
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
													 </select></td>
													<td><input type="text" class='md-input' name="qty[]" placeholder="Quantity Forecast" required /></td>
													</tr> 
												</tbody>									
										   </table>  
									  </div>
									</div>						  
								 
									<?php
									echo"
                            </div>
                        </div>
						<div class='uk-margin' data-uk-grid-margin>
                            <div class='uk-width-medium-1-2'>
                                <div class='parsley-row'>
                                    <label for='nik'>Tolerance<span class='req'>*</span></label>	
                                    <input class='md-input' type='text' name='tol' value='1.05' readonly='readonly' />
								</div>
                            </div>
                        </div>
                        <div class='uk-margin' data-uk-grid-margin>
                            <div class='uk-width-medium-1-2'>
								<div class='parsley-row'>
                                    <label for='nik'>Category<span class='req'>*</span></label> &nbsp;&nbsp;&nbsp;&nbsp;
									<input type='radio' name='kategori' value='Paper'> &nbsp;&nbsp;<b>Paper</b> &nbsp;&nbsp;&nbsp;&nbsp; 
									<!-- <input type='radio' name='kategori' value='Foil'> &nbsp;&nbsp;<b>Foil</b> -->
								</div>
                            </div>
                        </div>
                        
                        <div class='uk-grid'>
                            <div class='uk-width-1-1'>
                                <p align='right'>";?>
									<button type='submit' name='submit' id='submit' class='md-btn md-btn-small md-btn-danger md-btn-wave' >Save</button>
								<?php
								echo"</p>
                            </div>
                        </div>
						</form>
					<hr>
				<table border='0' width='100%'>
				<tr><td width='15%'><font size='2'>Created By</font></td><td  width='1%'>&nbsp;:</td><td>&nbsp;$p[createdBy]</td></tr>
				<tr><td><font size='2'>Created Date</font></td><td>&nbsp;:</td><td>&nbsp;$p[createdDate]</td></tr>
				<tr><td><font size='2'>Changed By</font></td><td>&nbsp;:</td><td>&nbsp;$p[changedBy]</td></tr>
				<tr><td><font size='2'>Changed Date</font></td><td>&nbsp;:</td><td>&nbsp;$p[changedDate]</td></tr>
				</table>
					";
					?>
                </div>
            </div>
									<p>
								</div>
                                
                            </div>
                        </div>
                    </div>
			<div class='md-card uk-margin-medium-bottom'>
                <div class='md-card-content'>
				<p align='right'>
				<button class='md-btn md-btn-danger md-btn-wave' data-uk-modal="{target:'#modal_calculate'}">CALCULATE</button>
				</p>
					<hr />
						
                    <table id='dt_colVis' cellspacing='0' width='100%' border='1'>
                        <thead>
                        <tr>
							<th bgcolor='yellow'>No.</th>
                            <th bgcolor='yellow'>Customer</th>
                            <th bgcolor='yellow'>Product</th> 
                            <th bgcolor='yellow'>Period</th>
							 <th bgcolor='yellow'>Category</th>
							<th bgcolor='yellow'>Qty</th>
							<th bgcolor='yellow'>Total Qty</th>
							<th bgcolor='yellow'>Total Qty + Tol</th>
							<th bgcolor='yellow'>#</th>
						</tr>
                        </thead>

                        <tfoot>
                        </tfoot>

                        <tbody>
						<?php
						$i=1;
						$em = mysqli_query($conn, "SELECT * FROM forecasting_ppic_month order by date, ProductCode desc");
						while($e = mysqli_fetch_array($em)){
							$o = mysqli_query($conn, "select *from mforecastingh where ProductCode='$e[ProductCode]'");
							$t = mysqli_fetch_array($o);
							
							//Cek banyak baris
							$k = mysqli_query($conn, "SELECT * FROM forecasting_ppic_month f where productcode='$t[ProductCode]' and customercode='$t[CustomerCode]'");
							$kk = mysqli_num_rows($k);
							
							//Total Qty
							$tq = mysqli_query($conn, "SELECT SUM(qty) as totalqty, toleransi FROM forecasting_ppic_month f where productcode='$t[ProductCode]' and customercode='$t[CustomerCode]'");
							$tqty = mysqli_fetch_array($tq);
						echo"
                        <tr>
                            <td align='center'>$i. </td>
							<td width='25%'>$t[CustomerName]</td>
                            <td align='left'>($t[ProductCode]) - $t[ProductName]</td>
                            <td align='center'>$e[bulan]</td>
							<td align='center'>$e[categoryMt]</td>
							<td align='right'>".ribu($e[qty])."</td>
							<td align='right'>".ribu($tqty[totalqty])."</td>
							<td align='right'>".ribu($tqty[totalqty]*$tqty[toleransi])."</td>
							<td align='center' ><a href='?n=forecasting-ppic&act=delete&id=$e[CustomerCode]&p=$en[ProductCode]&for=$t[IDForh]&ppc=$e[idppic]'><font color='red'><b> X </b></font></a></td>
                        </tr>
                        ";
						$i++;
						}
						?>
                        </tbody>
                    </table>
                </div>
            </div>
	<?php
	echo"
		<div class='uk-modal' id='modal_calculate'>
            <div class='uk-modal-dialog'>
			<form id='form_validation' class='uk-form-stacked' method='POST' action='$aksi?n=forecasting-ppic&act=calculate'>
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
					<tr><td width='30%'>Category</td><td width='2%'>:</td><td colspan='3'>
                     <div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-large-1-1'>
							<input type='radio' name='kategori' value='Paper'><b>Paper</b> &nbsp;&nbsp;&nbsp;&nbsp; 
							<!-- <input type='radio' name='kategori' value='Foil'><b>Foil</b> -->
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
		
	if($_GET[n]=='forecasting-ppic' and $_GET[act]=='delete'){
	
		mysqli_query($conne, "DELETE FROM forecasting_ppic_month WHERE idppic = '$_GET[ppc]'");
		echo"
		<script>
			alert('Data deleted successfully.');window.location = '?n=forecasting-ppic';
		</script>";
	}
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