<?php
function mailer($email,$subject,$body){
	require('phpf/phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer;
        $mail->Host='smtp.gmail.com';
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;      
        $mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username='hayar.h.fst@uhp.ac.ma';
        $mail->Password='HAMZA@hambh';
        $mail->addReplyTo($email);
        $mail->isHTML(true);
        $mail->setFrom($email,"my name");
        $mail->addAddress($email,"hamza");
        $mail->Subject=$subject;
        $mail->Body=$body;
        if(!$mail->send()){
          return false;
        }
        return true;
}


?>