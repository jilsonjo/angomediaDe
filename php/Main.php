<?php
    date_default_timezone_set("Europe/Berlin");
    error_reporting(E_ALL & ~E_DEPRECATED);
    ini_set('display_errors', 1);

    require "validation.php";
    $Validate_data = new Validation();
    
    $form_data = $validate_data->get_form_data();
    $data = $validate_data->Validate_data($form_data);
    if($data){
        $error_data = $data["error_data"];
        $form_data = $data["form_data"];
        if(count($error_data)>0){
            echo json_encode($error_data);
        }
        else{
            require_once($form_data["form_name"]."php");
            //DB
        }
    }else{
        return false;
    }