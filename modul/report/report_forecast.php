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
                            <th bgcolor='yellow'>Status</th>
                        </tr>
                        </thead>

                        <tfoot>
                        </tfoot>

                        <tbody>
						<?php
						$i=1;
						$em = mysqli_query($conn, "select *from forecast order by idFor DESC");
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