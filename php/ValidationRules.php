<?php

Class ValidationRules {
    public function __construct(){
    }

    public function clean_data($value){
        return (htmlspecialchars(stripslashes(trim($value)),ENT_QUOTES,'UTF-8'));
    }

    public function sanitize_string($value){
        return (filter_var($value, FILTER_SANITIZE_STRING));
    }

    public function required($value) {
        return (strlen($value) == 0 || strlen($value) == "");
    }

    public function min_length($value, $param){
        return (strlen($value) < $param);
    }

    public function max_length($value, $param) {
        return (strlen($value) > $param);
    }

    public function email($value) {
        return !filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function ip($value) {
        return !filter_var($value, FILTER_VALIDATE_IP);
    }

    public function compare($value, $value2){
        return ($value === $value2);
    }

    public function match($value, $param){
        return ($value != $param);
    }

    public function match_exact($value, $param) {
        return ($value !== $param);
    }

    public function match_password($value, $param) {
        return ($value !== $param);
    }

    public function alphanum($value){
        return !ctype_alnum($value);
    }
    public function alphanumeric_regex($value){
        return preg_match('/[^a-zA-Z0-9üäöÜÄÖßãõáéóíúâêÃÕÁÉÓÍÚÂÊ ]/', $value);
    }
    public function alpha_regex($value){
        return preg_match('/[^a-zA-ZüäöÜÄÖßãõáéóíúâêÃÕÁÉÓÍÚÂÊ ]/', $value);
    }

    public function url($value){
        return !filter_var($value, FILTER_VALIDATE_URL);
    }

    public function numeric($value){
        return !(is_numeric($value));
    }

    public function min($value, $param) {
        return ($value < $param);
    }

    public function max($value, $param) {
        return ($value > $param);
    }

    public function compare_dates($start_date, $end_date) {
        $timestamp1 = strtotime($start_date);
        $timestamp2 = strtotime($end_date);
        return ($timestamp1 < $timestamp2);
    }

    /*$datetime1 = new DateTime('2009-10-11 12:12:00');
    $datetime2 = new DateTime('2009-10-13 10:12:00');*/
    public function datetimes_interval($datetime1, $datetime2) {
        return ($datetime1->diff($datetime2));
    }

    public function select_value($value){
        return ((strlen($value) !== 0)OR($value != ""));
    }

    public function radio_checked($value, $param) {
        if(!empty($_POST['radio'])) {
            echo '  ' . $_POST['radio'];
        } 
    }

    public function check_box($value, $param) {
        if(!empty($hoby)){                
            foreach($_POST['hoby'] as $val){
                echo $val . '<br>';
            }
        } 
    }
}