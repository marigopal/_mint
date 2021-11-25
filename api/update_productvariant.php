<?php

include_once '../include/lib_page.php';
$item_productvarient = new Product_Varient($db);
$data = json_decode(file_get_contents("php://input"));
if ($data->product_id != '' && $data->productvarient_id != '' && $data->product_variant_name != '') {
    $item_productvarient->product_id = $data->product_id;
    $item_productvarient->productvarient_id = $data->productvarient_id;
    $item_productvarient->product_variant_name = $data->product_variant_name;
    $stmt = $item_productvarient->Validate_Productvarientname_id();
    $itemCount = $stmt->rowCount();
    if ($itemCount > 0) {
        $response->BadRequest('Varient name Already Used.');
    } else {
        $item_productvarient->barcode = $data->barcode;
        $item_productvarient->SKU_code = $data->SKU_code;
        $item_productvarient->variant_mrp = $data->variant_mrp;
        $item_productvarient->variant_sellingprice = $data->variant_sellingprice;
        $item_productvarient->variant_costprice = $data->variant_costprice;
        $item_productvarient->variant_openingstock = $data->variant_openingstock;
        $item_productvarient->is_show_online = $data->is_show_online;
        $item_productvarient->is_top_offer_product = $data->is_top_offer_product;
        $item_productvarient->online_mrp = $data->online_mrp;
        $item_productvarient->online_sellingprice = $data->online_sellingprice;
        $item_productvarient->is_new = 0;
        if ($item_productvarient->Manage_Varient()) {
            $response->success_response_noarg();
        } else {
            $response->BadRequest('Product could not be Updated.');
        }
    }
} else {
    $response->BadRequest('Use Separate API for Create.');
}
?>