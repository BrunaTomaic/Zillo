<?php
session_start();
$sAgentId = $_SESSION['id'];
$sjData = file_get_contents( 'data.json' ); // text from file
$jData = json_decode( $sjData ); // convert text to JSON
$sActivationKey = $jData->users->$sAgentId->ActivationKey;
$sjData = json_encode($jData, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $sjData);

// $sActivationKey = 'Gfvdh123'; //whatever we have in json file which system builds it
// $sUserId = 'U1';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'src/PHPMailer.php';
require 'src/Exception.php';
require 'src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.live.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'bruna.tomaic123@outlook.com';                     // SMTP username
    $mail->Password   = 'BrunaTomaic111';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('bruna.tomaic123@outlook.com', 'KEA VERIFY TEST');
    $mail->addAddress('bruna.tomaic123@outlook.com', 'KEA kea');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);
    $sPath =  "http://localhost/exam/api-activate-account-user.php?id=$sAgentId&key=$sActivationKey";                              // Set email format to HTML
    $mail->Subject = 'Welcome - Verify your account';
    $mail->Body    = 'Welcome ,<a href= "' . $sPath . '" > Click here to verify your account!</a>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
    header('Location: login-user.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
