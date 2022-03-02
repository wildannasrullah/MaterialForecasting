<h4 class='heading_a uk-margin-bottom'>Master Menu Management</h4>
<a href='f.php?n=menu'><input type='button' value='Master Menu' name='submit_edit' class='md-btn md-btn-danger'></a>
<a href='f.php?n=menuuser'><input type='button' value='Menu User' name='submit_edit' class='md-btn md-btn-danger'></a><br><br>
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
                                <h3 class='uk-accordion-title uk-accordion-title-primary'>Menu Management</h3>
                                <div class='uk-accordion-content'>
                                    <p>
			<div class='md-card'>
                <div class='md-card-content large-padding'>
				<?php
				$y = mysqli_query($conn, "select *from menu where idMenu='$_GET[id]'");
				$p = mysqli_fetch_array($y);
				$aksi = "modul/master/aksi_menu.php";
				echo"
                    <form id='form_validation' class='uk-form-stacked' method='POST' action=''>
                        <div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-12'>
                                <div class='parsley-row'>
                                    <label for='nik'>Menu Name<span class='req'>*</span></label>
                                    <input type='text' name='menu_name' required class='md-input' value='$p[MenuName]' autofocus/>
                                </div>
                            </div>
                        </div>
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-2'>
                                <div class='parsley-row'>
                                    <label for='fullname'>Sub Menu<span class='req'></span></label>
                                    <input type='text' name='submenu' class='md-input' value='$p[SubMenu]' />
                                </div>
                            </div>
                        </div>
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-2'>
                                <div class='parsley-row'>
                                    <label for='fullname'>Link<span class='req'>*</span></label>
                                    <input type='text' name='link' required class='md-input' value='$p[Link]' />
                                </div>
                            </div>
                        </div>
                        <div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-2'>
                                <div class='parsley-row'>
                                    <label for='fullname'>Icon<span class='req'></span></label>
                                    <input type='text' name='icon'  class='md-input' value='$p[icon]' />
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
							<th>No.</th>
                            <th>Menu</th>
                            <th>Sub Menu</th>
                            <th>Link</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                        </tfoot>

                        <tbody>
						<?php
						$em = mysqli_query($conn, "select *from menu 
												   order by idMenu DESC");
						$i = 1;
						while($e = mysqli_fetch_array($em)){
							$k = substr($e[icon],1);
						echo"
                        <tr>
                            <td>$i.</td>
							<td>$e[MenuName]</td>
                            <td>$e[SubMenu]</td>
                            <td>$e[Link]</td>
                            <td>
                                        <i class='material-icons'>$e[icon]</i>&nbsp;&nbsp;&nbsp;
											&amp;$k
							</td>
                            <td>
							<div class='md-btn-group'>
                                <a href='?n=menu&m=1&id=$e[idMenu]' class='md-btn md-btn-small md-btn-success md-btn-wave'>Edit</a>
                                <a href='?n=menu&m=2&id=$e[idMenu]' class='md-btn md-btn-small md-btn-danger md-btn-wave'>Delete</a>
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