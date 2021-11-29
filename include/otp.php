<?php
include('../../include/lib_page.php');
$user_id = $_POST['user_id'];
$minutes_to_add = 5;
$time = new DateTime();
$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
$otp_expiration_on = $time->format('Y-m-d H:i:s');
$new_otp = random_strings();
$update_otp = "UPDATE `tbl_user` SET `otp`='$new_otp',`otp_expirationon`='$otp_expiration_on' WHERE `user_id` = '$user_id'";
echo $update_otp;exit();
if ($result = $con->query($update_otp)) {
    $mail->addAddress($company_email);
    $mail->Subject = 'PlotPro - User Register Validation - OTP';
    $mail->Body = 'Company Registration new OTP - <b>' . $new_otp . '</b>';
    $mail->send();
    echo "1"; //OTP Expired and resent otp to mail
} else {
    echo "0";
}

function random_strings() {
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result), 0, 8);
}
?>
