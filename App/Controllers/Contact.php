<?php

namespace App\Controllers;

use \Core\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Contact extends \Core\Controller
{
    public function indexAction()
    {
        View::renderTemplate('Contact/index.html', [
            "public_url" => PUBLIC_URL,
            "active" => 'contact',
        ]);
    }
    public function sendForm()
    {
        if (isset($_POST['data']))
        {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = false;                    
                $mail->isSMTP();                                        
                $mail->Host       = CONTACT_EMAIL_HOST;              
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = CONTACT_EMAIL_USERNAME;                
                $mail->Password   = CONTACT_EMAIL_PASSWORD;       
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
                $mail->Port       = CONTACT_EMAIL_PORT;

                //Recipients
                $mail->setFrom(CONTACT_EMAIL_USERNAME, CONTACT_EMAIL_NAME);
                $mail->addAddress('lex.udristioiu@gmail.com', 'Mihai');

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Mesaj nou de la '.CONTACT_EMAIL_NAME;
                $mail->Body    = 'Ai primit o cerere de contact de la '.$_POST['data']['name'].' cu nr de telefon '.$_POST['data']['phone'];
                $mail->AltBody = 'Ai primit o cerere de contact de la '.$_POST['data']['name'].' cu nr de telefon '.$_POST['data']['phone'];

                $mail->send();
                exit('done');
            } catch (Exception $e) {
                exit('no-data');
            }
        }
        else
        {
            exit('no-data');
        }
    }
}
