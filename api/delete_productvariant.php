<?php

include_once '../include/lib_page.php';
$item_productvarient = new Product_Varient($db);
$data = json_decode(file_get_contents("php://input"));
if ($data->productvarient_id != '') {
    $item_productvarient->productvarient_id = $data->productvarient_id;
    $stmt = $item_productvarient->Validate_Productvarientid();
    $itemCount = $stmt->rowCount();
    if ($itemCount > 0) {
        if ($item_productvarient->Delete_Productvarient()) {

            $response->success_response_noarg();
        } else {
            $response->BadRequest('Product Varient could not be Deleted.');
        }
    } else {
        $response->BadRequest('Product Varient ID is not Valid');
    }
} else {
    $response->BadRequest('Please select valid Product Varient.');
}
?>