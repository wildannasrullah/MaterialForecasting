<h4 class='heading_a uk-margin-bottom'>Forecast</h4>
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
<h3 class='uk-accordion-title uk-accordion-title-primary'>Form Forecast</h3>
    <div class='uk-accordion-content'>
        <p>
			<div class='md-card'>
                <div class='md-card-content large-padding'>
				<?php
				$y = mysqli_query($conn, "select YEAR(f.deliveryDate) as y, MONTH(f.deliveryDate) as m, DAY(f.deliveryDate) as d, f.* from forecast f where idFor = '$_GET[id]'");
				$p = mysqli_fetch_array($y);
				$aksi = "modul/forecast/aksi_forecast.php";
				if($_GET[m]==1){
					
				echo"
                    <form id='form_validation' class='uk-form-stacked' method='POST' action='$aksi?n=forecast&act=up'>";
				}else{
					
				echo"
                    <form id='form_validation' class='uk-form-stacked' method='POST' action='$aksi?n=forecast&act=in'>";
				}
				echo "
                        <div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-12'>
                                <div class='parsley-row'>
                                    <label for='nik'>Last Sales Order<span class='req'>*</span></label>
                                    <input type='text' name='sod' required class='md-input' value='$p[sod]' autofocus/>
									<input type='hidden' name='id' class='md-input' value='$p[idFor]' />
                                </div>
                            </div>
                        </div>
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-12'>
                                <div class='parsley-row'>
                                    <label for='nik'>Customer<span class='req'>*</span></label>
                                    <input type='text' name='cust' required class='md-input' value='$p[customer]'/>
                                </div>
                            </div>
                        </div>
						
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-2'>
                                <div class='parsley-row'>
                                    <label for='nik'>Quantity Forcast (Qty Forcast Diluar SO Terakhir)<span class='req'>*</span></label>
                                    <input type='text' name='qty_so' required class='md-input' value='$p[qtyFor]' />
                                </div>
                            </div>
                        <div class='uk-width-medium-1-2'>
                                <div class='parsley-row'>
                                    <label for='nik'>Material Code<span class='req'>(Wajib sudah terdaftar di SIM)* </span></label>
                                    <input type='text' name='mat_cod' required class='md-input' value='$p[materialCode]' />
                                </div>
                            </div>
                        </div>
						<div class='uk-margin' data-uk-grid-margin>
                            <div class='uk-width-medium-1-2'>
                                <div class='parsley-row'>
                                    <label for='nik'>Delivery Date<span class='req'>*</span></label>";
									if($_GET[m]==1){
									echo"	
                                    <input class='md-input' type='text' name='del_date' id='uk_dp_1' data-uk-datepicker='{format:yyyy-MM-dd}' value='$p[deliveryDate]' />";
									}else{
									echo"	
                                    <input class='md-input' type='text' name='del_date' id='uk_dp_1' data-uk-datepicker='{format:yyyy-MM-dd}' />";
									}
                                echo"</div>
                            </div>
                        </div>
                        
                        
                        <div class='uk-grid'>
                            <div class='uk-width-1-1'>
                                <p align='right'>";
								echo"<input type='submit' value='Save' name='submit' class='md-btn md-btn-primary'>";
								
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
                    <div class='dt_colVis_buttons'></div>
                    <table id='dt_tableExport' class='uk-table' cellspacing='0' width='100%'>
                        <thead>
                        <tr>
							<th bgcolor='yellow'>ID</th>
                            <th bgcolor='yellow'>Last Sales Order No.</th>
                            <th bgcolor='yellow'>Customer</th>
                            <th bgcolor='yellow'>Qty Forcast</th> 
                            <th bgcolor='yellow'>Material Code</th>
							<th bgcolor='yellow'>Delivery Date</th>
							<th bgcolor='yellow'>Created By</th>
							<th bgcolor='yellow'>Created Date</th>
                            <th bgcolor='yellow'>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                        </tfoot>

                        <tbody>
						<?php
						$i=1;
						$em = mysqli_query($conn, "select *from forecast where status not in ('Finish') order by idFor DESC");
						while($e = mysqli_fetch_array($em)){
						echo"
                        <tr>
                            <td>$i.</td>
							<td width='10%'>$e[sod]</td>
                            <td width='40%'>$e[customer]</td>
                            <td>".ribu($e[qtyFor])."</td>
                            <td>$e[materialCode]</td>
							<td>$e[deliveryDate]</td>
							<td>$e[createdBy]</td>
							<td>$e[createdDate]</td>
                            <td>
							<div class='md-btn-group'>
							";
							if($e[status]=='Open'){
								echo"<a href='?n=forecast&m=1&id=$e[idFor]' class='md-btn md-btn-small md-btn-success md-btn-wave'>Edit</a>
                                ";
								?>
								<a href='<?php echo "$aksi?n=forecast&act=del&id=$e[idFor]";?>' class='md-btn md-btn-small md-btn-danger md-btn-wave' onclick="return confirm('Are you sure to delete this data?');"> Delete</a>
                            <?php
							}else if($e[status]=='In Progress'){
								echo"<a class='md-btn md-btn-small md-btn-success md-btn-wave' disabled=''>In Progress</a>
                                ";
							}
                                
							echo"
							</div>
							</td>
                        </tr>
                        ";
						$i++;
						}
						?>
                        </tbody>
                    </table>
                </div>
            </div>