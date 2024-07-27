<?php
// Проверка, был ли отправлен запрос POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Настройки для отправки письма
    $to = "roccomah.023@gmail.com"; // Замените на ваш email
    $subject = "New Contact Form Submission";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    // Формирование текста письма
    $email_message = "Name: " . $name . "\n" .
                     "Email: " . $email . "\n" .
                     "Message: \n" . $message;

    // Отправка письма с помощью функции mail
    if (mail($to, $subject, $email_message, $headers)) {
        // Письмо успешно отправлено
        header('Location: success.html');
    } else {
        // Ошибка при отправке письма
        echo "There was a problem sending your message. Please try again later.";
    }
} else {
    // Если запрос не POST, перенаправляем пользователя обратно на форму
    header('Location: form.html');
}
?>
