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

