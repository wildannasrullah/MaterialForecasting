<h4 class='heading_a uk-margin-bottom'>Formula</h4>
            <div class='md-card'>
                        <div class='md-card-content'>
<?php
$aksi = "modul/tools/aksi_tools.php";						
switch($_GET[act]){
default:
?>

                    <div class='dt_colVis_buttons'></div>
                    <table id='dt_tableExport' class='uk-table' cellspacing='0' width='100%'>
                        <thead>
                        <tr>
							<th bgcolor='yellow'>ID</th>
                            <th bgcolor='yellow'>Sales Order No.</th>
                            <th bgcolor='yellow'>Customer</th>
                            <th bgcolor='yellow'>Qty SO</th> 
                            <th bgcolor='yellow'>Material Code</th>
							<th bgcolor='yellow'>Total BOM</th>
							<th bgcolor='yellow'>Total Calc</th>
							<th bgcolor='yellow'>Status</th>
                            <th bgcolor='yellow'>Reset</th>
                        </tr>
                        </thead>

                        <tfoot>
                        </tfoot>

                        <tbody>
						<?php
						$i=1;
						
						$em = mysqli_query($conn, "select *from forecast e order by idFor DESC");
						while($e = mysqli_fetch_array($em)){
							$fcal = mysqli_query($conn, "select distinct component from formula_calculate where materialcode like '%$e[materialCode]%';");
							$forcal = mysqli_num_rows($fcal);
							$bom = mysqli_query($sim, "select *from masterbomh where formula like '%$e[materialCode]%';");
							$cbom = mysqli_num_rows($bom);
						echo"
                        <tr>
                            <td>$i.</td>
							<td width='10%'>$e[sod]</td>
                            <td width='30%'>$e[customer]</td>
                            <td>".ribu($e[qtyFor])."</td>
                            <td>$e[materialCode]</td>
							<td align='center'>$cbom</td>
							<td align='center'>$forcal</td>
							<td><b>$e[status]</b></td>
                            <td>
							<div class='md-btn-group'>";
							if($e[status]=='Open'){
								echo"<a href='#' class='md-btn md-btn-small md-btn-default md-btn-wave' disabled=''>Reset</a>
                                ";
							}else{
								echo"<a href='$aksi?n=change-calc-status&act=rst&m=1&id=$e[idFor]&mc=$e[materialCode]&st=$e[status]' class='md-btn md-btn-small md-btn-danger md-btn-wave'>Reset</a>
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
}
?>