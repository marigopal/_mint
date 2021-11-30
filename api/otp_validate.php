<?php 
include('../include/dbconfig.php');



$input_mobileno = $_POST['input_mobileno'];
$input_otp = $_POST['input_otp'];

$query = "select count(*) as cntUser FROM `tbl_user` WHERE `user_name` = '$input_mobileno' and otp = '$input_otp'";
echo $query;exit();
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
if ($row['cntUser'] > 0) {
    echo "1";
} else {
echo "0";
}


?>