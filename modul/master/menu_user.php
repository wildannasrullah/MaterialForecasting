<h4 class='heading_a uk-margin-bottom'>Master Menu Management</h4>
<a href='f.php?n=menu'><input type='button' value='Master Menu' name='submit_edit' class='md-btn md-btn-danger'></a>
<a href='f.php?n=menuuser'><input type='button' value='Menu User' name='submit_edit' class='md-btn md-btn-danger'></a><br><br>
            <div class='md-card'>
                        <div class='md-card-content'>
						<?php
						if($_GET[m]==3){
							echo"<div class='uk-accordion' data-uk-accordion='{showfirst: false}' data-accordion-section-open='1'>";
						}
						else{
                            echo"<div class='uk-accordion' data-uk-accordion='{showfirst: false}' data-accordion-section-open='2'>";
						}
						?>
                                <h3 class='uk-accordion-title uk-accordion-title-primary'>Menu User</h3>
                                <div class='uk-accordion-content'>
                                    <p>
			<div class='md-card'>
                <div class='md-card-content large-padding'>
				<?php
				$y = mysqli_query($conn, "select *from menu_user where idMu='$_GET[id]'");
				$p = mysqli_fetch_array($y);
				$aksi = "modul/master/aksi_menu.php";
				echo"
                    <form id='form_validation' class='uk-form-stacked' method='POST' action=''>
                        <div class='uk-grid' data-uk-grid-margin>
                             <div class='uk-width-medium-1-2'>
							 <label for='gender' class='uk-form-label'>Menu<span class='req'>*</span></label>
                            <select id='select_demo_4' data-md-selectize name='menu'>
                                <option value=''>Select...</option>";
								
								$q = mysqli_query($conn, "select *from menu");
								while($r = mysqli_fetch_array($q)){
									if($p['idMenu']==$r['idMenu']){
										echo"<option value='$r[idMenu]' selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$r[MenuName] - $r[SubMenu]</option>";
									}else{
										echo"<option value='$r[idMenu]'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$r[MenuName] - $r[SubMenu]</option>";
									}
								}
                              echo"
                            </select>
                            </div>
                             <div class='uk-width-medium-1-2'>
							 <label for='gender' class='uk-form-label'>Department<span class='req'>*</span></label>
                            <select id='select_demo_4' data-md-selectize name='dep'>
                                <option value=''>Select...</option>";
								
								$q = mysqli_query($conn, "select *from mdepartment");
								while($r = mysqli_fetch_array($q)){
									if($p['idDep']==$r['idDep']){
										echo"<option value='$r[idDep]' selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$r[namaDep]</option>";
									}else{
										echo"<option value='$r[idDep]'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$r[namaDep]</option>";
									}
								}
                              echo"
                            </select>
                            </div>
						<div class='uk-grid'>
                            <div class='uk-width-1-1'>
                                <p align='right'>";
								if($_GET[m]=='3'){
									echo"<input type='submit' value='Save' name='submit_edit_u' class='md-btn md-btn-primary'>";
								}else{
									echo"<input type='submit' value='Save' name='submit_u' class='md-btn md-btn-primary'>";
								}
								echo"</p>
                            </div>
                        </div>						
                    </form>";
					?>
                </div></div>
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
							<th>No.</th>
                            <th>Menu</th>
							<th>Sub Menu</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                        </tfoot>

                        <tbody>
						<?php
						$em = mysqli_query($conn, "select *from menu_user m left join menu mm on m.idMenu = mm.idMenu
																			left join mdepartment d on m.idDep=d.idDep
												   order by mm.MenuName and m.idMu DESC");
						$i = 1;
						while($e = mysqli_fetch_array($em)){
						echo"
                        <tr>
                            <td>$i.</td>
							<td>$e[MenuName]</td>
							<td>$e[SubMenu]</td>
                            <td>$e[namaDep]</td>
                            <td>
							<div class='md-btn-group'>
                                <a href='?n=menuuser&m=3&id=$e[idMu]' class='md-btn md-btn-small md-btn-success md-btn-wave'>Edit</a>
                                <a href='?n=menuuser&m=4&id=$e[idMu]' class='md-btn md-btn-small md-btn-danger md-btn-wave'>Delete</a>
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
include('aksi_menu.php');
?>