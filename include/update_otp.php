<?php

include('dbconfig.php');

$minutes_to_add = 5;
$time = new DateTime();
$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
$otp_expiration_on = $time->format('Y-m-d H:i:s');
$new_otp = random_strings();
$user_id = $_POST['user_id'];
    $query = "UPDATE `retailpro_db`.`tbl_user` SET `otp` = '$new_otp',`otp_expirationon` = '$otp_expiration_on' WHERE `user_id` = '$user_id'";

// echo $query;exit();
if ($result = $con->query($query)) {
    echo "1";
} else {
    echo "0";
}

function random_strings() {
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result), 0, 8);
}
?>
