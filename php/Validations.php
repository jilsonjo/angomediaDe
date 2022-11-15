<?PHP
require "ValidationRules.php";

Class Validation extends ValidationRules{

    public function get_form_data(){
        $orig_form_data = array();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            foreach( $_POST as $key => $val) {
                //$val_cleaned = htmlspecialchars(stripslashes(trim($val)));
                $val_cleaned = filter_var($val, FILTER_SANITIZE_STRING);
                $orig_form_data[$key] = $val_cleaned;
            }
            return $orig_form_data;
        }
        return false; 
    }

    public function validate_data($data){
        if(count($data) > 0){
            /* echo "<pre>";
                print_r($data);
            echo "</pre>";  */
            $error_data = array();
            $form_data = array();
            $data_array = array();
            
            foreach ($data as $key=>$value) {
                switch($key){
                    case 'cgender':{
                        if($this->required($value)){
                            $error_data[$key] = "Bitte Anreden auswählen!";
                        }
                        else{
                            $form_data[$key] = $value;
                        }
                    break;
                    }
                    case 'cname':{
                        if($this->required($value)){
                            $error_data[$key] = "Bitte geben Sie Ihren vollstandigen Namen ein!";
                        }elseif($this->min_length($value, 2)){
                            $error_data[$key] = "Bitte geben Sie Ihren richtigen  Name ein!";
                        }elseif($this->max_length($value, 30)){
                            $error_data[$key] = "Name ist zu lang.";
                        }elseif($this->alpha_regex($value)){
                            $error_data[$key] = "Bitte Keine Sonderzeichen eingeben!";
                        }
                        else{
                            $form_data[$key] = $value;
                        }
                    break;
                    }
                    case 'cemail':{
                        if($this->required($value)){
                            $error_data[$key] = "Bitte geben Sie Ihren Nachname ein!";
                        }elseif($this->email($value)){
                            $error_data[$key] = "Bitte geben Sie eine gültigen E-Mail-Adresse ein!";
                        }
                        else{
                            $form_data[$key] = $value;
                        }
                    break;
                    }
                    case 'cfone':{
                        if($this->required($value)){
                            $error_data[$key] = "Bitte geben Sie Ihren Telefonnummer ein!";
                        }elseif($this->numeric($value)){
                            $error_data[$key] = "Bitte geben Sie Ihren Nachname ein";
                        }
                        else{
                            $form_data[$key] = $value;
                        }
                    break;
                    } 
                    case 'cmessage':{
                        if($this->required($value)){
                            $error_data[$key] = "Bitte Nachricht hinterlassen";
                        }elseif($this->min_length($value, 10)){
                            $error_data[$key] = "Nachricht ist zu kurz.";
                        }elseif($this->max_length($value, 400)){
                            $error_data[$key] = "Text ist zu lang.";
                        }
                        else{
                            $form_data[$key] = $value;
                        }
                    break;
                    }
                    case 'loginemail':{
                        if($this->required($value)){
                            $error_data[$key] = "Ihr Passwort oder Ihre E-Mail-Adresse ist nicht richtig!";
                        }elseif($this->email($value)){
                            $error_data[$key] = "Ihr Passwort oder Ihre E-Mail-Adresse ist nicht richtig!";
                        }
                        else{
                            $form_data[$key] = $value;
                        }
                    break;
                    }
                    case 'loginpassword':{
                        if($this->required($value)){
                            $error_data[$key] = "Ihr Passwort oder Ihre E-Mail-Adresse ist nicht richtig!";
                        }elseif($this->min_length($value, 6)){
                            $error_data[$key] = "Ihr Passwort oder Ihre E-Mail-Adresse ist nicht richtig!";
                        }elseif($this->max_length($value, 30)){
                            $error_data[$key] = "Ihr Passwort oder Ihre E-Mail-Adresse ist nicht richtig!";
                        }
                        else{
                            $form_data[$key] = $value;
                        }
                    break;
                    }            
                }
            }
            $data_array["error_data"] = $error_data;
            $data_array["form_data"] = $form_data;
            return $data_array;
        }else{
            return false;
        }
    }
}
?>
