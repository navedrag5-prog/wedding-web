// Simple on-scroll fade-in animation
(function(){
  function onEntry(entries){
    entries.forEach(entry => {
      if(entry.isIntersecting){
        entry.target.classList.add('in-view');
      }
    });
  }
  var observer = new IntersectionObserver(onEntry, {threshold:0.15});
  document.querySelectorAll('.card, .gallery-item, .hero-inner').forEach(function(el){
    observer.observe(el);
  });
})();
