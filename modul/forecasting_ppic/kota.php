<?php
include('../../config/koneksi.php');

$tampil=mysqli_query($conn, "SELECT * FROM mforecastingh WHERE CustomerCode='$_POST[nama_cust]'");
$jml=mysqli_num_rows($tampil);
if($jml > 0){
    echo"
     <option selected>- Choose Product -</option>";
     while($r=mysqli_fetch_array($tampil)){
         echo "<option value=$r[ProductCode]>$r[ProductName]</option>";
     }
}else{
    echo "
     <option selected>- No Data -</option>";
}
?>