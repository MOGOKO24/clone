<?php
// Подключение классов PHPMailer
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Создаем экземпляр PHPMailer
$mail = new PHPMailer(true);

try {
    // Настройки сервера SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Укажите адрес SMTP сервера
    $mail->SMTPAuth = true;
    $mail->Username = 'iuriejuve2022@gmail.com'; // Укажите вашу почту
    $mail->Password = 'lcobqxkhfyrbphcc';  // Укажите пароль от почты
    $mail->SMTPSecure = 'tls';   // Укажите тип шифрования ('tls' или 'ssl'; можно не указывать для стандартного 'tls')
    $mail->Port = 587;  // Укажите порт SMTP сервера (обычно 587 для TLS, 465 для SSL)

    // Настройки сообщения
    $mail->setFrom('your-email@example.com', 'Mailer'); // Адрес отправителя и его имя
    $mail->addAddress('recipient@example.com');  // Адрес получателя

    // Данные из формы
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Содержание письма
    $mail->isHTML(false);
    $mail->Subject = "Новое сообщение от $name";
    $mail->Body    = "Имя: $name\nEmail: $email\n\nСообщение:\n$message";

    // Отправка письма
    $mail->send();
    echo '<script>alert("Сообщение отправлено успешно.");</script>';
} catch (Exception $e) {
    echo '<script>alert("Ошибка отправки сообщения. Пожалуйста, попробуйте позже.");</script>';
    // Для отладки:
    // echo 'Ошибка при отправке сообщения: ', $mail->ErrorInfo;
}
?>
