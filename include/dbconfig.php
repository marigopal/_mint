<?php


date_default_timezone_set("Asia/Calcutta");
$con = mysqli_connect("retailpro.cobshee2rf93.ap-south-1.rds.amazonaws.com", "enflowsa", "HRSU6DDDPiw0IkOgT4JY", "retailpro_db");
if (!$con) {
    header("Location: /db_fail");
    die("Connection failed: " . mysqli_connect_error());
   
}

?>

