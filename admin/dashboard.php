<?php
session_start();
include("../database/config.php");

// بررسی ورود مدیر
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// دریافت تعداد مقالات، نمونه کارها و پیام‌های تماس
$blog_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM blog"));
$portfolio_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM portfolio"));
$messages_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM contact_messages"));
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>داشبورد مدیریت</title>
    <link rel="stylesheet" href="../assets/css/admin_style.css">
</head>
<body>

    <h2>داشبورد مدیریت</h2>

    <div class="stats">
        <div class="stat-box">
            <h3>مقالات بلاگ</h3>
            <p><?php echo $blog_count; ?> مقاله</p>
            <a href="blog_manager.php">مدیریت مقالات</a>
        </div>

        <div class="stat-box">
            <h3>نمونه کارها</h3>
            <p><?php echo $portfolio_count; ?> پروژه</p>
            <a href="portfolio_manager.php">مدیریت نمونه کارها</a>
        </div>

        <div class="stat-box">
            <h3>پیام‌های تماس</h3>
            <p><?php echo $messages_count; ?> پیام جدید</p>
            <a href="contact_messages.php">مشاهده پیام‌ها</a>
        </div>
    </div>

    <a href="visitor_log.php">مشاهده آمار بازدیدکنندگان</a>
    <a href="logout.php">خروج از سیستم</a>

</body>
</html>