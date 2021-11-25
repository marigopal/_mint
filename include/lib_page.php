<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../class/product_type.php';
include_once '../class/users.php';
include_once '../class/language.php';
include_once '../class/shop_type.php';
include_once '../class/shop.php';
include_once '../include/response_.php';
include_once '../class/request_header.php';
include_once '../class/product.php';
include_once '../class/product_varient.php';
include_once '../class/food_type.php';

$database = new Database();
$db = $database->getConnection();
$response = new Response_Types();
$items_lang = new Language($db);


$items_lang->id = $items_header->language_code;
$stmt_lang = $items_lang->get_Languageid();
$select_language_code = $items_lang->language_id;
?>