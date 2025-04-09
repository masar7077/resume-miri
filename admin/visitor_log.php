<?php
session_start();
include("../database/config.php");

// بررسی ورود مدیر
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// دریافت لیست بازدیدها
$query = "SELECT ip_address, COUNT(*) AS visits, SUM(time_spent) AS total_time, MAX(last_visit) AS last_seen FROM visitors GROUP BY ip_address ORDER BY last_seen DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>آمار بازدیدکنندگان</title>
    <link rel="stylesheet" href="../assets/css/admin_style.css">
</head>
<body>

    <h2>آمار بازدیدکنندگان</h2>

    <table>
        <tr>
            <th>آی‌پی</th>
            <th>تعداد بازدیدها</th>
            <th>زمان صرف‌شده (ثانیه)</th>
            <th>آخرین بازدید</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row["ip_address"]; ?></td>
            <td><?php echo $row["visits"]; ?></td>
            <td><?php echo $row["total_time"]; ?> ثانیه</td>
            <td><?php echo $row["last_seen"]; ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>