<link rel="stylesheet" href="modul/master/collap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

  
<h4 class='heading_a uk-margin-bottom'>Master Forecasting</h4>
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
      <h3 class='uk-accordion-title uk-accordion-title-primary'>Master Forecasting</h3>
        <div class='uk-accordion-content'>
                                    <p>
			<div class='md-card'>
                <div class='md-card-content large-padding'>
				<?php
				$y = mysqli_query($conn, "select *from masterforecasting where id='$_GET[id]'");
				$p = mysqli_fetch_array($y);
				$aksi = "modul/master/aksi_master_forecasting.php";
				echo"
                    <form id='form_validation' class='uk-form-stacked' method='POST' action=''>
                        <div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-large-1-1'>
							 <label for='gender' class='uk-form-label'>Customer<span class='req'>*</span></label>
                            <select id='select_demo_4' data-md-selectize name='customer'>
                                <option value=''>Select Customer.....</option>";
								
								$q = mysqli_query($sim, "select *from mastercustomer order by Code ASC");
								echo "<table width='100%'>";
								while($r = mysqli_fetch_array($q)){
									if($p['Code']==$r['Code']){
										echo"<option value='$r[Code]|$r[Name]' selected>
											 
												<tr><td>$r[Code]</td>
												<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
												<td>".strtoupper($r[Name])."</td></tr>
											 
										</option>";
									}else{
										echo"<option value='$r[Code]|$r[Name]'>
											 
												<tr><td>$r[Code]</td>
												<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
												<td>".strtoupper($r[Name])."</td></tr>
											 
										</option>";
									}
								}
                              echo"</table>
                            </select>
                            </div>
                        </div>
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-large-1-1'>
							 <label for='gender' class='uk-form-label'>Material<span class='req'>*</span></label>
							 
							 <!-- COLLAPS MATERIAL -->
							 
							 <a class='btn btn-success' data-toggle='collapse' href='#material'>Choose Material</a><br>
							   <div class='row'>
							   <div class='col'>
								<div class='collapse multi-collapse' id='material'>
								  <div class='card card-body'>";
								$m = mysqli_query($sim, "select *from mastermaterial where Type='BJ' AND Name NOT LIKE'%JANGAN DIPAKAI%' order by Name ASC");
								echo "
								<table id='dt_tableExport' class='uk-table' cellspacing='0' width='100%'>
									<thead>
									<tr>
										<th>#</th>
										<th>Code</th>
										<th>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										
									</tr>
									</thead>
									<tbody>";
								while($rm = mysqli_fetch_array($m)){
									echo "
									<tr>
										<td><input type='checkbox' name='matcode[]' value='$rm[Code]'>
										<input type='hidden' name='matname[]' value='$rm[Name]'></td>
										<td>$rm[Code]</td>
										<td>$rm[Name]</td>
									</tr>
									";
								}
						echo"
									</tbody>
									</table>
								  </div>
								</div>
							  </div> 
							  </div>
                            
							<!-- END COLLAPS MATERIAL -->
							
							</div>
                        </div>
						<div class='uk-grid'>
                            <div class='uk-width-1-1'>
                                <p align='right'>";
								if($_GET[m]=='1'){
									echo"<input type='submit' value='Save' name='submit_edit' class='md-btn md-btn-primary'>";
								}else{
									echo"<input type='submit' value='Save' name='submit' class='md-btn md-btn-primary'>";
								}
								echo"</p>
                            </div>
                        </div>						
                    </form>";
					?>
                </div>
            </div>
									<p>
								</div>
                                
                            </div>
                        </div>
                    </div>
			<div class='md-card uk-margin-large-bottom'>
                <div class='md-card-content'>
                    <table id='dt_tableExport' class='uk-table' cellspacing='0' width='100%'>
                        <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Material Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
						<?php
						$em = mysqli_query($conn, "SELECT CustomerCode, CustomerName from mforecastingh group by CustomerCode
												   order by IDForh DESC");
						$i = 1;
						while($e = mysqli_fetch_array($em)){
							$k = substr($e[icon],1);
						echo"
                        <tr>
							<td>".strtoupper($e[CustomerName])."</td>
                            <td>";
							$emm = mysqli_query($conn, "select *from mforecastingh where CustomerCode='$e[CustomerCode]'
												   order by IDForh DESC");
							$i = 1;
							while($en = mysqli_fetch_array($emm)){
								echo "$en[ProductName]<br>";
							}
							
							echo"</td>
                            <td>
							<div class='md-btn-group'>
                                <a href='?n=master-forecasting&m=1&id=$e[IDForh]' class='md-btn md-btn-small md-btn-success md-btn-wave'>Edit</a>
                                <a href='?n=master-forecasting&m=2&id=$e[IDForh]' class='md-btn md-btn-small md-btn-danger md-btn-wave'>Delete</a>
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
										
<?php
$p	=$_GET[n];  $act	=$_GET[act];
include('aksi_master_forecasting.php');
?>