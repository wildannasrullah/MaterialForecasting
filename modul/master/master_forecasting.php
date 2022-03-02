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
							 <label for='gender' class='uk-form-label'>Products<span class='req'>*</span></label>
							 
							 <!-- COLLAPS PRODUCT -->
							 
							 <a class='btn btn-success' data-toggle='collapse' href='#material'>Choose Product of Customer</a><br>
							   <div class='row'>
							   <div class='col'>
								<div class='collapse multi-collapse' id='material'>
								  <div class='card card-body'>";
								$m = mysqli_query($sim, "select *from mastermaterial where Type='BJ' AND Name NOT LIKE'%JANGAN DIPAKAI%' order by Name ASC");
								echo "
								<table id='dtVerticalScrollExample' class='table table-striped table-bordered table-sm' width='100%'>
									<thead>
									<tr>
										<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#</th>
										<th width='50%'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										
									</tr>
									</thead>
									<tbody>";
								while($rm = mysqli_fetch_array($m)){
									echo "
									<tr>
										<td><input type='checkbox' name='prodcode[]' value='$rm[Code]'></td>
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
                    <table id='dt_colVis' class='uk-table' cellspacing='0' width='100%'>
                        <thead>
                        <tr>
                            <th>Customer
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</th>
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
							<td><a class='btn btn-default' data-toggle='collapse' href='#material$i' style='border: 2px solid #58b4ae; width:100%; text-align:left; font-color:black; font-weight: bold;'>".strtoupper($e[CustomerName])."
							</a>
							<div class='collapse multi-collapse' id='material$i'>
								  <div class='card card-body'>";
								  $emm = mysqli_query($conn, "select *from mforecastingh where CustomerCode='$e[CustomerCode]'
												   order by IDForh DESC");
								  $emd = mysqli_query($conn, "select *from mforecastingd where CustomerCode='$e[CustomerCode]'
												   order by IDFord DESC");
							$j = 1;
							echo "
								 <table id='dt_colVis' class='table table-striped table-bordered table-sm' cellspacing='0' width='100%'>
									<thead>
									<tr>
										<th>No.</th>
										<th>Product Name</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									";
									$i = 1;
										while($en = mysqli_fetch_array($emm)){
											echo "
											<tr>
											<td align='center'>$i. </td>
											<td>$en[ProductName]</td>
											<td>
												<div class='md-btn-group'>
													<a href='?n=add_material&id=$en[IDForh]&c=$en[CustomerCode]&p=$en[ProductCode]' class='md-btn md-btn-small md-btn-success md-btn-wave'>Add Materials</a>
													<a href='?n=master-forecasting&act=delete&id=$en[CustomerCode]&p=$en[ProductCode]&for=$en[IDForh]' class='md-btn md-btn-small md-btn-danger md-btn-wave'>Delete</a>
												</div>
											</td>
											</tr>
											";	
											$i++;
										}
							echo"	
									</tbody>
									</table>
								 </div>
							</div>
							</td>
                            <td>
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
if($_GET[n]=='master-forecasting' and $_GET[act]=='delete'){
	$j = mysqli_query($conn, "SELECT * FROM mforecastingh m left join mforecastingd n on m.IDForh=n.IDForh where m.CustomerCode='$_GET[id]' and m.IDForh='$_GET[for]';");
	$r = mysqli_num_rows($j);
	if($r > 0 ){
		echo"
		<script>
			alert('The product cannot be removed because it contains raw materials.');window.location = '?n=master-forecasting';
		</script>";
	}else{
	mysqli_query($conn, "DELETE FROM mforecastingh WHERE CustomerCode = '$_GET[id]' AND ProductCode = '$_GET[p]'");
		echo"
		<script>
			alert('Data deleted successfully.');window.location = '?n=master-forecasting';
		</script>";
	}
	
}			
			
							

$p	=$_GET[n];  $act	=$_GET[act];
include('aksi_master_forecasting.php');
?>
<style>
table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}
</style>

  <script>
	$(document).ready(function () {
		$('#dtVerticalScrollExample').DataTable({
			"scrollY": "200px",
			"scrollCollapse": true,
			"paging":false,
			"info":false,
			"ordering": true
		});
		$('.dataTables_length').addClass('bs-select');
	});
</script>