<section id="blog">
    <div class="container">
        <h2>بلاگ</h2>
        <p>در اینجا آخرین مطالب منتشر شده شما نمایش داده می‌شود.</p>

        <!-- لیست مقالات -->
        <div class="blog-posts">
            <?php
            include("database/config.php"); // اتصال به پایگاه داده

            $query = "SELECT * FROM blog ORDER BY created_at DESC LIMIT 5"; // نمایش آخرین ۵ مقاله
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="post">';
                    echo '<h3>' . $row["title"] . '</h3>';
                    echo '<p>' . substr($row["content"], 0, 150) . '...</p>'; // نمایش مقدمه‌ای از مقاله
                    echo '<a href="blog_post.php?id=' . $row["id"] . '">ادامه مطلب</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>هنوز هیچ مقاله‌ای منتشر نشده است.</p>';
            }
            ?>
        </div>
    </div>
</section>