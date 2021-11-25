<?php

include_once '../include/lib_page.php';
$database = new Database();
$db = $database->getConnection();
$items_Shop_Type = new Shop_Type($db);
$response = new Response_Types();
$items_lang = new Language($db);
$data = json_decode(file_get_contents("php://input"));
$items_lang->id = $data->language_code;
$stmt_lang = $items_lang->validate_lang();
$itemCount_lang = $stmt_lang->rowCount();
if ($itemCount_lang > 0) {
    $items_Shop_Type->language_code = $data->language_code;
    $stmt_items_Shop_Type = $items_Shop_Type->get_shoptype();
    $itemCount_shoptype = $stmt_items_Shop_Type->rowCount();
    if ($itemCount_shoptype > 0) {
        $dataArr = array();
        while ($row = $stmt_items_Shop_Type->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $dataArr[] = array(
                "shoptype_id" => $shoptype_id,
                "shoptype_name" => $shoptype_name,
            );
        }
        $response->success_response($dataArr);
    } else {
        $response->NoRecords();
    }
} else {
    $response->BadRequest('Invalid Language Code');
}
?>