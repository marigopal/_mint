<?php

class Users {

    private $conn;
    private $db_table = "tbl_user";
    public $user_id;
    public $shop_id;
    public $user_name;
    public $staff_code;
    public $full_name;
    public $is_active;
    public $is_blocked;
    public $gender;
    public $primary_language_id;
    public $joined_date;
    public $is_admin;
    public $blocked_on;
    public $is_releaved;
    public $releaved_on;
    public $is_deleted;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function get_UserValidate() {
        $mobile_number = $this->mobile_number;
        $sqlQuery = "SELECT 
                    `user_id`,
                    `shop_id`,
                   `user_name`,
                    `primary_language_id`,
                    `is_admin`,
                    `is_blocked`,
                    `is_active`,
                    `blocked_on`,
                    `is_releaved`,
                    `releaved_on`,
                    `is_deleted`
             FROM 
                        " . $this->db_table . " 
                    WHERE 
                    user_name = '$mobile_number' and is_deleted = '0'
                    LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function Inster_User() {
        $user_uid = $this->user_uid;
        $shop_id = $this->shop_id;
        $shoptype_id = $this->shoptype_id;
        $mobile_number = $this->mobile_number;
        $user_fullname = $this->user_fullname;
        $language_code = $this->language_code;
        $sqlQuery = "INSERT INTO
            " . $this->db_table . "" .
                "(`user_id`,`shop_id`,`user_name`,`staff_code`,`full_name`,`gender`,`primary_language_id`,`joined_date`,`is_admin`,`is_active`,`is_blocked`,`blocked_on`," .
                "`is_releaved`,`releaved_on`,`is_deleted`) VALUES" .
                "('$user_uid','$shop_id','$mobile_number',null,'$user_fullname',null,'$language_code',now(),'0','1','0',null,'0',null,'0')";
        $stmt = $this->conn->prepare($sqlQuery);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}
?>

