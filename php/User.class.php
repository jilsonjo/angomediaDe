<?php 
require_once "./Database.class.php";
require_once "./Config.php";

class User extends Database{
    public function get_user_data(){
        $this->query('
        SELECT *
        FROM jcontact
        ORDER BY CDatetime DESC 
        ');
        $rows = $this->resultset();
        return $rows;
    }
}
?>