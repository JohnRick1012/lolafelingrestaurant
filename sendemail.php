<?php 
 require 'phpmailer/PHPMailerAutoload.php';
 $mail = new PHPMailer;
 $mail->isSMTP();
 $mail->Host='smtp.gmail.com';
 $mail->Port=587;
 $mail->SMTPAuth=true;
 $mail->SMTPSecure='tls';

 $mail->Username='gererojoelife27@gmail.com';
 $mail->Password='xtnbqjxtitzaclbh';

 $email = $_POST['email'];
 $subject = $_POST['subject'];
 $message = $_POST['message'];

 $mail->setFrom('devfensejamolin@gmail.com');
 $mail->addAddress($email);
 $mail->addReplyTo('devfensejamolin@gmail.com');

 $mail->isHTML(true);
 $mail->Subject= $subject;
 $mail->Body= $message;

 if(!$mail->send()){
    echo "message could not be sent!";
 }
 else {
    echo "Message has been sent!";
 }
?>