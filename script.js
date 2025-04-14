document.querySelectorAll('nav a').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    target.scrollIntoView({ behavior: 'smooth' });
  });
});

const hamburgerBtn = document.getElementById('hamburger-btn');
const nav = document.querySelector('nav');

hamburgerBtn.addEventListener('click', () => {
  nav.classList.toggle('active');
});
// باز و بسته کردن توضیحات نمونه‌کار با کلیک روی کارت
document.querySelectorAll('.portfolio-card').forEach(card => {
  card.addEventListener('click', function () {
    const moreText = this.querySelector('.more');
    moreText.style.display = (moreText.style.display === 'block') ? 'none' : 'block';
  });
});

const blogPosts = {
  1: {
    title: "عنوان پست وبلاگ 1",
    image: "images/blog1.jpg",
    text: "متن کامل پست وبلاگ شماره 1. اینجا می‌تونی هر چی خواستی بذاری."
  },
  2: {
    title: "عنوان پست وبلاگ 2",
    image: "images/blog2.jpg",
    text: "متن کامل پست وبلاگ شماره 2. برای توضیحات بیشتر."
  },
  3: {
    title: "عنوان پست وبلاگ 3",
    image: "images/blog3.jpg",
    text: "متن کامل پست وبلاگ شماره 3. این هم نمونه‌ی سوم."
  }
};

function openBlogModal(id) {
  const modal = document.getElementById("blogModal");
  document.getElementById("modalTitle").innerText = blogPosts[id].title;
  document.getElementById("modalImage").src = blogPosts[id].image;
  document.getElementById("modalText").innerText = blogPosts[id].text;
  modal.style.display = "flex";
}

function closeBlogModal() {
  document.getElementById("blogModal").style.display = "none";
}
