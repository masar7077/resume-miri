// =========================
// افکت بارگذاری (Loader)
// =========================
document.addEventListener("DOMContentLoaded", function () {
    const loader = document.getElementById("loader");
    setTimeout(() => {
        loader.style.opacity = "0";
        setTimeout(() => {
            loader.style.display = "none";
        }, 500);
    }, 1500);
});

// =========================
// پیمایش نرم میان بخش‌ها
// =========================
document.querySelectorAll("nav ul li a").forEach(anchor => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const targetSection = document.querySelector(this.getAttribute("href"));
        targetSection.scrollIntoView({ behavior: "smooth" });
    });
});

// =========================
// افکت‌های بخش‌های مختلف هنگام نمایش
// =========================
const sections = document.querySelectorAll("section");

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add("visible");
        }
    });
}, {
    threshold: 0.3
});

sections.forEach(section => observer.observe(section));

// =========================
// افکت‌های ویژه هنگام هاور روی منو
// =========================
document.querySelectorAll("nav ul li a").forEach(link => {
    link.addEventListener("mouseover", function () {
        this.style.color = "#FFD700"; // رنگ طلایی هنگام هاور
    });

    link.addEventListener("mouseout", function () {
        this.style.color = "#FFFFFF"; // بازگشت به رنگ سفید
    });
});

// =========================
// افکت فرم تماس هنگام ارسال
// =========================
document.querySelector("#contact form").addEventListener("submit", function (e) {
    e.preventDefault();
    alert("پیام شما ارسال شد!");
});
