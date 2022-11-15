<?PHP
ob_start();
session_start();
//require_once "./funcs.php";
require_once "./Login.class.php";

date_default_timezone_set("Europe/Berlin");
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', 1);

/* echo "<pre>";
print_r($_POST);
echo "</pre>"; */

require "Validations.php";
$validate_data = new Validation();

$error_data = array();
$form_data = array();
$form_data = $validate_data->get_form_data();

if($form_data['firstname'] !== ""){ // Honeypot gegen Spam
    die("This is a Spam");
}

$data = $validate_data->Validate_data($form_data);
$error_data = $data["error_data"];
$form_data = $data["form_data"];

if(count($error_data) > 0){
    $error_data["dataError"] = true;
    echo json_encode($error_data);
}
elseif(count($form_data) > 0 ){
    $email = $form_data["loginemail"];
    $input_password = $form_data["loginpassword"];

    $date_time = time();
    
    $get_db_data = new Login($email, $input_password);
    //echo $get_db_data -> hash_password();
    $db_data = $get_db_data -> get_db_password();
    if(count($db_data) > 0){
       $db_pasword = $db_data["password"];

       /* echo "input_password: ". $input_password. " <br/> ";
       echo "db_pasword: ". $db_pasword. " <br/> ";
       echo "password_verify: ". password_verify($input_password, $db_pasword). " <br/> "; */

        if(password_verify($input_password, $db_pasword)){
            if(!isset($_SESSION['useremail'])){
                $_SESSION['useremail'] = $email;  
            }
            //echo $_SESSION['useremail']. " <br/> ";
            header('Location: https://angomedia.de/php/admin.php');
        }
        else{
            $error_data["check-mail"] = "Passwort ist nicht richtig";
            echo json_encode($error_data);
        } 
    }

}else{
    echo json_encode($error_data["err"] = 0);
}
ob_end_flush();