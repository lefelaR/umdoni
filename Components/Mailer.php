<?php

namespace Components;

use PHPMailer\PHPMailer\PHPMailer;
 

class Mailer extends PHPMailer
{

    public $Mail;
    public $Host;
    public $Port;

    public function __construct() {
        // $this->Port = 2079;
        // $this->Host = 'http://mail.umdoni.gov.za';
        $this->Port = 1025;
        $this->Host = 'localhost';
    }



    public function send(
        string $to = null , 
        string $from = '', 
        string $fromName = '',
        string $subject = null, 
        string $body= null, 
        $attachment = null)
    {
            $Mail = new PHPMailer();
            $Mail->isSMTP();
            // $Mail->SMTPAuth = true;
            // $Mail->Username = 'isu@umdoni.gov.za'; // Your SMTP username
            // $Mail->Password = '29019WtP98zj23'; // Your SMTP password
            // $Mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encryption type (STARTTLS/SSL)
            $Mail->Port = $this->Port; // SMTP port
            $Mail->Host = $this->Host;


            $Mail->From = $from;
            $Mail->FromName = $fromName; //To address and name 
            $Mail->addAddress($to, $fromName);//Recipient name is optional
            $Mail->isHTML(true);
            $Mail->Subject = $subject;
            $Mail->Body = $body;

            try {
                if($Mail->send()){
                    return true;
                }
            } catch (\Throwable $th) {
                throw $th;
            }

    }


}