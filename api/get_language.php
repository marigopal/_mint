<?php

include_once '../include/register_shoplib.php';
$database = new Database();
$db = $database->getConnection();
$items = new Language($db);
$response = new Response_Types();
$stmt = $items->get_Language();
$itemCount = $stmt->rowCount();
if ($itemCount > 0) {
    $dataArr = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $dataArr[] = array(
            "language_id" => $language_id,
            "language_name" => $language_name,
            "language_code" => $language_code,
            "is_active" => $is_active,
            "is_deleted" => $is_active,
        );
    }
    $response->success_response($dataArr);
} else {
    $response->NoRecords();
}
?>