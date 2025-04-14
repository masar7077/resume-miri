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

// اطلاعات پست‌ها
const posts = [
    {
        id: 1,
        title: 'عنوان پست وبلاگ 1',
        image: 'blog1.jpg',
        content: 'محتوای کامل پست وبلاگ 1...',
        link: 'https://example.com/post1'
    },
    {
        id: 2,
        title: 'عنوان پست وبلاگ 2',
        image: 'blog2.jpg',
        content: 'محتوای کامل پست وبلاگ 2...',
        link: 'https://example.com/post2'
    },
    {
        id: 3,
        title: 'عنوان پست وبلاگ 3',
        image: 'blog3.jpg',
        content: 'محتوای کامل پست وبلاگ 3...',
        link: 'https://example.com/post3'
    }
];

// گرفتن همه کارت‌ها و اضافه کردن رویداد کلیک
document.querySelectorAll('.blog-card').forEach(card => {
    card.addEventListener('click', () => {
        const postId = card.getAttribute('data-post-id');
        const post = posts.find(p => p.id == postId);

        // نمایش پاپ‌آپ
        document.getElementById('popup-title').innerText = post.title;
        document.getElementById('popup-image').src = post.image;
        document.getElementById('popup-content').innerText = post.content;
        document.getElementById('popup-link').href = post.link;

        document.getElementById('post-popup').style.display = 'flex';
    });
});

// بستن پاپ‌آپ
document.querySelector('.close-btn').addEventListener('click', () => {
    document.getElementById('post-popup').style.display = 'none';
});
