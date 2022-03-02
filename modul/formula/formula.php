<h4 class='heading_a uk-margin-bottom'>Formula</h4>
            <div class='md-card'>
                        <div class='md-card-content'>
						<?php
						if($_GET[m]==1){
							echo"<div class='uk-accordion' data-uk-accordion='{showfirst: false}' data-accordion-section-open='1'>";
						}
						else{
                            echo"<div class='uk-accordion' data-uk-accordion='{showfirst: false}' data-accordion-section-open='2'>";
						}
switch($_GET[act]){
default:

						?>
<h3 class='uk-accordion-title uk-accordion-title-primary'>Form Formula</h3>
    <div class='uk-accordion-content'>
        <p>
			<div class='md-card'>
                <div class='md-card-content large-padding'>
				<?php
				$y = mysqli_query($conn, "select YEAR(f.deliveryDate) as y, MONTH(f.deliveryDate) as m, DAY(f.deliveryDate) as d, f.* from forecast f where idFor = '$_GET[id]'");
				$p = mysqli_fetch_array($y);
				$aksi = "modul/forecast/aksi_forecast.php";
				
				echo"
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
                                    <label for='nik'>Material Code<span class='req'>*</span></label>
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
								if($_GET[id]==NULL){
									echo"<input type='button' value='Generate Formula' name='submit' class='md-btn md-btn-default' disabled=''>";
								}else{
									echo"<a href='?n=formula&act=generate&id=$p[idFor]&matcode=$p[materialCode]'><input type='button' value='Generate Formula' name='submit' class='md-btn md-btn-danger'></a>";
								}
								echo"</p>
                            </div>
                        </div>
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
						$em = mysqli_query($conn, "select *from forecast e where status IN ('Open','In Progress') order by idFor DESC");
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
							<div class='md-btn-group'>";
							if($e[status] == 'Open'){
								echo"<a href='?n=formula&m=1&id=$e[idFor]' class='md-btn md-btn-small md-btn-primary md-btn-wave'>$e[status]</a>
                                ";
							}else if($e[status] == 'In Progress'){
								echo"<a href='?n=formula&m=1&id=$e[idFor]' class='md-btn md-btn-small md-btn-success md-btn-wave'>$e[status]</a>
                                ";
							}else{
								echo"<a href='?n=formula&m=1&id=$e[idFor]' class='md-btn md-btn-small md-btn-danger md-btn-wave'>$e[status]</a>
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
<?php
break;
case "generate":
$calculate = "modul/formula/calculate.php";
$cek = mysqli_query($conn, "select *from formula_calculate where materialcode like '%$_GET[matcode]%';");

$tes = mysqli_query($sim, "select *from masterbomh where formula like '%$_GET[matcode]%' AND formula like '%.X';");
if(mysqli_num_rows($tes)>0){
	$bom = mysqli_query($sim, "select *from masterbomh where formula like '%$_GET[matcode]%' AND formula like '%.X'");
	$bom1 = mysqli_query($sim, "select *from masterbomh where formula like '%$_GET[matcode]%' AND formula like '%.X';");
	$bom3 = mysqli_query($sim, "select *from masterbomh where formula like '%$_GET[matcode]%' AND formula like '%.X';");
}else{
	$bom = mysqli_query($sim, "select *from masterbomh where formula like '%$_GET[matcode]%';");
	$bom1 = mysqli_query($sim, "select *from masterbomh where formula like '%$_GET[matcode]%';");
	$bom3 = mysqli_query($sim, "select *from masterbomh where formula like '%$_GET[matcode]%';");
}

$bom2 = mysqli_query($sim, "select *from masterbomh where formula = '$_GET[comp]';");
$si = mysqli_query($sim, "select *from mastermaterial where code = '$_GET[matcode]';");
$sim = mysqli_fetch_array($si);

echo "

<div class='uk-grid' data-uk-grid-margin>
	<div class='uk-width-xlarge-1-2'>";
	
	echo"<form method='POST' action='$calculate?n=formula&act=in&id=$_GET[id]&matcode=$_GET[matcode]'>";
while($bc = mysqli_fetch_array($bom3)){
	echo"						<input type='hidden' name='materialcomp[]' value='$bc[Formula]'>
								<input type='hidden' name='unit[]' value='$bc[Unit]'>
								<input type='hidden' name='qtyc[]' value='$bc[Qty]'>	
		";
}
if($_GET[d]==1){}
else{
if(mysqli_num_rows($cek)>0){
	echo" <input type='button' value='Calculate' name='submit' class='md-btn md-btn-default' disabled=''>&nbsp;&nbsp;";
	echo"<a href='$calculate?n=formula&act=delete&id=$_GET[id]&matcode=$_GET[matcode]'><input type='button' value='Delete' name='submit' class='md-btn md-btn-success'></a>";
}else{
	echo" <input type='submit' value='Calculate' name='submit' class='md-btn md-btn-danger'>";
	echo"<input type='button' value='Delete' name='submit' class='md-btn md-btn-default'>";

}
}
	echo"</form>
	</div>
</div></div></div></div>
	<div class='md-card'>
        <div class='md-card-content large-padding'>
		<h3 class='heading_a uk-margin-bottom' align='center'><b>".strtoupper($_GET[matcode]." - ".$sim[Name])."</b></h3><hr />
	<div class='uk-grid' data-uk-grid-margin>
		<div class='uk-width-xlarge-1-12'>
		<h3 class='heading_a uk-margin-bottom'><b><u>BILL OF MATERIALS</u></b></h3>
                    <div class='md-card-list-wrapper'>
                        <div class='md-card-list'>
                            <ul class='hierarchical_slide' id='hierarchical-slide'>";
							while($b = mysqli_fetch_array($bom)){
                                echo"<li><button type='button' title='Klik for showing component' style='background-color: #f7fc69;border: none;overflow: hidden;outline:none; text-align:left; width:100%;'><b>$b[Formula]</b></button>
								<br><br>
								<table class='uk-table uk-table-hover' border='1'>
								<tr>
									<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Material</u></th>
									<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Satuan</u></th>
									<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Qty</u></th>
								</tr>";
								include("config/koneksi_sim.php");
								$boc = mysqli_query($sim, "select h.Qty as qty_bom, d.MaterialCode, d.Unit, d.Qty as qty_comp, h.Formula, d.Formula from  masterbomh h left join masterbomd d on h.formula=d.formula where h.formula = '$b[Formula]';");
								
									while($c = mysqli_fetch_array($boc)){
										echo"
										<tr><td width='30%' class='uk-text-left md-bg-grey-100 uk-text-small'>
											<b>$c[MaterialCode]</b>
											</td>
											<td width='20%' align='center'>$c[Unit]</td>
											<td align='right'>$c[qty_comp]</td></tr>
										<input type='hidden' name='materialcomp[]' value='$c[Formula]'>
										<input type='hidden' name='unit[]' value='$c[Unit]' >
										<input type='hidden' name='qtyc[]' value='$c[qty_bom]'>
										<input type='hidden' name='qtyb[]' value='$c[qty_comp]'>
										";
										
									$tot = mysqli_num_rows($boc);
									}
									$tot2 += $tot;
									echo"
										</table>
										</li>";
									}
							echo"
                            </ul>
                        </div>
                    </div>
        </div>
		
		<div class='uk-width-xlarge-1-12'>
                    <h3 class='heading_a uk-margin-bottom'><b><u>CALCULATE RESULT</u></b></h3>
                    <div class='md-card-list-wrapper'>
                        <div class='md-card-list'>
                            <ul class='hierarchical_slide' id='hierarchical-slide'>";
							include("config/koneksi_sim.php");
							while($b2 = mysqli_fetch_array($bom1)){
                                       echo" <li><button type='button' title='Klik for showing component' style='background-color: #a6eaf8;border: none;overflow: hidden;outline:none; text-align:left; width:100%;'><b>$b2[Formula]</b></button>
											<br><br>
											<table class='uk-table uk-table-hover' border='1'>
												<tr>
													<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Material</u></th>
													<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Satuan</u></th>
													<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Qty</u></th>
													<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Qty Stock</u></th>
													<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Qty Outs. PO</u></th>
													<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Qty Needed</u></th>
												</tr>";
											$fcal = mysqli_query($conn, "select distinct component, componentName, hasilAkhir, unitComp from formula_calculate where component = '$b2[Formula]';");
								
											while($forcal = mysqli_fetch_array($fcal)){
												$fc   = mysqli_query($sim, "select sum(QtyEnd) as QtyEnd, s.Periode, s.TagNo, s.MaterialCode, s.Location FROM stockbalance s where MaterialCode = '$forcal[componentName]' AND MONTH(Periode) = '7' AND YEAR(Periode) = YEAR(NOW())
																		 AND Location IN ('G19BK') AND QtyEnd NOT IN ('0.0000')");
												$g = mysqli_fetch_array($fc);
												$podetail = mysqli_query($sim, "SELECT p.DocNo, p.Qty, p.QtyReceived, sum(p.Qty-p.QtyReceived) as QtySisa FROM purchaseorderd p 
																				left join purchaseorderh h on p.DocNo = h.DocNo 
																				where p.MaterialCode = '$forcal[componentName]'
																				AND h.status NOT IN ('CLOSED', 'DELETED') 
																				AND (Qty-QtyReceived) NOT LIKE '-%' 
																				AND (Qty-QtyReceived) NOT IN ('0.0000')
																				AND YEAR(h.DocDate) = YEAR(NOW());");
												$pod = mysqli_fetch_array($podetail);
												if($g[QtyEnd] == NULL){
													$qtyend = "-"; //QTY STOCK
												}else{
													$qtyend = $g[QtyEnd];
												}
												
												if($pod[QtySisa] == NULL){
													$podqty = "-"; //QTY OUTSTANDING PO
												}else{
													$podqty = "$pod[QtySisa]";
												}
												$totalKebutuhan = $forcal[hasilAkhir] - $qtyend - $podqty;
												echo"
													<tr><td class='uk-text-left md-bg-grey-100 uk-text-small' >
														<b>$forcal[componentName]</b>
														</td><td width='13%' align='center'>$forcal[unitComp]</td>
														<td align='right'>".round($forcal[hasilAkhir],4)."</td>
														<td align='right'>".round($qtyend,4)."</td>
														<td align='right'><a href='?n=formula&act=list-po&id=$_GET[id]&matcode=$_GET[matcode]&namecomp=$forcal[componentName]' title='Klik untuk melihat daftar Outstanding PO'>".round($podqty,4)."</a></td>
														<td align='right'>$totalKebutuhan</td>
														</tr>
													";
											}
										echo"											
											</table>
											</li>";
							}
					echo"	</li>
                           </ul>
                        </div>
                    </div>
                </div>
		
        </div>
	</div>
	
";
break;
case "list-po":
$podetail = mysqli_query($sim, "SELECT p.DocNo, p.Qty, p.QtyReceived, p.Unit FROM purchaseorderd p 
																				left join purchaseorderh h on p.DocNo = h.DocNo 
																				where p.MaterialCode = '$_GET[namecomp]'
																				AND h.status NOT IN ('CLOSED', 'DELETE')
																				AND YEAR(h.DocDate) = YEAR(NOW());");

	echo"
	<h4><u>List of Outstanding PO - $_GET[namecomp]</u></h4>
	<table id='dt_tableExport' class='uk-table' cellspacing='0' width='100%'>
												<tr>
													<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>PO No.</u></th>
													<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Unit</u></th>
													<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Quantity</u></th>
													<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Quantity Recieved</u></th>
													<th class='uk-text-center md-bg-grey-100 uk-text-small'><u>Quantity Remain</u></th>
												</tr>";
												while($for = mysqli_fetch_array($podetail)){
													$sisa = $for[Qty] - $for[QtyReceived];
													echo"
												<tr><td class='uk-text-left md-bg-grey-100 uk-text-small' >
														<b>$for[DocNo]</b></td>
														<td width='13%' align='center'>$for[Unit]</td>
														<td align='right'>$for[Qty]</td>
														<td align='right'>$for[QtyReceived]</td>
														<td align='right'>$sisa</td>
												</tr>";
												$totalall +=$sisa;
												}
												echo"
												<tr><td colspan='4' align='right' bgcolor='yellow'><b>GRAND TOTAL</b></td><td align='right' bgcolor='yellow'><b>$totalall</b></td></tr>
	</table>
	
	";
break;
}
?>