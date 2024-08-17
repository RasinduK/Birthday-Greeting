<?php
include 'db_conn.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendBirthdayEmail($name, $email, $photo) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rasindukaushaliya245@gmail.com';
        $mail->Password = 'dvtwwuuqniirznmd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('rasindukaushaliya245@gmail.com', 'Birthday Greetings');
        $mail->addAddress($email, $name);
        $mail->addAttachment('uploads/'. $photo);

        $mail->isHTML(true);
        $mail->Subject = 'Happy Birthday!';
        $mail->Body = '<h1>Happy Birthday, ' . $name . '!</h1><p>We wish you a wonderful day filled with joy and happiness.</p>';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

$today = date('m-d');

$sql = "SELECT name, email, photo FROM employees WHERE DATE_FORMAT(birthday, '%m-%d') = '$today'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        sendBirthdayEmail($row['name'], $row['email'], $row['photo']);
    }
} else {
    echo "No birthdays today.";
}

$conn->close();
?>
