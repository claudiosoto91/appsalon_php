<?php

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;


class Email{
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token){
        $this -> email = $email;
        $this -> nombre = $nombre;
        $this -> token = $token;

    }

    public function enviarConfirmacion(){
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail -> isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];

        $mail->setFrom('cuentas@appsalon.com');
        $mail -> addAddress('claudio91soto@gmail.com');
        $mail->Subject = 'Confirmar cuenta';
        //Set HTML
        $mail -> isHTML(TRUE);
        $mail -> CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ". $this->nombre . "</strong> Has creado tu cuenta en AppSalon,
            solo debes confirmarla presionando en el siguiente enlace
        </p>";
        $contenido .= "<p>Presiona aquí: <a href='https://barberiadev.alwaysdata.net/confirmar-cuenta?token=". $this->token ."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar el email
        $mail -> send();
    }

    public function enviarInstrucciones(){
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail -> isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];

        $mail->setFrom('silakwebdemo@gmail.com');
        $mail -> addAddress($this->email);
        $mail->Subject = 'Reestablee tu Password';
        //Set HTML
        $mail -> isHTML(TRUE);
        $mail -> CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ". $this->nombre . "</strong> Has solicitado reestablecer tu password
            presiona en el siguiente enlace para hacerlo
        </p>";
        $contenido .= "<p>Presiona aquí: <a href='https://barberiadev.alwaysdata.net/recuperar?token=". $this->token ."'>Recuperar Password</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar el email
        $mail -> send();        
    }
}