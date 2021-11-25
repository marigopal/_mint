<?php

class Product {

    private $conn;
    private $db_table = "tbl_product";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function get_products_shopid() {
        $shop_id = $this->shop_id;
        $sqlQuery = "SELECT `product_id`,
            `shop_id`,
            `product_name`,
            `producttype_id`,
            `is_food_item`,
            `foodtype_id`,
            `product_description`,
            `is_track_enabled`,
            `allow_discount`,
            `is_deleted`
            FROM
         " . $this->db_table . " where shop_id = '$shop_id' and is_deleted = '0'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function get_products_productid() {
        $product_id = $this->product_id;
        $sqlQuery = "SELECT `product_id`,
            `shop_id`,
            `product_name`,
            `producttype_id`,
            `is_food_item`,
            `foodtype_id`,
            `product_description`,
            `is_track_enabled`,
            `allow_discount`,
            `is_deleted`
            FROM
         " . $this->db_table . " where product_id = '$product_id' and is_deleted = '0'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function Validate_Productid() {
        $product_id = $this->product_id;
        $sqlQuery = "SELECT 
                    `product_id`,
                    `is_deleted`
             FROM 
                        " . $this->db_table . " 
                    WHERE 
                    product_id = '$product_id' and is_deleted = '0'
                    LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function Validate_Productname() {
        $product_name = $this->product_name;
        $sqlQuery = "SELECT 
                    `product_name`,
                    `is_deleted`
             FROM 
                        " . $this->db_table . " 
                    WHERE 
                    product_name = '$product_name' and is_deleted = '0'
                    LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function Manage_Product() {
        $product_id = $this->product_id;
        $shop_id = $this->shop_id;
        $product_name = $this->product_name;
        $producttype_id = $this->producttype_id;
        $is_food_item = $this->is_food_item;
        $foodtype_id = $this->foodtype_id;
        $product_description = $this->product_description;
        $is_track_enabled = $this->is_track_enabled;
        $allow_discount = $this->allow_discount;
        $isNew = $this->is_new;
        if ($isNew == 1) {
            $sqlQuery = "INSERT INTO
            " . $this->db_table . "" .
                    "(`product_id`,`shop_id`,`product_name`,`producttype_id`,`is_food_item`,`foodtype_id`," .
                    "`product_description`,`is_track_enabled`,`allow_discount`,`is_deleted`)" .
                    "VALUES('$product_id','$shop_id','$product_name','$producttype_id','$is_food_item','$foodtype_id','$product_description','$is_track_enabled','$allow_discount','0')
            ";
        } else if ($isNew == 0) {
            $sqlQuery = "UPDATE  
                " . $this->db_table . "" .
                    " SET `shop_id` = '$shop_id',`product_name` = '$product_name',`producttype_id` = '$producttype_id',`is_food_item` = '$is_food_item',`foodtype_id` = '$foodtype_id'," .
                    "`product_description` = '$product_description',`is_track_enabled` = '$is_track_enabled',`allow_discount` = '$allow_discount' " .
                    "WHERE `product_id` = '$product_id'";
        }
        $stmt = $this->conn->prepare($sqlQuery);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function Delete_Product() {
        $product_id = $this->product_id;
        $sqlQuery = "update tbl_product t, tbl_productvariant v set t.is_deleted = 1, v.is_deleted = 1 
        where v.product_id =  '$product_id' and t.product_id = '$product_id'";
        $stmt = $this->conn->prepare($sqlQuery);
        if ($stmt->execute()) {

            return true;
        }
        return false;
    }
}

?>