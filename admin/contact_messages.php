<?php
session_start();
include("../database/config.php");
include("../database/db_functions.php");

// بررسی ورود مدیر
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// دریافت لیست پیام‌های فرم تماس
$messages = getContactMessages();

// حذف پیام
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    mysqli_query($conn, "DELETE FROM contact_messages WHERE id = $id");
    header("Location: contact_messages.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>مدیریت پیام‌های تماس</title>
    <link rel="stylesheet" href="../assets/css/admin_style.css">
</head>
<body>

    <h2>مدیریت پیام‌های تماس</h2>

    <table>
        <tr>
            <th>نام</th>
            <th>ایمیل</th>
            <th>پیام</th>
            <th>تاریخ ارسال</th>
            <th>عملیات</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($messages)) { ?>
        <tr>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo substr($row["message"], 0, 100); ?>...</td>
            <td><?php echo $row["sent_at"]; ?></td>
            <td>
                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('مطمئن هستید؟');">حذف</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>