<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHHPMailer.php";
require "PHPMailer/src/SMTP.php";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rbeen44@gmail.com';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Coupains Avant');
    $mail->addAddress('', '');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact- Coupains Avant</title>
    <link rel="stylesheet" href="contactnous.css">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="accueil.php"><img src="images/ofpptlogo.svg" alt="" /></a>
        </div>
    </nav>

    <section>
        <div class="left-side">
            <div class="text">
                <h2>Contactez-nous</h2>
                <p>Nous serions ravis de vous entendre ! Que vous ayez une question, une suggestion 
                    ou que vous souhaitiez simplement dire bonjour, n'hésitez pas à nous contacter. 
                    Remplissez le formulaire ci-dessous et nous vous répondrons dès que possible.
                </p>
            </div>
            <form action="contact.php" method="post">
                <input type="text"  name="nom" placeholder="Nom complet" /><br />
                <input type="text"  name="email" placeholder="Adresse e-mail"/><br />
                <input type="text"  name="email" placeholder="Sujet du message"/><br />
                <textarea name="message" id="message" placeholder="Posez votre question ou faites une suggestion..."></textarea> <br>
                <input type="submit" value="Envoyer">
            </form>
        </div>
        <div class="right-side">
            <img src="images/5425970_Mail sent.svg" alt="">
        </div>
    </section>
</body>
</html>