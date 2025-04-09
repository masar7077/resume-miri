<?php
// تنظیمات پایگاه داده
$servername = "localhost"; // نام سرور
$username = "root"; // نام کاربری پایگاه داده
$password = ""; // رمز عبور (در صورت نیاز تنظیم شود)
$dbname = "resume_db2"; // نام پایگاه داده

// اتصال به پایگاه داده
$conn = mysqli_connect($servername, $username, $password, $dbname);

// بررسی اتصال
if (!$conn) {
    die("اتصال به پایگاه داده ناموفق بود: " . mysqli_connect_error());
}

// تنظیمات کاراکترها برای پشتیبانی از فارسی
mysqli_set_charset($conn, "utf8");
?>