<h4 class='heading_a uk-margin-bottom'>Master Department</h4>
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
                                <h3 class='uk-accordion-title uk-accordion-title-primary'>Data Department</h3>
                                <div class='uk-accordion-content'>
                                    <p>
			<div class='md-card'>
                <div class='md-card-content large-padding'>
				<?php
				$y = mysqli_query($conn, "select *from mdepartment where idDep='$_GET[id]'");
				$p = mysqli_fetch_array($y);
				$aksi = "modul/master/aksi_department.php";
				echo"
                    <form id='form_validation' class='uk-form-stacked' method='POST' action=''>
                        
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-12'>
                                <div class='parsley-row'>
                                    <label for='fullname'>Department Name<span class='req'>*</span></label>
									 <input type='hidden' name='id' required class='md-input' value='$p[idDep]' />
                                    <input type='text' name='nama_dep' required class='md-input' value='$p[namaDep]' />
                                </div>
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
			<div class='md-card uk-margin-medium-bottom'>
                <div class='md-card-content'>
                    <div class='dt_colVis_buttons'></div>
                    <table id='dt_tableExport' class='uk-table' cellspacing='0' width='100%'>
                        <thead>
                        <tr>
							<th>Dep ID</th>
                            <th>Department Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                        </tfoot>

                        <tbody>
						<?php
						$em = mysqli_query($conn, "select *from mdepartment");
						while($e = mysqli_fetch_array($em)){
						echo"
                        <tr>
                            <td>$e[idDep]</td>
							<td>$e[namaDep]</td>
                            <td>
							<div class='md-btn-group'>
                                <a href='?n=department&m=1&id=$e[idDep]' class='md-btn md-btn-small md-btn-success md-btn-wave'>Edit</a>
                                <a href='?n=department&m=2&id=$e[idDep]' class='md-btn md-btn-small md-btn-danger md-btn-wave'>Delete</a>
                            </div>
							</td>
                        </tr>
                        ";
						}
						?>
                        </tbody>
                    </table>
                </div>
            </div>
										
<?php
$p	=$_GET[n];  $act	=$_GET[act];
include('aksi_department.php');
?>