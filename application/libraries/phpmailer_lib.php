<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 require_once APPPATH.'/third_party/PHPMailer/Exception.php';
require_once APPPATH.'/third_party/PHPMailer/PHPMailer.php';
require_once APPPATH.'/third_party/PHPMailer/SMTP.php';

class Phpmailer_lib
{
    public function __construct(){
        // log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load($correo,$nombre,$usuario,$pwd){
       

        $mail = new PHPMailer;
                       
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'eventosreserva2024@gmail.com';                     //SMTP username
            $mail->Password   = 'dqoayqdkhupfgmgq';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('eventosreserva2024@gmail.com', 'eventos');
            $mail->addAddress($correo, $nombre);     //Add a recipient

            //Content
            $mail->isHTML(true);         
                                    //Set email format to HTML
            $mail->Subject = 'Eventos El Dorado';
            $mail->Body    = '<!DOCTYPE>
                <html>
                <head>
                  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
                  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
                 
                </head>
                <body >
                  
                <div style="background: #ffffff; margin: 20px; padding:5px; width:400px">
                  
                
                  <div  style=" height: 50px; background:#ffffff; color: #C0C0C0;display: flex; justify-content: center ;padding:2px; font-size: 20px; font-weight: bold;">
                     <p > Bienvenido</p>
                   </div>
                
               
                  <div class="" style="background:#C0C0C0 ;margin: 5px;padding: 5px;">

                   <div >
                    <div style="height: 30px; background: #fff; margin:10px;padding: 10px;color: #001f3f; display:flex;flex-direction: column;align-items: flex-start;; border-radius: 5px;">
                      <button style=" background: transparent; border-style: none; font-size:15px">Sistema de  reserva para eventos </button>
                      

                    </div>
                    <div class="" style="height:200px ; background: #fff; margin: 10px;padding: 10px; border-radius: 5px;">
                      <div> 
                        
                        <p>usuario:'. $usuario.'</p>
                        <p>contrania:'.$pwd.'</p>

                      </div>
                    </div>
                    <div  style="height: 30px; background: #e2f1ff; margin: 10px;padding: 10px; display: flex; justify-content:center; border-radius: 5px;">
                     <button style="background:#28A745;border-radius: 10px;">  <a href="http://localhost/web2/proyectodegrado/proyectojuan/index.php/usuario/login" class=" Default" style=" text-decoration: none; color:#ffb349;font-weight: bold;margin: 10px; ">Link acceso</a></button>
                    </div>
                  </div>



                </div>
              

            
         
        </div>


          
        </body>
        </html>';
        $mail->CharSet = 'UTF-8';

     if ($mail->send()) {
        return true;
      } else {
        return false;
      }

    }
}



