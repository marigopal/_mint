<?php

class Product_type {

    private $conn;
    private $db_table = "tbl_producttype";
    public $producttype_id;
    public $producttype_name_en;
    public $producttype_name_hn;
    public $producttype_name_kn;
    public $producttype_name_tm;
    public $producttype_name_tl;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function get_producttype() {
        $lang_code = $this->language_code;
        $sqlQuery = "SELECT `tbl_producttype`.`producttype_id`,
                        Case 
                            When '" . $lang_code . "' = 'en' Then `tbl_producttype`.`producttype_name_en` " .
                "When '" . $lang_code . "' = 'hn' Then `tbl_producttype`.`producttype_name_hn` " .
                "When '" . $lang_code . "' = 'kn' Then `tbl_producttype`.`producttype_name_kn` " .
                "When '" . $lang_code . "' = 'tm' Then `tbl_producttype`.`producttype_name_tm` " .
                "When '" . $lang_code . "' = 'tl' Then `tbl_producttype`.`producttype_name_tl` " .
                "End As producttype_name, " .
                "`tbl_producttype`.`is_deleted`" .
                " FROM 
                        " . $this->db_table . " 
                        where `is_deleted` = '0'";
        $stmt_producttype = $this->conn->prepare($sqlQuery);
        $stmt_producttype->execute();
        return $stmt_producttype;
    }
}

?>