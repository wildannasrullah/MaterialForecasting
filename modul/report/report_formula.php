<?php
switch($_GET[act]){
default:
?>
<h4 class='heading_a uk-margin-bottom'>Report Forecast</h4>
            <div class='md-card'>
                        <div class='md-card-content'>
						

			<div class='md-card uk-margin-medium-bottom'>
                <div class='md-card-content'>
                    <div class='dt_colVis_buttons'></div>
                    <table id='dt_tableExport' class='uk-table' cellspacing='0' width='100%'>
                        <thead>
                        <tr>
							<th bgcolor='yellow'>ID</th>
                            <th bgcolor='yellow'>Sales Order No.</th>
                            <th bgcolor='yellow'>Customer</th>
                            <th bgcolor='yellow'>Qty SO</th> 
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
						$em = mysqli_query($conn, "select *from forecast e order by idFor DESC");
						while($e = mysqli_fetch_array($em)){
						echo"
                        <tr>
                            <td>$i.</td>
							<td width='10%'<b><u><a href='?n=formula&act=generate&id=$e[idFor]&matcode=$e[materialCode]&d=1' title='Klik for showing detail'>$e[sod]</a></u></b></td>
                            <td width='40%'>$e[customer]</td>
                            <td>".ribu($e[qtyFor])."</td>
                            <td>$e[materialCode]</td>
							<td>$e[deliveryDate]</td>
							<td>$e[createdBy]</td>
							<td>$e[createdDate]</td>
                            <td>
							<b>$e[status]</b>
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
break;
case "detail":
$calculate = "modul/formula/calculate.php";
$fcal = mysqli_query($conn, "select distinct component, componentName, hasilAkhir, unitComp from formula_calculate where component = '$_GET[comp]';");

$boc = mysqli_query($sim, "select *from  masterbomh h left join masterbomd d on h.formula=d.formula where h.formula = '$_GET[comp]';");
$bom = mysqli_query($sim, "select *from masterbomh where formula like '%$_GET[matcode]%';");
$bom2 = mysqli_query($sim, "select *from masterbomh where formula = '$_GET[comp]';");
$si = mysqli_query($sim, "select *from mastermaterial where code = '$_GET[matcode]';");
$sim = mysqli_fetch_array($si);

echo " <div class='md-card'>
      <div class='md-card-content'>
	<div class='uk-grid' data-uk-grid-margin>
		<div class='uk-width-xlarge-1-2'>
                    <h3 class='heading_a uk-margin-bottom'>$_GET[matcode] - $sim[Name]</h3>
                    <div class='md-card-list-wrapper'>
                        <div class='md-card-list'>
                            <ul class='hierarchical_slide' id='hierarchical-slide'>";
							while($b = mysqli_fetch_array($bom)){
                                echo"<li><a href='?n=report-formula&act=detail&id=$_GET[id]&matcode=$_GET[matcode]&comp=$b[Formula]'>";
									if($_GET[comp]==$b[Formula]){
										echo"<button type='button' title='Klik for showing component' style='background-color: yellow;border: none;overflow: hidden;outline:none; text-align:left; width:100%;'>";
									}else{
										echo"<button type='button' title='Klik for showing component' style='background-color: transparent;border: none;overflow: hidden;outline:none; text-align:left; width:100%;'>";
									}
									echo"
									<b>$b[Formula]</b></button>
									</a>
								</li>";
							}
							echo"
                            </ul>
                        </div>
                    </div>
        </div>
		<div class='uk-width-xlarge-1-2'>
                    <h3 class='heading_a uk-margin-bottom'>Component - $_GET[comp]</h3>
                    <div class='md-card-list-wrapper'>
                        <div class='md-card-list'>
						<form method='POST' action='$calculate?n=formula&act=in&id=$_GET[id]&matcode=$_GET[matcode]&comp=$_GET[comp]'>
                            <ul class='hierarchical_slide' id='hierarchical-slide'>
							<li>
							<table border='0' width='100%'>";
							$b2 = mysqli_fetch_array($bom2);
							echo"<tr><th>Material Code</th><th>Unit</th><th>Qty Target</th></tr>
							";
							echo"<tr><td>$b2[MaterialCode]</td><td>$b2[Unit]</td><td>$b2[Qty]
							<input type='hidden' value='$b2[Qty]' name='qty_target'>
							</td></tr>
							";
							echo"<tr><th colspan='3'>&nbsp;</th></tr>
							";
							echo"<tr><th colspan='3'><u>*Component :</u><br><br></th></tr>
							";
							echo"<tr><th>Material Code</th><th>Unit</th><th>Qty</th></tr>
							";
							while($c = mysqli_fetch_array($boc)){
                                echo"
								<tr><td>
									<b>$c[MaterialCode]</b>
								</td><td>$c[Unit]</td><td>$c[Qty]</td></tr>
								<input type='hidden' name='materialcomp[]' value='$c[MaterialCode]'>
								<input type='hidden' name='unit[]' value='$c[Unit]'>
								<input type='hidden' name='qtyc[]' value='$c[Qty]'>
								";
								
							$tot = mysqli_num_rows($boc);
							}
							$tot2 += $tot;
							echo"
								</table>
								";
								if($_GET[comp]==NULL){
									echo "<font color='red'><-- &nbsp;(Pilih satu formula untuk melihat komponen material)</font>";
								}
								else{
									echo"<br><br><p align='right'>
									<input type='hidden' value='$_GET[id]' name='id'>
									<input type='hidden' value='$_GET[matcode]' name='matcode'>
									<input type='hidden' value='$_GET[comp]' name='comp'>
									<input type='hidden' value='$tot2' name='jc'>";
									
									echo"
									</p></li>";
								}
							echo"</ul>
							</form>
                        </div>
                    </div>
        </div>
	</div>
	
	
	<!-- HASIL KALKULASI -->
	<hr />
	<div class='uk-grid' data-uk-grid-margin>
	<div class='uk-width-large-2-2'>
	 <h3 class='heading_a uk-margin-bottom'><b><u>Calculate Result</u></b></h3> 
		<table border='0' width='100%' cellspacing='0' class='uk-table' >
			<tr><th>Material Code</th><th>Material Name</th><th> Total Qty</th><th> Unit</th></tr>";
			while($forcal = mysqli_fetch_array($fcal)){
				include('config/koneksi_sim.php');
				$matname = mysqli_query($sim, "select Name from mastermaterial where Code = '$forcal[componentName]';");
				$q = mysqli_fetch_array($matname);
				echo"<tr>
						<td>$forcal[componentName]</td>
						<td>$q[Name]</td>
						<td>$forcal[hasilAkhir]</td>
						<td>$forcal[unitComp]</td>
					</tr>";
			}
		echo"
		</table>
	</div>
	</div>
	
				";
break;
}