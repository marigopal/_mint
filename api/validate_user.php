<?php

include_once '../include/lib_page.php';
$database = new Database();
$db = $database->getConnection();
$item = new Users($db);
$response = new Response_Types();
$data = json_decode(file_get_contents("php://input"));
$item->mobile_number = $data->mobilenumber;
$stmt = $item->get_UserValidate();
$itemCount = $stmt->rowCount();
if ($itemCount > 0) {
    $dataArr = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $dataArr[] = array(
            "user_id" => $user_id,
            "shop_id" => $shop_id,
            "primary_language_id" => $primary_language_id,
            "is_admin" => $is_admin,
            "is_active" => $is_active,
            "is_blocked" => $is_blocked,
            "is_releaved" => $is_releaved,
        );
    }
    $response->success_response($dataArr);
} else {
    $response->NoRecords();
}
?>