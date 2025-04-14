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