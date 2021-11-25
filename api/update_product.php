<?php

include_once '../include/lib_page.php';
$item_product = new Product($db);
$data = json_decode(file_get_contents("php://input"));
if ($data->product_id != '') {
    $item_product->product_id = $data->product_id;
    $stmt = $item_product->Validate_Productid();
    $itemCount = $stmt->rowCount();
    if ($itemCount > 0) {
        $item_product->is_new = '0';
        $item_product->shop_id = $items_header->shop_id;
        $item_product->product_name = $data->product_name;
        $item_product->producttype_id = $data->producttype_id;
        $item_product->is_food_item = $data->is_food_item;
        $item_product->foodtype_id = $data->foodtype_id;
        $item_product->product_description = $data->product_description;
        $item_product->is_track_enabled = $data->is_track_enabled;
        $item_product->allow_discount = $data->allow_discount;
        if ($item_product->Manage_Product()) {

            $response->success_response_noarg();
        } else {
            $response->BadRequest('Product could not be Updated.');
        }
    } else {
        $response->BadRequest('Product ID is not Valid.');
    }
} else {
    $response->BadRequest('Use Separate API for Create.');
}
?>