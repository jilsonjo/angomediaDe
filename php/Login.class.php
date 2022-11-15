<?php 
require_once "./Database.class.php";
require_once "./Config.php";

class Login extends Database{
    private $input_email;
    private $input_password;
    private $hashed_password;

    public function __construct($email, $password)
    {
        parent::__construct();
        $this->input_email = $email;
        $this->input_password = $password;
    }
    public function get_db_password(){
        $this->query('
        SELECT email, password, status
        FROM juser 
        WHERE email = :email
        ');
        $this->bind(':email', $this->input_email);
        $row = $this->single();
        return $row;
    }
    public function hash_password(){
        $this->hashed_password = password_hash($this->input_password, PASSWORD_DEFAULT);
        return $this->hashed_password;
    }
    public function verify_password(){
        password_verify($this->input_password, $this->get_db_password());
    }
    public function logout(){
        session_destroy();
        header('Location: https://angomedia.deKontakt.html');
    }
}
