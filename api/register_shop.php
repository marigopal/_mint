<?php

include_once '../include/register_shoplib.php';
$item_user = new Users($db);
$item_shop = new Shop($db);
$items_lang = new Language($db);
$data = json_decode(file_get_contents("php://input"));
$items_lang->id = $data->language_code;
$stmt_lang = $items_lang->get_Languageid();
$select_language_code = $items_lang->language_id;
$item_user->mobile_number = $data->mobile_number;
$stmt = $item_user->get_UserValidate();
$itemCount = $stmt->rowCount();
if ($itemCount > 0) {
    $response->BadRequest('Mobile Number Already Used.');
} else {
    $shop_uid = $response->GUID();
    $item_shop->shop_uid = $shop_uid;
    $item_shop->user_fullname = $data->user_fullname;
    $item_shop->shop_name = $data->shop_name;
    $item_shop->referral_code = $data->referral_code;
    $item_shop->language_code = $items_lang->language_id;
    $item_shop->shoptype_id = $data->shoptype_id;
    $item_shop->mobile_number = $data->mobile_number;
    $user_uid = $response->GUID();
    $item_user->user_uid = $user_uid;
    $item_user->shop_id = $shop_uid;
    $item_user->shoptype_id = $data->shoptype_id;
    $item_user->user_fullname = $data->user_fullname;
    $item_user->language_code = $items_lang->language_id;
    if ($item_shop->Insert_Shop()) {
        if ($item_user->Inster_User()) {
            $dataArr = array();
            $dataArr[] = array(
                "user_id" => $user_uid,
            );
            $response->success_response($dataArr);
        } else {
            $response->BadRequest('User Account could not be created.');
        }
    } else {
        $response->BadRequest('Shop could not be created.');
    }
}
?>