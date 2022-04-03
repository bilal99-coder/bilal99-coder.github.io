
<?php
echo "THis is sent from a php file!"; 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require_once __DIR__ . '\vendor\phpmailer\phpmailer\src\SMTP.php';
require_once __DIR__ . '\vendor\phpmailer\phpmailer\src\Exception.php';


//Load Composer's autoloader
require '.\vendor\autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                       
    $mail->Host  = gethostbyname('smtp.gmail.com'); //Send using SMTP
    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bilalsahli1999@gmail.com';                     //SMTP username
    $mail->Password   = 'peaceman';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465; 
    $mail->SMTPDebug = 2;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`        $name = $_POST['name']; 
    
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $subject = $_POST['subject']; 
    $message = $_POST['message']; 

    //Recipients
    ////Set who the message is to be sent from
    $mail->setFrom('Bilalsahli1999@gmail.com');
    //Set who the message is to be sent to
                                                            //Add a recipient
    $mail->addAddress('bilalsahli1999@gmail.com', 'Bilal Sahli');               //Name is optional
   $mail->addReplyTo($email, $name); // to set the reply to
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Set the mail Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Send email using Gmail SMTP and PHPMailer";
    $mail->Body    = 'HTML message body. <b>Gmail</b> SMTP email body.';
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

   if($mail->send()) { echo 'Message has been sent';}

   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
