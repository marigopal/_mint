<?php

include_once '../include/lib_page.php';
$item_product = new Product($db);
$item_product->shop_id = $items_header->shop_id;
$stmt = $item_product->get_products_shopid();
$itemCount = $stmt->rowCount();
if ($itemCount > 0) {
    $dataArr = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $dataArr[] = array(
            "product_id" => $product_id,
            "product_name" => $product_name,
            "producttype_id" => $producttype_id,
            "is_food_item" => $is_food_item,
            "foodtype_id" => $foodtype_id,
            "foodtype_id" => $foodtype_id,
            "product_description" => $product_description,
            "is_track_enabled" => $is_track_enabled,
            "allow_discount" => $allow_discount
        );
    }
    $response->success_response($dataArr);
} else {
    $response->NoRecords();
}
?>