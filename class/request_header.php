<?php

class Request_Header {
    
}

$items_header = new Request_Header();
foreach (getallheaders() as $name => $value) {
    switch ($name) {
        case "user_token":
            $items_header->user_token = $value;
            break;
        case "User-Token":
            $items_header->user_token = $value;
            break;
        case "shop_id":
            $items_header->shop_id = $value;
            break;
        case "Shop-Id":
            $items_header->shop_id = $value;
            break;
        case "language_code":
            $items_header->language_code = $value;
            break;
        case "Language-Code":
            $items_header->language_code = $value;
            break;
    }
}
?>