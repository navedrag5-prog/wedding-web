// admin-ui.js (client-side role toggle)
// Activate admin mode with ?role=admin or via toolbar buttons (local only)
(function(){
  function getRoleFromQuery(){
    try{ var p = new URLSearchParams(location.search); return p.get('role'); }catch(e){return null;}
  }
  function applyRole(role){
    var isAdmin = (role === 'admin');
    if(isAdmin) {
      document.body.classList.add('role-admin');
      localStorage.setItem('arunika_role','admin');
    } else {
      document.body.classList.remove('role-admin');
      localStorage.setItem('arunika_role','user');
    }
    var badge = document.querySelector('.admin-toolbar .admin-badge');
    if(badge) badge.textContent = isAdmin ? 'ADMIN MODE' : '';
  }

  var qRole = getRoleFromQuery();
  var stored = localStorage.getItem('arunika_role') || 'user';
  applyRole(qRole ? qRole : stored);

  // expose helper
  window.Arunika = window.Arunika || {};
  window.Arunika.setRole = applyRole;

  document.addEventListener('click', function(e){
    var t = e.target;
    if(t.matches && t.matches('.admin-logout')){
      e.preventDefault();
      applyRole('user');
      try{ history.replaceState(null,'', location.pathname); }catch(e){}
      alert('Admin mode disabled (local).');
    }
    if(t.matches && t.matches('.admin-enable')){
      e.preventDefault();
      applyRole('admin');
      alert('Admin mode enabled (local).');
    }
  });
})();
