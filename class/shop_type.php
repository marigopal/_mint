<?php

class Shop_Type {

    private $conn;
    private $db_table = "tbl_shoptype";
    public $shoptype_id;
    public $shoptype_name_en;
    public $shoptype_name_hn;
    public $shoptype_name_kn;
    public $shoptype_name_tm;
    public $shoptype_name_tl;
    public $is_active;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function get_shoptype() {
        $lang_code = $this->language_code;
        $sqlQuery = "SELECT `tbl_shoptype`.`shoptype_id`,
                Case
                        When '" . $lang_code . "' = 'en' Then `tbl_shoptype`.`shoptype_name_en`" .
                "When '" . $lang_code . "' = 'hn' Then `tbl_shoptype`.`shoptype_name_hn`" .
                "When '" . $lang_code . "' = 'kn' Then `tbl_shoptype`.`shoptype_name_kn`" .
                "When '" . $lang_code . "' = 'tm' Then `tbl_shoptype`.`shoptype_name_tm`" .
                "When '" . $lang_code . "' = 'tl' Then `tbl_shoptype`.`shoptype_name_tl`" .
                "End As shoptype_name, " .
                "`tbl_shoptype`.`is_active`," .
                "`tbl_shoptype`.`is_deleted`" .
                "FROM 
                        " . $this->db_table . " 
                        where `is_deleted` = '0'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

}

?>