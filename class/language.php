<?php

class Language {

    private $conn;
    private $db_table = "tbl_language";
    public $language_id;
    public $language_name;
    public $language_code;
    public $is_active;
    public $is_deleted;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function get_Language() {
        $sqlQuery = "SELECT `tbl_language`.`language_id`,
            `tbl_language`.`language_name`,
            `tbl_language`.`language_code`,
            `tbl_language`.`is_active`,
            `tbl_language`.`is_deleted`
            FROM
         " . $this->db_table . " where is_active = '1'  and is_deleted = '0'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function get_Languageid() {
        $get_Languageid_lang_code = $this->id;
        $sqlQuery = "SELECT `tbl_language`.`language_id`,
            `tbl_language`.`language_name`,
            `tbl_language`.`language_code`,
            `tbl_language`.`is_active`,
            `tbl_language`.`is_deleted`
            FROM
         " . $this->db_table . " where language_code= '$get_Languageid_lang_code' and is_active = '1' and is_deleted = '0'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->language_id = $dataRow['language_id'];
    }

    public function validate_lang() {
        $lang_code = $this->id;
        $sqlQuery = "SELECT `tbl_language`.`language_id`,
                        `tbl_language`.`language_name`,
                        `tbl_language`.`language_code`,
                        `tbl_language`.`is_active`,
                        `tbl_language`.`is_deleted`
                        FROM `tbl_language` 
                        where language_code = '$lang_code' and is_active = '1' and is_deleted = '0'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}

?>