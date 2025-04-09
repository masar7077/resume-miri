<?php
session_start();
include("../database/config.php");
include("../database/db_functions.php");

// بررسی ورود مدیر
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// افزودن پروژه جدید
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_project"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $image = $_FILES["image"]["name"];
    $target = "../assets/images/" . basename($image);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
        $query = "INSERT INTO portfolio (title, description, image, created_at) VALUES ('$title', '$description', '$image', NOW())";
        mysqli_query($conn, $query);
        header("Location: portfolio_manager.php");
        exit();
    } else {
        $error_msg = "خطا در آپلود تصویر.";
    }
}

// حذف پروژه
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    mysqli_query($conn, "DELETE FROM portfolio WHERE id = $id");
    header("Location: portfolio_manager.php");
    exit();
}

// دریافت لیست نمونه کارها
$projects = getProjects();
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>مدیریت نمونه کارها</title>
    <link rel="stylesheet" href="../assets/css/admin_style.css">
</head>
<body>

    <h2>مدیریت نمونه کارها</h2>

    <!-- فرم افزودن پروژه -->
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="عنوان پروژه" required>
        <textarea name="description" placeholder="توضیحات پروژه" required></textarea>
        <input type="file" name="image" required>
        <button type="submit" name="add_project">افزودن پروژه</button>
    </form>

    <h3>لیست نمونه کارها</h3>
    <table>
        <tr>
            <th>تصویر</th>
            <th>عنوان</th>
            <th>توضیحات</th>
            <th>تاریخ انتشار</th>
            <th>عملیات</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($projects)) { ?>
        <tr>
            <td><img src="../assets/images/<?php echo $row["image"]; ?>" width="80"></td>
            <td><?php echo $row["title"]; ?></td>
            <td><?php echo substr($row["description"], 0, 100); ?>...</td>
            <td><?php echo $row["created_at"]; ?></td>
            <td>
                <a href="edit_project.php?id=<?php echo $row['id']; ?>">ویرایش</a>
                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('مطمئن هستید؟');">حذف</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>