<div class='page-header'>
  <div class='page-header-title'>
    <h4>User Profile
    </h4>
  </div>
</div>
<?php
error_reporting(0);
session_start();

$rss = mysqli_query($conn, "select *from muser where username = '$_SESSION[username]'");
$trr = mysqli_fetch_array($rss);
echo" 
<div class='md-card'>
                <div class='md-card-content large-padding'>
						<form method='POST' action='modul/user/act_editpass.php'>
						 <input type='hidden' class='form-control' value='$t[idUser]' name='id_user'>
                        <div class='row'>
                            <div class='uk-grid' data-uk-grid-margin>
                            <div class='uk-width-medium-1-12'>
                                <div class='parsley-row'>
                                        <i class='notika-icon notika-support'></i>
                                    </div>
                                    <div class='nk-int-st'>
                                        <input type='text' class='md-input' placeholder='Username' value='$trr[username]' readonly=''>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class='row'>
                            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='form-group ic-cmp-int'>
                                    <div class='form-ic-cmp'>
                                        <i class='notika-icon notika-support'></i>
                                    </div>
                                    <div class='nk-int-st'>
                                        <input type='text' class='md-input' placeholder='Full Name' value='$trr[fullName]' name='fullname'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                           <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='form-group ic-cmp-int'>
                                    <div class='form-ic-cmp'>
                                        <i class='notika-icon notika-map'></i>
                                    </div>
                                    <div class='nk-int-st'>
                                        <input type='password' class='md-input' placeholder='Password' value='$trr[password]' name='password'>
                                    </div>
                                </div>
                            </div>
                        </div>
						<p align='right'><button type='submit' class='md-btn md-btn-primary' >Update</button></p>
						</form>
                    </div>
                </div>
				";
				?>