<?php
// Подключение классов PHPMailer
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Создание экземпляра объекта PHPMailer
$mail = new PHPMailer(true);

try {
    // Настройки сервера
    $mail->isSMTP();                                            // Указываем, что будем использовать SMTP
    $mail->Host       = 'smtp.gmail.com';                      // Укажите SMTP сервер
    $mail->SMTPAuth   = true;                                   // Включаем аутентификацию SMTP
    $mail->Username   = 'iuriejuve2022@gmail.com';                // Ваш email для авторизации на SMTP сервере
    $mail->Password   = 'lcobqxkhfyrbphcc';                        // Пароль от почтового ящика
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Включение шифрования TLS (рекомендуется для Gmail SMTP)
    $mail->Port       = 587;                                    // Порт SMTP сервера (обычно 587 для TLS или 465 для SSL)

    // Настройки отправителя и получателя
    $mail->setFrom('mogoreanu.ea@gmail.com', 'Your Name');      // От кого (email и имя)
    $mail->addAddress('iuriejuve2022@gmail.com', 'Recipient Name'); // Кому (email и имя)
    
     // Данные из формы
     $name = $_POST['name'];
     $email = $_POST['email'];
     $message = $_POST['message'];

    // Содержимое письма
    $mail->isHTML(false);                                       // Указываем, что письмо в формате plain text
    $mail->Subject = 'Тестовое письмо с использованием PHPMailer';
    $mail->Body    = 'Привет, это тестовое письмо, отправленное с помощью PHPMailer.';

    // Отправка письма
    $mail->send();
    echo 'Письмо успешно отправлено';
} catch (Exception $e) {
    echo "Письмо не было отправлено. Ошибка: {$mail->ErrorInfo}";
}
?>