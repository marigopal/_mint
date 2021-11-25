<?php

include_once '../include/lib_page.php';
$item_product = new Product($db);
$item_productvarient = new Product_Varient($db);
$data = json_decode(file_get_contents("php://input"));
$item_product->product_id = $data->product_id;
$item_productvarient->product_id = $data->product_id;
$stmt_product = $item_product->get_products_productid();
$itemCount_product = $stmt_product->rowCount();
if ($itemCount_product > 0) {
    $productArr = array();
    $productvarientArr = array();
    while ($row_product = $stmt_product->fetch(PDO::FETCH_ASSOC)) {
        extract($row_product);
        $item_productvarient->product_id = $product_id;
        $stmt_varient = $item_productvarient->get_productvarient_productid();
        $itemCount_varienrt = $stmt_varient->rowCount();
        if ($itemCount_varienrt > 0) {
            while ($row_varient = $stmt_varient->fetch(PDO::FETCH_ASSOC)) {
                extract($row_varient);
                $productvarientArr[] = array(
                    "productvariant_id" => $productvariant_id,
                    "product_id" => $product_id,
                    "variant_name" => $variant_name,
                    "barcode" => $barcode,
                    "SKU_code" => $SKU_code,
                    "variant_mrp" => $variant_mrp,
                    "variant_sellingprice" => $variant_sellingprice,
                    "variant_costprice" => $variant_costprice,
                    "variant_openingstock" => $variant_openingstock,
                    "is_show_online" => $is_show_online,
                    "is_top_offer_product" => $is_top_offer_product,
                    "online_mrp" => $online_mrp,
                    "online_sellingprice" => $online_sellingprice
                );
            }
        }
        $productArr[] = array(
            "product_id" => $product_id,
            "product_name" => $product_name,
            "producttype_id" => $producttype_id,
            "is_food_item" => $is_food_item,
            "foodtype_id" => $foodtype_id,
            "foodtype_id" => $foodtype_id,
            "product_description" => $product_description,
            "is_track_enabled" => $is_track_enabled,
            "allow_discount" => $allow_discount,
            "product_varient" => $productvarientArr
        );
    }
    $response->success_response($productArr);
} else {
    $response->NoRecords();
}
?>