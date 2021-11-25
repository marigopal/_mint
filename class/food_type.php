<?php

class Foodtype {

    private $conn;
    private $db_table = "tbl_foodtype";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function get_foodtype_languagecode() {
        $lang_code = $this->language_code;
        $sqlQuery = "SELECT `foodtype_id`,
                        Case 
                            When '" . $lang_code . "' = 'en' Then `foodtype_name_en` " .
                "When '" . $lang_code . "' = 'hn' Then `foodtype_name_hn` " .
                "When '" . $lang_code . "' = 'kn' Then `foodtype_name_kn` " .
                "When '" . $lang_code . "' = 'tm' Then `foodtype_name_tm` " .
                "When '" . $lang_code . "' = 'tl' Then `foodtype_name_tl` " .
                "End As foodtype_name_name, " .
                "`is_deleted`" .
                " FROM 
                        " . $this->db_table . " 
                        where `is_deleted` = '0'";
        $stmt_producttype = $this->conn->prepare($sqlQuery);
        $stmt_producttype->execute();
        return $stmt_producttype;
    }

}

?>