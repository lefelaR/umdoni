<?php

namespace Components;

use PHPMailer\PHPMailer\PHPMailer;
 

class Mailer extends PHPMailer
{

    public $Mail;
    public $Host;
    public $Port;

    public function __construct() {
        $this->Port = $_ENV['SMTPPORTOUTGOING'];
        $this->Host = $_ENV['STMPSERVER'];
        
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
            $Mail->Port = $this->Port;
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