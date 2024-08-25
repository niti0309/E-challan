<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $email = $_POST["email"]; // Corrected to use the right name attribute from the form

    if(!empty($email)) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'echallan78@gmail.com';
        $mail->Password   = 'lkydejtiviuracdp';
        $mail->SMTPSecure = 'ssl';         
        $mail->Port       = 587;

        $mail->setFrom('echallan78@gmail.com', 'Your Name');
        $mail->addAddress($email); // Adding the email address as a recipient
        $mail->isHTML(true);
        $mail->Subject = 'OTP for Change Password';
        $mail->Body    = 'Your OTP is: <b>177155</b>. Please do not share or send this to anyone to avoid any emotional trouble!';

        if($mail->send()) {
            echo '<script>alert("OTP sent successfully!");</script>';
        } else {
            echo '<script>alert("Error: Unable to send OTP.");</script>';
        }
    } else {
        echo '<script>alert("Error: Email address is empty.");</script>';
    }
}
?>
