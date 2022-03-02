<h4 class='heading_a uk-margin-bottom'>Master User</h4>
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
                                <h3 class='uk-accordion-title uk-accordion-title-primary'>Data User</h3>
                                <div class='uk-accordion-content'>
                                    <p>
			<div class='md-card'>
                <div class='md-card-content large-padding'>
				<?php
				$y = mysqli_query($conn, "select *from muser where idUser='$_GET[id]'");
				$p = mysqli_fetch_array($y);
				$aksi = "modul/master/aksi_user.php";
				echo"
                    <form id='form_validation' class='uk-form-stacked' method='POST' action=''>
                        <div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-12'>
                                <div class='parsley-row'>
                                    <label for='nik'>Full Name<span class='req'>*</span></label>
                                    <input type='text' name='fullname' required class='md-input' value='$p[fullName]' autofocus/>
                                </div>
                            </div>
                        </div>
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-2'>
                                <div class='parsley-row'>
                                    <label for='fullname'>Username<span class='req'>*</span></label>
                                    <input type='text' name='username' required class='md-input' value='$p[username]' />
                                </div>
                            </div>
                        </div>
						<div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-2'>
                                <div class='parsley-row'>
                                    <label for='fullname'>Password<span class='req'>*</span></label>
                                    <input type='password' name='password' required class='md-input' value='$p[password]' />
                                </div>
                            </div>
                        </div>
                        <div class='uk-grid' data-uk-grid-margin>
                             <div class='uk-width-medium-1-2'>
							 <label for='gender' class='uk-form-label'>Department / Field<span class='req'>*</span></label>
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
                            
                            <div class='uk-width-medium-1-2'>
                                <div class='uk-form-row parsley-row'>
                                    <label for='gender' class='uk-form-label'>Level<span class='req'>*</span></label>";
                                    if($p[level]=='admin'){
										echo"
											<span class='icheck-inline'>
												<input type='radio' name='level' id='level' data-md-icheck value='admin' checked />
												<label for='level' class='inline-label'>Admin</label>";
										echo"			&nbsp;&nbsp;
												<input type='radio' name='level' id='level' data-md-icheck value='user' />
												<label for='level' class='inline-label'>User</label>
											</span>";
										
									}
									else  if($p[level]=='user'){
										echo"
											<span class='icheck-inline'>
												<input type='radio' name='level' id='level' data-md-icheck value='admin'  />
												<label for='level' class='inline-label'>Admin</label>";
										echo"			&nbsp;&nbsp;
												<input type='radio' name='level' id='level' data-md-icheck value='user' checked />
												<label for='level' class='inline-label'>User</label>
											</span>";
									}else{
										echo"
											<span class='icheck-inline'>
												<input type='radio' name='level' id='level' data-md-icheck value='admin'  />
												<label for='level' class='inline-label'>Admin</label>";
										echo"			&nbsp;&nbsp;
												<input type='radio' name='level' id='level' data-md-icheck value='user' />
												<label for='level' class='inline-label'>User</label>
											</span>";
									}
									echo"
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
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                        </tfoot>

                        <tbody>
						<?php
						$em = mysqli_query($conn, "select *from muser e 
												   left join mdepartment d on e.idDep = d.idDep
												   order by e.idUser DESC");
						$i = 1;
						while($e = mysqli_fetch_array($em)){
						echo"
                        <tr>
                            <td>$i.</td>
							<td>$e[fullName]</td>
                            <td>$e[username]</td>
                            <td>".md5($e[password])."</td>
                            <td>$e[namaDep]</td>
                            <td>$e[level]</td>
                            <td>
							<div class='md-btn-group'>
                                <a href='?n=user&m=1&id=$e[idUser]' class='md-btn md-btn-small md-btn-success md-btn-wave'>Edit</a>
                                <a href='?n=user&m=2&id=$e[idUser]' class='md-btn md-btn-small md-btn-danger md-btn-wave'>Delete</a>
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
include('aksi_user.php');
?>