// Basic interactivity: smooth scroll, navbar toggle, simple animations
(function(){
  // smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(function(anchor){
    anchor.addEventListener('click', function(e){
      e.preventDefault();
      var target = document.querySelector(this.getAttribute('href'));
      if(target){
        window.scrollTo({top: target.offsetTop - 60, behavior: 'smooth'});
      }
    });
  });

  // navbar toggle for mobile
  var toggle = document.querySelector('.nav-toggle');
  var links = document.querySelector('.nav-links');
  if(toggle && links){
    toggle.addEventListener('click', function(){
      links.style.display = (links.style.display === 'flex') ? 'none' : 'flex';
      links.style.flexDirection = 'column';
    });
  }

  // simple scroll class for header
  var header = document.getElementById('site-header');
  window.addEventListener('scroll', function(){
    if(window.scrollY > 40){ header.classList.add('scrolled'); }
    else { header.classList.remove('scrolled'); }
  });
})();
