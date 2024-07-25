<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailHelper {
    public static function sendEmail($mailConfig) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');

            // Recipients
            $mail->setFrom($mailConfig['mail_from_email'], $mailConfig['mail_from_name']);
            $mail->addAddress($mailConfig['mail_recipient_email'], $mailConfig['mail_recipient_name']);

            // Content
            $mail->isHTML(false); // Set email format to plain text
            $mail->Subject = $mailConfig['mail_subject'];
            $mail->Body    = $mailConfig['mail_body'];

            $mail->send();
            return true;
        } catch (Exception $e) {
            // Log the error message if needed
            return false;
        }
    }
}
