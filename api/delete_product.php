<?php

include_once '../include/lib_page.php';
$item_product = new Product($db);
$data = json_decode(file_get_contents("php://input"));
if ($data->product_id != '') {
    $item_product->product_id = $data->product_id;
    $stmt = $item_product->Validate_Productid();
    $itemCount = $stmt->rowCount();
    if ($itemCount > 0) {
        if ($item_product->Delete_Product()) {
            $response->success_response_noarg();
        } else {
            $response->BadRequest('Product could not be Deleted.');
        }
    } else {
        $response->BadRequest('Product ID is not Valid');
    }
} else {
    $response->BadRequest('Use Separate API for Create.');
}
?>