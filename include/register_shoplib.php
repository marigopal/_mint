<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../include/database.php';
include_once '../class/product_type.php';
include_once '../class/users.php';
include_once '../class/language.php';
include_once '../class/shop_type.php';
include_once '../class/shop.php';
include_once '../include/response_.php';

include_once '../class/product.php';
include_once '../class/product_varient.php';

$database = new Database();
$db = $database->getConnection();
$response = new Response_Types();
?>