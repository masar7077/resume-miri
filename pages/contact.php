<?php
include("database/config.php");
require_once("database/db_functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // اعتبارسنجی ساده فیلدها
    if (!empty($name) && !empty($email) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // ذخیره پیام در دیتابیس
            saveContactMessage($name, $email, $message);
            $success_msg = "پیام شما با موفقیت ارسال شد!";
        } else {
            $error_msg = "ایمیل معتبر وارد کنید.";
        }
    } else {
        $error_msg = "لطفاً همه‌ی فیلدها را پر کنید.";
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>تماس با من</title>
</head>
<body>

    <h2>فرم تماس</h2>

    <!-- نمایش پیام موفق یا خطا -->
    <?php if (isset($success_msg)) echo "<p class='success'>$success_msg</p>"; ?>
    <?php if (isset($error_msg)) echo "<p class='error'>$error_msg</p>"; ?>

    <!-- فرم ارسال پیام -->
    <form method="POST">
        <input type="text" name="name" placeholder="نام شما" required>
        <input type="email" name="email" placeholder="ایمیل شما" required>
        <textarea name="message" placeholder="پیام شما" required></textarea>
        <button type="submit">ارسال پیام</button>
    </form>

</body>
</html>