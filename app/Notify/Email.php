<?php

namespace App\Notify;

use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use SendGrid;
use SendGrid\Mail\Mail;
use Mailjet\Client;
use Mailjet\Resources;

class Email extends NotifyProcess implements Notifiable {

    public $email;
    public $templateName;
    public $shortCodes;
    public $user;
    public $setting;
    public $createLog;
    public $userColumn;
    public $statusField;
    public $body;
    public $notifyConfig;
    public $subject;
    public $finalMessage;
    public $receiverName;

    public function __construct() {
        $this->statusField = 'email_status';
        $this->body = 'email_body';
        $this->notifyConfig = 'mail_config';
    }

    public function setTemplateName($templateName) {
        $this->templateName = $templateName;
    }

    public function setShortCodes($shortCodes) {
        $this->shortCodes = $shortCodes;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setSetting($setting) {
        $this->setting = $setting;
    }

    public function setCreateLog($createLog) {
        $this->createLog = $createLog;
    }

    public function setUserColumn($userColumn) {
        $this->userColumn = $userColumn;
    }

    public function send() {
        $message = $this->getMessage();
        if ($this->setting->en && $message) {
            $methodName = $this->setting->mail_config->name;
            $method = $this->mailMethods($methodName);
            try {
                $this->$method();
                if ($this->createLog) {
                    $this->createLog('email');
                }
            } catch (\Exception $e) {
                $this->createErrorLog($e->getMessage());
                session()->flash('mail_error', $e->getMessage());
            }
        }
    }

    protected function mailMethods($name) {
        $methods = [
            'php' => 'sendPhpMail',
            'smtp' => 'sendSmtpMail',
            'sendgrid' => 'sendSendGridMail',
            'mailjet' => 'sendMailjetMail',
        ];
        return $methods[$name];
    }

    protected function sendPhpMail() {
        $general = $this->setting;
        $headers = "From: $general->site_name <$general->email_from> \r\n";
        $headers .= "Reply-To: $general->site_name <$general->email_from> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        @mail($this->email, $this->subject, $this->finalMessage, $headers);
    }

    protected function sendSmtpMail() {
        $mail = new PHPMailer(true);
        $general = $this->setting;
        $config = $general->mail_config;
        $mail->isSMTP();
        $mail->Host = $config->host;
        $mail->SMTPAuth = true;
        $mail->Username = $config->username;
        $mail->Password = $config->password;
        $mail->SMTPSecure = ($config->enc == 'ssl') ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $config->port;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom($general->email_from, $general->site_name);
        $mail->addAddress($this->email, $this->receiverName);
        $mail->addReplyTo($general->email_from, $general->site_name);
        $mail->isHTML(true);
        $mail->Subject = $this->subject;
        $mail->Body = $this->finalMessage;
        $mail->send();
    }

    protected function sendSendGridMail() {
        $general = $this->setting;
        $sendgridMail = new Mail();
        $sendgridMail->setFrom($general->email_from, $general->site_name);
        $sendgridMail->setSubject($this->subject);
        $sendgridMail->addTo($this->email, $this->receiverName);
        $sendgridMail->addContent("text/html", $this->finalMessage);
        $sendgrid = new SendGrid($general->mail_config->appkey);
        $response = $sendgrid->send($sendgridMail);
        if ($response->statusCode() != 202) {
            throw new \Exception(json_decode($response->body())->errors[0]->message);
        }
    }

    protected function sendMailjetMail() {
        $general = $this->setting;
        $mj = new Client($general->mail_config->public_key, $general->mail_config->secret_key, true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $general->email_from,
                        'Name' => $general->site_name,
                    ],
                    'To' => [
                        [
                            'Email' => $this->email,
                            'Name' => $this->receiverName,
                        ]
                    ],
                    'Subject' => $this->subject,
                    'TextPart' => "",
                    'HTMLPart' => $this->finalMessage,
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        if ($response->getStatus() != 200) {
            throw new \Exception('Mailjet error: ' . $response->getBody());
        }
    }

    public function prevConfiguration() {
        if ($this->user) {
            $this->email = $this->user->email;
            $this->receiverName = $this->user->fullname;
        }
        $this->toAddress = $this->email;
    }

    protected function getMessage() {
        $message = ''; // Initialize message variable
    
        // Example query to fetch message content from the database based on templateName
        $templateName = $this->templateName;
        $messageData = DB::table('notification_templates')->where('name', $templateName)->first();
    
        if ($messageData) {
            $message = $messageData->content;
        }
    
        return $message;
    }
}
