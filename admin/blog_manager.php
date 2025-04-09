<?php
// شروع جلسه
session_start();
include("../database/config.php"); // اتصال به دیتابیس

// بررسی ورود مدیر
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// اضافه کردن مقاله جدید
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_post"])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $query = "INSERT INTO blog (title, content, created_at) VALUES ('$title', '$content', NOW())";
    mysqli_query($conn, $query);
    header("Location: blog_manager.php");
    exit();
}

// حذف مقاله
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    mysqli_query($conn, "DELETE FROM blog WHERE id = $id");
    header("Location: blog_manager.php");
    exit();
}

// دریافت لیست مقالات
$query = "SELECT * FROM blog ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>مدیریت بلاگ</title>
    <link rel="stylesheet" href="../assets/css/admin_style.css">
</head>
<body>

    <h2>مدیریت بلاگ</h2>

    <!-- فرم اضافه کردن مقاله جدید -->
    <form method="POST">
        <input type="text" name="title" placeholder="عنوان مقاله" required>
        <textarea name="content" placeholder="محتوای مقاله" required></textarea>
        <button type="submit" name="add_post">افزودن مقاله</button>
    </form>

    <h3>لیست مقالات منتشر شده</h3>
    <table>
        <tr>
            <th>عنوان</th>
            <th>تاریخ انتشار</th>
            <th>عملیات</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row["title"]; ?></td>
            <td><?php echo $row["created_at"]; ?></td>
            <td>
                <a href="edit_post.php?id=<?php echo $row['id']; ?>">ویرایش</a>
                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('مطمئن هستید؟');">حذف</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>