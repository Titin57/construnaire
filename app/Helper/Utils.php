<?php

namespace Helper;

use PHPMailer;

class Utils {
    /**
     * Méthode statique permettant d'envoyer simplement un email
     * @param type $to l'email du destinataire
     * @param type $subject l'objet de l'email
     * @param type $htmlContent le contenu HTML de l'email
     * @param type $textContent le contenu texte (optionnel) de l'email
     * @return boolean true si l'email a bien été envoyé, false sinon
     */
    public static function sendEmail($to, $subject, $htmlContent, $textContent='') {
        $mail = new PHPMailer();

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.googlemail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'carlo.specchio@gmail.com';                 // SMTP username
        $mail->Password = file_get_contents('C:\xampp\htdocs\construnaire\inc\myText.txt');                           // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to

        $mail->setFrom('carlo.specchio@gmail.com', 'Carlo');
        $mail->addAddress($to); // Add a recipient

        $mail->isHTML(true); // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $htmlContent;
        $mail->AltBody = $textContent;

        if(!$mail->send()) {
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        }
        else {
            return true;
        }
    }
}
