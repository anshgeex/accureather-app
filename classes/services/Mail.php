<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHMailer\Exception;

class Mail
{
    private $mailer;
    public function __construct()
    {
        $this->mailer = new PHPMailer(true);

        $this->mailer->isSMTP();
        $this->mailer->Host = app()->mailHost; 
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = app()->mailUsername; //'abhishek.codegeex@gmail.com'; 
        $this->mailer->Password = app()->mailPassword; //'dgwmggahogdfmkpl';
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = app()->mailProt;
        $this->mailer->isHTML(true);
        $this->mailer->setFrom(app()->mailUsername, 'Admin');
    }

    public function sendEmail($to, $subject, $body, $altBody = '', $file=null)
    {
        try {
            $this->mailer->addAddress($to);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;
            $this->mailer->AltBody = $altBody; // For non-HTML mail clients
            if( $file ){
                $this->mailer->addAttachment($file);
            }

            return $this->mailer->send();
        } catch (Exception $e) {
            return "Mailer Error: {$this->mailer->ErrorInfo}";
        }
    }

    public function addAttachment($filePath)
    {
        try {
            $this->mailer->addAttachment($filePath);
        } catch (Exception $e) {
            return "Attachment Error: {$this->mailer->ErrorInfo}";
        }
    }
}

?>
