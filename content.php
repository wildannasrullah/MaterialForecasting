<?php
//DSHBORAD
if ($_GET['n']=='dashboard'){
    include "modul/dashboard.php";
}

//TOOLS
if ($_GET['n']=='change-calc-status'){
    include "modul/tools/tools.php";
}

//forecast
if ($_GET['n']=='forecast'){
    include "modul/forecast/forecast.php";
}
//formula
if ($_GET['n']=='formula'){
    include "modul/formula/formula.php";
}

//forecasting ppic
if ($_GET['n']=='forecasting-ppic'){
    include "modul/forecasting_ppic/forecastingppic.php";
}
if ($_GET['n']=='forecasting-result'){
    include "modul/forecasting_ppic/forecastingresult.php";
}

 //USER
 if ($_GET['n']=='change-password'){
    include "modul/user/profile.php";
}
 
//MASTER
if ($_GET['n']=='user'){
    include "modul/master/user.php";
}
if ($_GET['n']=='menu'){
    include "modul/master/menu_manage.php";
}
if ($_GET['n']=='menuuser'){
    include "modul/master/menu_user.php";
}
if ($_GET['n']=='master-forecasting'){
    include "modul/master/master_forecasting.php";
}
if ($_GET['n']=='add_material'){
    include "modul/master/add_material.php";
}

//REPORT
if($_GET['n']=='report-forecast'){
	include "modul/report/report_forecast.php";
}
if($_GET['n']=='report-formula'){
	include "modul/report/report_formula.php";
}
if($_GET['n']=='report_forecastingppic'){
	include "modul/report/report_forecastingppic.php";
}

//USER
if($_GET['n']=='profile'){
	include "modul/user/profile.php";
}
?>