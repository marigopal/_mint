<?php

include_once '../include/lib_page.php';
$item_product = new Product($db);
$item_productvarient = new Product_Varient($db);
$data = json_decode(file_get_contents("php://input"));
if ($data->product_id == '' && $data->productvarient_id == '') {
    $item_product->product_name = $data->product_name;
    $stmt = $item_product->Validate_Productname();
    $itemCount = $stmt->rowCount();
    if ($itemCount > 0) {
        $response->BadRequest('Product Name Exist.');
    } else {
        $product_id = $response->GUID();
        $item_product->is_new = '1';
        $item_productvarient->is_new = '1';
        $item_product->product_id = $product_id;
        $item_product->shop_id = $items_header->shop_id;
        $item_product->producttype_id = $data->producttype_id;
        $item_product->is_food_item = $data->is_food_item;
        $item_product->foodtype_id = $data->foodtype_id;
        $item_product->product_description = $data->product_description;
        $item_product->is_track_enabled = $data->is_track_enabled;
        $item_product->allow_discount = $data->allow_discount;
        $productvarient_id = $response->GUID();
        $item_productvarient->productvarient_id = $productvarient_id;
        $item_productvarient->product_id = $product_id;
        $item_productvarient->product_variant_name = $data->product_variant_name;
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
        if ($item_product->Manage_Product()) {
            if ($item_productvarient->Manage_Varient()) {
                $response->success_response_noarg();
            } else {
                $response->BadRequest('Prodct Varient could not be created.');
            }
        } else {
            $response->BadRequest('Product could not be created.');
        }
    }
} else {
    $response->BadRequest('Use Separate API for Update');
}
?>