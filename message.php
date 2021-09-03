<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use phpmailer\phpmailer\src\PHPMailer;
use phpmailer\phpmailer\src\SMTP;
use phpmailer\phpmailer\src\Exception;

//Load Composer's autoloader
require 'autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'stmp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bilalsahli1999@example.com';                     //SMTP username
    $mail->Password   = 'peaceman';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    if(isset($_POST["btn_send"])){
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $subject = $_POST['subject']; 
        $message = $_POST['message']; 
    }
    //Recipients
    ////Set who the message is to be sent from
    $mail->setFrom('bilalssahli1999@gmail.com', 'Bilal Sahli');
    //Set who the message is to be sent to
                                                            //Add a recipient
    $mail->addAddress('bilalssahli1999@gmail.com', 'Bilal Sahli'));               //Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = "Name: $name\nEmail: $email \nSubject: $subject \nMessage: $message";
    $mail->AltBody = "Name: $name\nEmail: $email \nSubject: $subject \nMessage: $message";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>