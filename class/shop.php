<?php

class Shop {

    private $conn;
    private $db_table = "tbl_shop";
    public $shop_id;
    public $shop_code;
    public $shop_name;
    public $primary_language_id;
    public $shoptype_id;
    public $mobile_number;
    public $is_activated;
    public $is_blocked;
    public $owner_name;
    public $referral_code;
    public $created_on;
    public $blocked_on;
    public $blockedby_reason;
    public $is_deleted;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function Insert_Shop() {
        $shop_id = $this->shop_uid;
        $user_fullname = $this->user_fullname;
        $shop_name = $this->shop_name;
        $referral_code = $this->referral_code;
        $language_code = $this->language_code;
        $mobile_number = $this->mobile_number;
        $shoptype_id = $this->shoptype_id;
        $sqlQuery = "INSERT INTO
                        " . $this->db_table . "" .
                "(`shop_id`,`shop_code`,`shop_name`,`primary_language_id`,`shoptype_id`,`mobile_number`,`is_activated`," .
                "`is_blocked`,`owner_name`,`referral_code`,`created_on`,`blocked_on`,`blockedby_reason`,`is_deleted`)" .
                "VALUES('$shop_id',null,'$shop_name','$language_code','$shoptype_id','$mobile_number','1','0'," .
                "'$user_fullname','$referral_code',now(),null,null,'0')";
        $stmt = $this->conn->prepare($sqlQuery);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}

?>