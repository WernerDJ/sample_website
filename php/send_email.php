<?php
require '/var/www/transcend/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.wp.pl';
        $mail->SMTPAuth = true;
        $mail->Username = 'juan_d@wp.pl';
        $mail->Password = 'Pi#31415926';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('juan_d@wp.pl', 'Contact Form');
        $mail->addAddress('franz.solon@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $mail->Body = nl2br(filter_var($_POST['message'], FILTER_SANITIZE_STRING));
        $mail->AltBody = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        $mail->send();

        // Get the selected language from the URL (default to 'en')
        $lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

        // Language-specific success messages
        $messages = [
            'en' => 'Email sent successfully!',
            'es' => '¡Correo enviado con éxito!',
            'pl' => 'E-mail wysłany pomyślnie!'
        ];

        // Display success message
        echo "<p style='color: coral; font-size: 3em; text-align: center;' id='confirmationMessage'>" . $messages[$lang] . "</p>";

        // JavaScript to show message for 2 seconds and then redirect to BlogPage.php with the correct language
        echo "
        <script>
            setTimeout(function() {
                // Redirect to the BlogPage with the correct language in the query parameter
                window.location.href = '/pages/BlogPage.php?lang=" . $lang . "';
            }, 2000);
        </script>
        ";

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
