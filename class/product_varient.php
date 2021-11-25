<?php

class Product_Varient {

    private $conn;
    private $db_table = "tbl_productvariant";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function get_productvarient_productid() {
        $product_id = $this->product_id;
        $sqlQuery = "SELECT `productvariant_id`,
        `product_id`,
        `variant_name`,
        `barcode`,
        `SKU_code`,
        `variant_mrp`,
        `variant_sellingprice`,
        `variant_costprice`,
        `variant_openingstock`,
        `is_show_online`,
        `is_top_offer_product`,
        `online_mrp`,
        `online_sellingprice`,
        `is_deleted`
            FROM
         " . $this->db_table . " where product_id = '$product_id' and is_deleted = '0'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function Validate_Productvarientname() {
        $product_id = $this->product_id;
        $product_variant_name = $this->product_variant_name;
        $sqlQuery = "SELECT 
                    `product_id`,
                    `variant_name`,
                    `is_deleted`
             FROM 
                        " . $this->db_table . " 
                    WHERE 
                    product_id = '$product_id' and variant_name = '$product_variant_name' and is_deleted = '0'
                    LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function Validate_Productvarientid() {
        $productvarient_id = $this->productvarient_id;
        $sqlQuery = "SELECT 
                    `productvariant_id`,
                    `is_deleted`
             FROM 
                        " . $this->db_table . " 
                    WHERE 
                    productvariant_id = '$productvarient_id' and is_deleted = '0'
                    LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function Validate_Productvarientname_id() {
        $product_id = $this->product_id;
        $productvarient_id = $this->productvarient_id;
        $product_variant_name = $this->product_variant_name;
        $sqlQuery = "SELECT 
                    `productvariant_id`,
                    `product_id`,
                    `variant_name`,
                    `is_deleted`
             FROM 
                        " . $this->db_table . " 
                    WHERE 
                    productvariant_id != '$productvarient_id' and product_id = '$product_id' and variant_name = '$product_variant_name' and is_deleted = '0'
                    LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function Manage_Varient() {
        $productvarient_id = $this->productvarient_id;
        $product_id = $this->product_id;
        $product_variant_name = $this->product_variant_name;
        $barcode = $this->barcode;
        $SKU_code = $this->SKU_code;
        $variant_mrp = $this->variant_mrp;
        $variant_sellingprice = $this->variant_sellingprice;
        $variant_costprice = $this->variant_costprice;
        $variant_openingstock = $this->variant_openingstock;
        $is_show_online = $this->is_show_online;
        $is_top_offer_product = $this->is_top_offer_product;
        $online_mrp = $this->online_mrp;
        $online_sellingprice = $this->online_sellingprice;
        $isNew = $this->is_new;
        if ($isNew == 1) {
            $sqlQuery = "INSERT INTO
        " . $this->db_table . "" .
                    "(`productvariant_id`,`product_id`,`variant_name`,`barcode`,`SKU_code`,`variant_mrp`,`variant_sellingprice`,`variant_costprice`," .
                    "`variant_openingstock`,`is_show_online`,`is_top_offer_product`,`online_mrp`,`online_sellingprice`,`is_deleted`)" .
                    "VALUES('$productvarient_id','$product_id','$product_variant_name','$barcode','$SKU_code','$variant_mrp','$variant_sellingprice','$variant_costprice'," .
                    "'$variant_openingstock','$is_show_online','$is_top_offer_product','$online_mrp','$online_sellingprice','0')
        ";
        } else if ($isNew == 0) {
            $sqlQuery = "UPDATE  
                " . $this->db_table . "" .
                    " SET `product_id` = '$product_id',`variant_name` = '$product_variant_name',`barcode` = '$barcode'," .
                    "`SKU_code` = '$SKU_code',`variant_mrp` = '$variant_mrp',`variant_sellingprice` = '$variant_sellingprice',`variant_costprice` = '$variant_costprice'," .
                    "`variant_openingstock` = '$variant_openingstock',`is_show_online` = '$is_show_online',`is_top_offer_product` = '$is_top_offer_product'," .
                    "`online_mrp` = '$online_mrp',`online_sellingprice` = '$online_sellingprice' WHERE `productvariant_id` = '$productvarient_id';";
        }
        $stmt = $this->conn->prepare($sqlQuery);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function Delete_Productvarient() {
        $productvarient_id = $this->productvarient_id;
        $sqlQuery = "update " . $this->db_table . "" .
                " set is_deleted = '1' where productvariant_id = '$productvarient_id'";
        $stmt = $this->conn->prepare($sqlQuery);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

?>