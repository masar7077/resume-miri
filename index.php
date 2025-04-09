<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رزومه شخصی</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/main.js" defer></script>
</head>
<body>

    <!-- افکت بارگذاری -->
    <div id="loader">
        <span class="loading-text">در حال بارگذاری...</span>
    </div>

    <!-- هدر سایت -->
    <?php include("includes/header.php"); ?>

    <!-- بخش‌های مختلف سایت -->
    <?php include("pages/about.php"); ?>
    <?php include("pages/services.php"); ?>
    <?php include("pages/portfolio.php"); ?>
    <?php include("pages/blog.php"); ?>
    <?php include("pages/contact.php"); ?>

    <!-- فوتر سایت -->
    <?php include("includes/footer.php"); ?>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector(".menu-toggle");
    const menu = document.querySelector(".menu");

    menuToggle.addEventListener("click", function () {
        menu.classList.toggle("active"); // تغییر وضعیت منو
    });
});
</script>

</body>
</html>