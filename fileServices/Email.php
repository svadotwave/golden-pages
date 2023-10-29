<?php 

namespace FileServices;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token) {
        
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

        // crear el objeto email

        $mail = new PHPMailer();


        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '3774df3f7e3067';
        $mail->Password = '7deeeeb18b19a1';

        $mail->setFrom('cuentas@goldenpages.com');
        $mail->addAddress( $this->email, $this->nombre);
        $mail->Subject = 'Confirma tu cuenta';

        // set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>. Has creado tu cuenta en Golden Pages, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar este mensaje.</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();

        // DEbugear Email
        // if (!$mail->send()) {
        //     debuguear($mail->ErrorInfo);
        // } else {
        //     debuguear('Correcto');
        // }


    }

    public function enviarInstrucciones() {

        // crear el objeto email

        $mail = new PHPMailer();


        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '3774df3f7e3067';
        $mail->Password = '7deeeeb18b19a1';

        $mail->setFrom('cuentas@goldenpages.com');
        $mail->addAddress( $this->email, $this->nombre);
        $mail->Subject = 'Restablece tu contraseña';

        // set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>. Has solicitado reestablecer tu contraseña, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar-contraseña?token=" . $this->token . "'>Reetablecer contraseña</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar este mensaje.</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }
}