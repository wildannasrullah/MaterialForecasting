<?php
$aksi = "modul/forecasting_ppic/aksi_forecastingppic.php";
	echo"
	<div class='md-card'>
      <div class='md-card-content'>
		<div class='uk-margin' data-uk-grid-margin>
          <div class='uk-width-medium-1-0'>
            <div class='parsley-row'>
			<form id='form_validation' class='uk-form-stacked' method='POST' action='$aksi?n=forecasting-result&act=report_ppic'>
				<table width='100%' border='0'>
					<tr><td colspan='4'><h2>Report Forecasting PPIC<hr></h2></td><td align='right'>&nbsp;</td></tr>
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
				<p align='right'><button type='submit' name='submit_go' id='submit_go' class='md-btn md-btn-small md-btn-danger md-btn-wave' >SHOW REPORT</button></p>
            </form>    
			</div>
        </div></div>";