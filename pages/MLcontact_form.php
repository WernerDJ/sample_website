<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        /* Styling for Contact Form */
        body {
            font-family: Arial, sans-serif;
            background-color: #191970; /* Midnight Blue background */
            color: #FFFFFF; /* White text color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            color: #FF7F50; /* Coral color for the title */
            text-align: center;
            margin-bottom: 20px;
            font-size: 2em;
        }

        form {
            background-color: #2C3E50; /* Dark background */
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #FF7F50; /* Coral color for labels */
            font-weight: bold;
            font-size: 1.1em;
        }

        input[type="email"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 2px solid #34495E; /* Lightened dark border */
            border-radius: 5px;
            background-color: #34495E; /* Dark input background */
            color: #FFFFFF;
            font-size: 1em;
        }

        input[type="email"]:focus,
        input[type="text"]:focus,
        textarea:focus {
            border-color: #FF7F50; /* Coral color on focus */
            outline: none;
        }

        input[type="submit"] {
            background-color: #FF7F50; /* Coral color */
            color: #FFFFFF;
            padding: 12px;
            margin-top: 15px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #FF4500; /* Slightly darker coral on hover */
        }
    </style>
</head>
<body>
    <?php
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

    $formLabels = [
        'en' => ['email' => 'Your Email', 'subject' => 'Subject', 'message' => 'Message', 'send' => 'Send'],
        'es' => ['email' => 'Tu correo electrónico', 'subject' => 'Asunto', 'message' => 'Mensaje', 'send' => 'Enviar'],
        'pl' => ['email' => 'Twój e-mail', 'subject' => 'Temat', 'message' => 'Wiadomość', 'send' => 'Wyślij']
    ];

    $labels = $formLabels[$lang];
    ?>
<form action="/../php/send_email.php" method="post">
    <!-- Hidden field to pass the selected language -->
    <input type="hidden" id="lang" name="lang" value="">

    <h2><?= $labels['subject'] ?></h2>
    
    <label for="userEmail"><?= $labels['email'] ?>:</label>
    <input type="email" id="userEmail" name="userEmail" required>

    <label for="subject"><?= $labels['subject'] ?>:</label>
    <input type="text" id="subject" name="subject" required>

    <label for="message"><?= $labels['message'] ?>:</label>
    <textarea id="message" name="message" rows="6" required></textarea> 

    <input type="submit" value="<?= $labels['send'] ?>">
</form>
</body>
</html>
