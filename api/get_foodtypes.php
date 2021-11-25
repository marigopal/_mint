<?php

include_once '../include/lib_page.php';
$item_foodtype = new Foodtype($db);
$item_foodtype->language_code = $items_header->language_code;
$stmt_foodtype = $item_foodtype->get_foodtype_languagecode();
$itemCount = $stmt_foodtype->rowCount();
if ($itemCount > 0) {
    $dataArr = array();
    while ($row_foodtype = $stmt_foodtype->fetch(PDO::FETCH_ASSOC)) {
        extract($row_foodtype);
        $dataArr[] = array(
            "foodtype_id" => $foodtype_id,
            "foodtype_name_name" => $foodtype_name_name
        );
    }
    $response->success_response($dataArr);
} else {
    $response->NoRecords();
}
?>