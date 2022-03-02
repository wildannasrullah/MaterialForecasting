<link rel="stylesheet" href="modul/master/collap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

<h4 class='heading_a uk-margin-bottom'>Add Materials</h4>
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
      <h3 class='uk-accordion-title uk-accordion-title-primary'>Add Materials</h3>
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
                            <select id='select_demo_4' data-md-selectize name='customer' disabled='disabled'>
                                <option value=''>Select Customer.....</option>";
								
								$q = mysqli_query($sim, "select *from mastercustomer order by Code ASC");
								echo "<table width='100%'>";
								while($r = mysqli_fetch_array($q)){
									if($_GET['c']==$r['Code']){
										echo"<option value='$r[Code]|$r[Name]' selected >
											 
												<tr><td>$r[Code]</td>
												<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
												<td><b>".strtoupper($r[Name])."</b></td></tr>
											 
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
							 <label for='gender' class='uk-form-label'>Product<span class='req'>*</span></label>
                            <select id='select_demo_4' data-md-selectize name='product' required>
                                ";
								
								$ql = mysqli_query($conn, "select *from mforecastingh where CustomerCode='$_GET[c]'");
								echo "<table width='100%'>";
								while($rl = mysqli_fetch_array($ql)){
									echo "<option>----Choose Product-----</option>";
									if($_GET['p']==$rl['ProductCode']){
										echo"<option value='$rl[IDForh]' selected >
											 
												<tr><td>$rl[ProductCode]</td>
												<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
												<td><b>".strtoupper($rl[ProductName])."</b></td></tr>
											 
										</option>";
									}else{
										echo"<option value='$rl[IDForh]'>
											 
												<tr><td>$rl[ProductCode]</td>
												<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
												<td>".strtoupper($rl[ProductName])."</td></tr>
											 
										</option>";
									}
								}
                              echo"</table>
                            </select>
                            </div>
                        </div>
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-12'>
                                <div class='parsley-row'>
                                    <input type='number' min='1' name='jumlah_up' required class='md-input' placeholder='Enter the amount up for paper material' autofocus */>
                                </div>
                            </div>
                        </div>
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-large-1-1'>
							 <label for='gender' class='uk-form-label'>Materials<span class='req'>*</span></label>
							 
							 <!-- COLLAPS PRODUCT -->
							 
							 <a class='btn btn-success' data-toggle='collapse' href='#material'>Choose Material</a>
							   <div class='row'>
							   <div class='col'>
								<div class='collapse multi-collapse' id='material'>
								
								  <div class='card card-body'>";
								//$m = mysqli_query($sim, "SELECT * FROM mastermaterial m where (Code like 'K.%' OR Name like 'FOIL%') AND Name NOT LIKE'%JANGAN DIPAKAI%' order by Code ASC");
								$m = mysqli_query($sim, "SELECT * FROM mastermaterial m where (Code like 'K.%') AND Name NOT LIKE'%JANGAN DIPAKAI%' order by Code ASC");
								echo "
								<table id='dtVerticalScrollExample' class='table table-striped table-bordered table-sm' width='100%'>
									<thead>
									<tr>
										<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#</th>
										<th width='50%'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th width='50%'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Up&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
									</tr>
									</thead>
									<tbody>";
								while($rm = mysqli_fetch_array($m)){
									
									echo "
									<tr>
										<td><input type='checkbox' name='matcode[]' value='$rm[Code]'></td>
										<td>$rm[Code]</td>
										<td>$rm[Name]</td>
										<td>$rm[JumlahUp]</td>
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
									echo"<input type='submit' value='Save' name='submit_add' class='md-btn md-btn-primary'>";
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
                            <th>Product
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
						$em = mysqli_query($conn, "SELECT IDForh, ProductCode, ProductName,IDForh from mforecastingh where CustomerCode='$_GET[c]' group by ProductCode
												   order by IDForh DESC");
						$i = 1;
						while($e = mysqli_fetch_array($em)){
							$k = substr($e[icon],1);
						echo"
                        <tr>
							<td><a class='btn btn-default' data-toggle='collapse' href='#material$i' style='border: 2px solid #58b4ae; width:100%; text-align:left; font-color:black; font-weight: bold;'>".strtoupper($e[ProductName])."
							</a>
							<div class='collapse multi-collapse' id='material$i'>
								  <div class='card card-body'>";
								  $emm = mysqli_query($conn, "select *from mforecastingd where IDForh='$e[IDForh]'
												   order by IDFord DESC");
								  $emd = mysqli_query($conn, "select *from mforecastingd where IDForh='$e[IDForh]'
												   order by IDFord DESC");
							$j = 1;
							echo "
								 <table id='dt_colVis' class='table table-striped table-bordered table-sm' cellspacing='0' width='100%'>
									<thead>
									<tr>
										<th>No.</th>
										<th>Material Name</th>
										<th>Category</th>
										<th>Up</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									";
									$w = 1;
										while($en = mysqli_fetch_array($emm)){
											echo "
											<tr>
											<td align='center'>$w. </td>
											<td>$en[MaterialName]</td>
											<td>$en[Category]</td>
											<td>$en[JumlahUp]</td>
											<td>
												<div class='md-btn-group'>
													<a href='?n=add_material&act=delete_material&id=$en[IDForh]&c=$_GET[c]&p=$e[ProductCode]&m=$en[MaterialCode]' class='md-btn md-btn-small md-btn-danger md-btn-wave'>Delete</a>
												</div>
											</td>
											</tr>
											";	
											$w++;
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
if($_GET[n]=='add_material' and $_GET[act]=='delete_material'){
	$j = mysqli_query($conn, "SELECT * FROM forecasting_ppic_month m where m.CustomerCode='$_GET[id]' and m.ProductCode='$_GET[p]';");
	$r = mysqli_num_rows($j);
	if($r > 0 ){
		echo"
		<script>
			alert('The product cannot be deleted because there is a calculation transaction.');window.location = '?n=add_material&id=$_GET[id]&c=$_GET[c]&p=$_GET[p]';
		</script>";
	}else{
	mysqli_query($conn, "DELETE FROM mforecastingd where CustomerCode='$_GET[c]' and MaterialCode='$_GET[m]'");
		echo"
		<script>
			alert('Data deleted successfully.');window.location = '?n=add_material&id=$_GET[id]&c=$_GET[c]&p=$_GET[p]';
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