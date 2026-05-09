<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gallery — Dr. Amal M R</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Mono:wght@300;400;500&family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/gallery.css">
</head>
<body>

<div class="cursor" id="cursor"></div>
<div class="cursor-ring" id="cursorRing"></div>

<!-- NAV -->
<nav>
  <a href="index.php" class="nav-logo">DR. AMAL</a>
  <ul class="nav-links">
    <li><a href="index.php">Home</a></li>
    <li><a href="index.php#about">About</a></li>
    <li><a href="index.php#skills">Skills</a></li>
    <li><a href="index.php#multidisciplinary">Research</a></li>
    <li><a href="index.php#projects">Projects</a></li>
    <li><a href="index.php#experience">Experience</a></li>
    <li><a href="index.php#education">Education</a></li>
    <li><a href="gallery.php" class="active">Gallery</a></li>
    <li><a href="speech.php">Speech</a></li>
    <li><a href="index.php#contact">Contact</a></li>
  </ul>
</nav>

<!-- PAGE HEADER -->
<div class="page-header">
  <div class="section-label">Visual Archive</div>
  <h1>Photo<br><em>Gallery</em></h1>
  <p>A curated visual record of milestones, achievements, and moments from Dr. Amal M R's academic and professional journey.</p>
</div>

<!-- GALLERY -->
<div class="gallery-section">

  <!-- Category: Profile -->
  <div class="gallery-category-label">Profile & Identity</div>
  <div class="gallery-grid" id="grid-profile">

    <div class="gallery-item" onclick="openLightbox(0)" data-caption="Dr. Amal M R" data-sub="Official Profile · Researcher & Academic">
      <span class="gallery-tag">Profile</span>
      <img src="assets/img/gallery-1.jpg" alt="Dr. Amal M R Profile">
      <div class="gallery-overlay">
        <div class="gallery-caption">Dr. Amal M R</div>
        <div class="gallery-sub">Official Profile · Researcher & Academic</div>
      </div>
    </div>

    <div class="gallery-item" onclick="openLightbox(1)" data-caption="LinkedIn Profile" data-sub="Professor & Asst. Director · S-VYASA University">
      <span class="gallery-tag">LinkedIn</span>
      <img src="assets/img/gallery-2.png" alt="Dr. Amal M R LinkedIn">
      <div class="gallery-overlay">
        <div class="gallery-caption">LinkedIn Profile</div>
        <div class="gallery-sub">Professor & Asst. Director · S-VYASA University</div>
      </div>
    </div>

  </div>

  <!-- Category: Awards -->
  <div class="gallery-category-label">Awards & Recognition</div>
  <div class="gallery-grid" id="grid-awards">

    <div class="gallery-item" onclick="openLightbox(2)" data-caption="KTU Best Project Paper Award" data-sub="KETCON 2017 · TECHFEST of KSCSTE · January 2017">
      <span class="gallery-tag">Award Ceremony</span>
      <img src="assets/img/gallery-3.jpg" alt="KTU Best Paper Award KETCON 2017">
      <div class="gallery-overlay">
        <div class="gallery-caption">KTU Best Project Paper Award</div>
        <div class="gallery-sub">KETCON 2017 · TECHFEST of KSCSTE</div>
      </div>
    </div>

  </div>

  <!-- More Images Placeholder -->
  <div class="gallery-category-label">More Coming Soon</div>
  <div class="upload-prompt">
    <p>Share more photos to add to the gallery</p>
    <span>Research, conferences, teaching moments & more...</span>
  </div>

</div><!-- end gallery-section -->

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
  <button class="lightbox-close" onclick="closeLightbox()">✕ Close</button>
  <button class="lightbox-nav lightbox-prev" onclick="changeLightbox(-1)">← Prev</button>
  <img class="lightbox-img" id="lightboxImg" src="" alt="">
  <div class="lightbox-caption">
    <h3 id="lightboxCaption"></h3>
    <p id="lightboxSub"></p>
  </div>
  <button class="lightbox-nav lightbox-next" onclick="changeLightbox(1)">Next →</button>
</div>

<!-- FOOTER -->
<footer>
  <span>© 2026 Dr. Amal M R</span>
  <span>Gallery · Visual Archive</span>
  <span>Bengaluru, Karnataka, India</span>
</footer>

<script>
  // Custom Cursor
  const cursor = document.getElementById('cursor');
  const ring = document.getElementById('cursorRing');
  let mx = 0, my = 0, rx = 0, ry = 0;
  document.addEventListener('mousemove', e => {
    mx = e.clientX; my = e.clientY;
    cursor.style.left = mx + 'px'; cursor.style.top = my + 'px';
  });
  function animateRing() {
    rx += (mx - rx) * 0.12; ry += (my - ry) * 0.12;
    ring.style.left = rx + 'px'; ring.style.top = ry + 'px';
    requestAnimationFrame(animateRing);
  }
  animateRing();
  document.querySelectorAll('a, button, .gallery-item').forEach(el => {
    el.addEventListener('mouseenter', () => {
      cursor.style.width = '20px'; cursor.style.height = '20px';
      ring.style.width = '60px'; ring.style.height = '60px';
    });
    el.addEventListener('mouseleave', () => {
      cursor.style.width = '12px'; cursor.style.height = '12px';
      ring.style.width = '40px'; ring.style.height = '40px';
    });
  });

  // Lightbox
  const images = Array.from(document.querySelectorAll('.gallery-item'));
  let currentIndex = 0;

  function openLightbox(index) {
    currentIndex = index;
    updateLightbox();
    document.getElementById('lightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    document.getElementById('lightbox').classList.remove('open');
    document.body.style.overflow = '';
  }

  function changeLightbox(dir) {
    currentIndex = (currentIndex + dir + images.length) % images.length;
    updateLightbox();
  }

  function updateLightbox() {
    const item = images[currentIndex];
    const img = item.querySelector('img');
    document.getElementById('lightboxImg').src = img.src;
    document.getElementById('lightboxCaption').textContent = item.dataset.caption;
    document.getElementById('lightboxSub').textContent = item.dataset.sub;
  }

  // Close on backdrop click
  document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) closeLightbox();
  });

  // Keyboard navigation
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') changeLightbox(1);
    if (e.key === 'ArrowLeft') changeLightbox(-1);
  });

  // Scroll reveal
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.gallery-item').forEach((el, i) => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = `opacity 0.6s ${i * 0.1}s ease, transform 0.6s ${i * 0.1}s ease`;
    observer.observe(el);
  });
</script>
</body>
</html>