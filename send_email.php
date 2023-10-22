<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sendMail($email, $name, $subject, $message)
{
    // Load .env file
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $sender_mail = getenv('SENDER_MAIL');
    $host_mail = getenv('HOST_MAIL');
    $port_mail = getenv('PORT_MAIL');
    $sender_name = getenv('SENDER_NAME');

    $mail = new PHPMailer(true);
    // to debug
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = $host_mail;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $port_mail;

    $mail->setFrom($email, $name);
    $mail->addAddress($sender_mail, $sender_name);

    $mail->Subject = $subject;
    $mail->Body = $message;

    return $mail->send();
}
