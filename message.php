<?php
   // echo "This msg is sent from PHP file";
    //let's get all form values
    if(isset($_POST["btn_send"])){
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $subject = $_POST['subject']; 
    $message = $_POST['message']; 

    if(!empty($email) && !empty($message)) { // if email and message field is not empty 
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if user entered email is valid 
            $receiver = "bilalsahli1999@gmail.com"; // email receiver email address
            $subject = "From: $name <$email>" //subject of the email. Subject looks like From: Maghrette <abc@visma.no> 
            //merging concating all user values inside body variable. \n used for new line. 
            $body = "Name: $name\nEmail: $email \nSubject: $subject \nMessage: $message"; 
            $sender = "From: $email"; // email sender 
            if(mail($receiver, $subject, $body, $sender)) { //mail()is a inbuilt php function to send mail 
                echo "Your message has been sent"; 
            }else{
                echo "Sorry, failed to send your message!"; 
            }
        } 
        else{
            echo"Enter a valid email address!"
        }
    }
        else {
            echo "Email and message field is required!"
        }
    }
   
?>