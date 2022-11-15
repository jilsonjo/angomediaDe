<?php 
require_once "./Database.class.php";
require_once "./Config.php";

class Contact_db extends Database{
    private $Cgender;
    private $Cname;
    private $Cemail;
    private $Cfone;
    private $Cmessage;
    private $Cdatetime;

    public function __construct($cdatetime, $gender, $name, $email, $fone, $message)
    {
        parent::__construct();

        $this->Cdatetime = $cdatetime;
        $this->Cgender = $gender;
        $this->Cname = $name;
        $this->Cemail = $email;
        $this->Cfone = $fone;
        $this->Cmessage = $message;
    }
    public function get_single_contact(){
        $this->query('
        SELECT CGender, CName, CEmail, CFone, CMessage
        FROM jcontact 
        WHERE CName = :cname
        ');
        $this->bind(':cname', $this->Cname);
        $row = $this->single();
        return $row;
    }
    public function get_contact_data(){
        $this->query('
        SELECT *
        FROM jcontact 
        ');
        $rows = $this->resultset();
        return $rows;
    } 

    public function insert_contact_data(){

        $this->query('INSERT INTO jcontact (CDatetime, CGender, CName, CEmail, CFone, CMessage) 
        VALUES (:cdatetime, :cgender, :cname, :cemail, :cfone, :cmessage)');

        $this->bind(':cdatetime', $this->Cdatetime);
        $this->bind(':cgender', $this->Cgender);
        $this->bind(':cname', $this->Cname);
        $this->bind(':cemail', $this->Cemail);
        $this->bind(':cfone', $this->Cfone);
        $this->bind(':cmessage', $this->Cmessage);

        $this->execute();
        $this->lastInsertId();
        return true;
    }
}
?>