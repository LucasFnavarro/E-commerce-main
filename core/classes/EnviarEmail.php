<?php

namespace core\classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EnviarEmail
{
    public function enviar_email_confirmacao_novo_cliente($email_cliente)
    {


        # envia um email para o cliente na intenção de confirmar o email



        //$purl = '';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // opções do servidor
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      
            $mail->isSMTP();                                            
            $mail->Host       = EMAIL_HOST;                   
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = EMAIL_FROM;                    
            $mail->Password   = EMAIL_PASS;                            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = EMAIL_PORT;                                    

            // emissor e recetor
            $mail->setFrom(EMAIL_FROM, APP_NAME);
            $mail->addAddress($email_cliente);     

            // assunto
            $mail->isHTML(true);                                  
            $mail->Subject = APP_NAME . 'Confirmação de email.';
            $html = '<p>Seja bem-vindo à nossa loja ' . APP_NAME . '</p>';
            $mail->Body    = $html;
           

            $mail->send();
            echo 'E-mail enviado com sucesso';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
