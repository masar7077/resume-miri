<?php
include("database/config.php");
require_once("database/db_functions.php");
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>نمونه کارها</title>
</head>
<body>

    <h2>نمونه کارها</h2>

    <div class="portfolio-items">
        <?php
        $projects = mysqli_query($conn, "SELECT * FROM portfolio ORDER BY created_at DESC");

        if (mysqli_num_rows($projects) > 0) {
            while ($row = mysqli_fetch_assoc($projects)) {
                echo '<div class="portfolio-item">';
                echo '<img src="../assets/images/' . $row["image"] . '" alt="پروژه">';
                echo '<h3>' . $row["title"] . '</h3>';
                echo '<p>' . substr($row["description"], 0, 100) . '...</p>';
                echo '<a href="portfolio_detail.php?id=' . $row["id"] . '">مشاهده جزئیات</a>';
                echo '</div>';
            }
        } else {
            echo "<p>هنوز هیچ پروژه‌ای اضافه نشده است.</p>";
        }
        ?>
    </div>

</body>
</html>