<?php
require "phpMailerIncludes/PHPMailer.php";
require "phpMailerIncludes/SMTP.php";
require "phpMailerIncludes/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;          //Enable verbose debug output
    $mail->isSMTP();                                  //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';             //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                         //Enable SMTP authentication
    $mail->SMTPSecure = 'tls';                        //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                          //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above                        
    $mail->Username   = 'jilsonberlin@gmail.com';     //SMTP username
    $mail->Password   = '2898xehtam2086';             //SMTP password


    //Recipients
    $mail->setFrom('no-reply@angomedia.com', 'Angomedia');
    $mail->addAddress('jilsonberlin@gmail.com', 'Tipapa');
    $mail->addAddress('jilsonjoao75@gmail.com', 'Tipapa');     //Add a recipient
    /* $mail->addAddress('jilsonfakereg@gmail.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com'); */

    //Attachments
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject with try';
    $mail->Body    = 'This is the HTML message body <b>in bold with try!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    /* if($mail->send()){
        echo 'Message has been sent';
    }
    else{
        echo "error ...";
    }
 */
    $mail->smtpClose();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

//Strato//

function send_contact_email($user, $body, $altBody)
{
    $mail = new PHPMailer(true);
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                           //Send using SMTP
    $mail->Host       = 'smtp.strato.de';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                  //Enable SMTP authentication
    $mail->Username   = 'info@angomedia.de';                    //SMTP username
    $mail->Password   = 'XXeehh&2086';                               //SMTP password
    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($user, 'Angomedia');
    $mail->addAddress('info@angomedia.de', 'Tipapa');
    $mail->addAddress('jilsonberlin@gmail.com', 'Tipapa');     //Add a recipient
    /* $mail->addAddress('jilsonfakereg@gmail.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com'); */

    //Attachments
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Angomedia: Kontakt-E-Mail von ' . $user;
    $mail->Body    = $body;
    $mail->AltBody = $altBody;

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }

    $mail->smtpClose();
}

/* $user = "Tipapa: tipapa@gmail.com";
$body = "Meine Message";
$altBody = "Meine AlternativeMessage";
if(send_contact_email($user, $body, $altBody)){
    echo "Super, E-Mail wurde gesendet.";
} */