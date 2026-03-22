(function () {
  var parallax = document.getElementById('parallaxBg');
  window.addEventListener('scroll', function () {
    var scrollPosition = window.scrollY;
    if (parallax) {
      parallax.style.transform = 'translateY(' + (scrollPosition * 0.2) + 'px)';
    }
  });

  var mobileToggle = document.getElementById('mobileToggle');
  var navLinks = document.getElementById('navLinks');
  if (mobileToggle && navLinks) {
    mobileToggle.addEventListener('click', function () {
      navLinks.classList.toggle('active');
    });
  }

  var themeToggle = document.getElementById('themeToggle');
  var root = document.body;

  function setTheme(theme) {
    if (!themeToggle) {
      return;
    }

    if (theme === 'dark') {
      root.classList.add('dark');
      themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
      localStorage.setItem('theme', 'dark');
    } else {
      root.classList.remove('dark');
      themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
      localStorage.setItem('theme', 'light');
    }
  }

  var savedTheme = localStorage.getItem('theme');
  if (savedTheme === 'dark') {
    setTheme('dark');
  } else {
    setTheme('light');
  }

  if (themeToggle) {
    themeToggle.addEventListener('click', function () {
      if (root.classList.contains('dark')) {
        setTheme('light');
      } else {
        setTheme('dark');
      }
    });
  }

  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 800,
      once: true,
      offset: 100
    });
  }

  document.querySelectorAll('.nav-links a').forEach(function (link) {
    link.addEventListener('click', function () {
      if (navLinks) {
        navLinks.classList.remove('active');
      }
    });
  });

  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var targetSelector = this.getAttribute('href');
      var target = document.querySelector(targetSelector);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
})();
