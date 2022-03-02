<link rel="stylesheet" href="modul/master/collap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "19K23O15P";
$db = "report_forecast";

$serversim = "192.168.88.88";
$usernamesim = "root";
$passwordsim = "19K23O15P";
$dbsim = "sim_krisanthium";

$conn = mysqli_connect($servername, $username, $password,$db);
$sim = mysqli_connect($serversim, $usernamesim, $passwordsim, $dbsim);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
if (!$sim) {
 die("SIM Connection failed: " . mysqli_connect_error());
}
?>
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
								<table id='dtVerticalScrollExample' class='table table-striped table-bordered table-sm' cellspacing='0' width='100%'>
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
										<td><input type='checkbox' name='prodcode[]' value='$rm[Code]'>
										<input type='hidden' name='prodname[]' value='$rm[Name]'></td>
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
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-large-1-1'>
							 <label for='gender' class='uk-form-label'>Material<span class='req'>*</span></label>
							 
							 <!-- COLLAPS MATERIAL -->
							 
							 <a class='btn btn-success' data-toggle='collapse' href='#matecode'>Choose Material of Product</a><br>
							   <div class='row'>
							   <div class='col'>
								<div class='collapse multi-collapse' id='matecode'>
								  <div class='card card-body'>";
								$m2 = mysqli_query($sim, "SELECT * FROM mastermaterial m where (Code like 'K.%' OR Code like 'BP.%') AND Name NOT LIKE'%JANGAN DIPAKAI%' order by Code ASC");
								echo "
								<table id='dt_colVis' class='uk-table' cellspacing='0' width='100%'>
									<thead>
									<tr>
										<th>#</th>
										<th>Code</th>
										<th>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										
									</tr>
									</thead>
									<tbody>";
								while($rm2 = mysqli_fetch_array($m2)){
									echo "
									<tr>
										<td><input type='checkbox' name='matcode[]' value='$rm2[Code]'>
										<input type='hidden' name='matname[]' value='$rm2[Name]'></td>
										<td>$rm2[Code]</td>
										<td>$rm2[Name]</td>
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
                            
							<!-- END COLLAPS PRODUCT -->
							
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
});
$('.dataTables_length').addClass('bs-select');
});
</script>