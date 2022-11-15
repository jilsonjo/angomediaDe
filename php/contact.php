<?PHP
ob_start();
header('Access-Control-Allow-Origin: *');
//require_once "./funcs.php";
require_once "./Contact_db.class.php";
require_once "./mailer.php";

date_default_timezone_set("Europe/Berlin");
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', 1);

require "Validations.php";
$validate_data = new Validation();

$error_data = array();
$form_data = array();
$db_error = array();
$form_data = $validate_data->get_form_data();

if ($form_data['firstname'] !== "") { // Honeypot gegen Spam
    die("This is a Spam");
}

$data = $validate_data->Validate_data($form_data);
$error_data = $data["error_data"];
$form_data = $data["form_data"];
/* echo "<pre>";
    print_r($form_data);
    echo "</pre>"; */

if (count($error_data) > 0) {
    $error_data["dataError"] = true;
    echo json_encode($error_data);
} else {
    $gender = $form_data["cgender"];
    $name = $form_data["cname"];
    $email = $form_data["cemail"];
    $fone = $form_data["cfone"];
    $message = $form_data["cmessage"];


    $date_time = time();

    $db_data = new Contact_db($date_time, $gender, $name, $email, $fone, $message);
    $data = $db_data->insert_contact_data();
    /* echo "<pre>";
    print_r($data);
    echo "</pre>"; */
    /* echo json_encode($data); */
    $user = $name . ": " . $email;
    $body = $message;
    $altBody = $message;

    if ($data && send_contact_email($email, $body, $altBody)) {
        $db_error["dbError"] = false;
        echo json_encode($db_error);
    }

    /*  if($data){
        $db_error["dbError"] = false;
        echo json_encode($db_error); 
    } */


    $Subject = "Anfrage";
    $recipient_address = "jodigitaldev@gmail.com";
    $recipient_name = "Angomedia";

    /*  if(send_contact_email_to_admin($recipient_address, $recipient_name, $Subject, $message)){
        $form_data["email-sent"] = true;    
    } */

    //$user_contact = $db_data -> get_contact_data();

    /* if($form_data["insert-data-to-db"] === true || $form_data["email-sent"] === true){
        $form_data["success"] = true; 
    } */

    /* echo json_encode($form_data); */
}
ob_end_flush();
