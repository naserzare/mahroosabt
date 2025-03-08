<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // دریافت مقادیر از فرم
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // تنظیم ایمیل
    $to = "naserzare@live.com"; // آدرس ایمیل شما
    $subjectEmail = "پیام جدید از فرم تماس: " . $subject;
    $messageEmail = "نام: " . $name . "\n" .
                    "ایمیل: " . $email . "\n\n" .
                    "پیام:\n" . $message;

    // هدرهای ایمیل
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // ارسال ایمیل
    if (mail($to, $subjectEmail, $messageEmail, $headers)) {
        echo json_encode(["status" => "success", "message" => "پیام شما با موفقیت ارسال شد."]);
    } else {
        echo json_encode(["status" => "error", "message" => "مشکلی در ارسال پیام به وجود آمد."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "روش درخواست صحیح نیست."]);
}
?>