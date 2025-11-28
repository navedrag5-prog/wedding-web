<?php require_once __DIR__ . '/../inc/auth.php'; require_admin(); ?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Dashboard - Arunika</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="role-admin">
  <div class="admin-toolbar">
    <span class="admin-badge">ADMIN MODE</span>
    <a href="index.php">Dashboard</a>
    <a href="manage-packages.php">Kelola Paket</a>
    <a href="manage-bookings.php">Kelola Booking</a>
    <a href="manage-gallery.php">Galeri</a>
    <a href="manage-testimonials.php">Testimoni</a>
    <a href="manage-admins.php">Kelola Admin</a>
    <a href="#" class="admin-logout">Logout</a>
  </div>

  <!-- topbar similar to screenshot -->
  <div class="dashboard-topbar">
    <div class="brand">ARUNIKA WEDDING</div>
    <nav class="topnav">
      <a href="../index.html">Home</a>
      <a href="../pages/services.html">Layanan</a>
      <a href="manage-bookings.php">Booking</a>
      <a href="manage-packages.php">Paket</a>
      <a href="manage-gallery.php">Galeri</a>
      <a href="manage-testimonials.php">Testimoni</a>
    </nav>
  </div>

  <section class="dashboard-hero" style="background-image:url('../assets/images/dashboard-hero.svg')">
    <div class="hero-inner">
      <h1>Nikah Happy Bebas Worry</h1>
      <p class="lead">Yuk rencanakan pernikahan impianmu bareng Arunika — vendor terbaik dan pelayanan profesional.</p>
      <div class="hero-cta"><a class="btn btn-gold" href="manage-bookings.php">Lihat Booking</a></div>
    </div>
  </section>

  <main class="container admin-main">
    <section class="grid-3" style="margin-top:1.5rem">
      <div class="card"><h3>Booking Masuk <span class="badge-count">3</span></h3><p>Ringkasan booking terbaru.</p></div>
      <div class="card"><h3>Jadwal Event</h3><p>Event hari ini: 3</p></div>
      <div class="card"><h3>Notifikasi</h3><p>2 booking baru</p></div>
    </section>

    <h2 style="margin-top:1.5rem">Kalender</h2>
    <div class="card"><p>Kalender placeholder — integrasikan kalender nyata (FullCalendar) saat butuh.</p></div>
  </main>

  <a class="fab-wa" href="https://wa.me/6281234567890" target="_blank" title="Chat WhatsApp"><img src="../assets/images/whatsapp-icon.svg" alt="WA"></a>

  <script src="../js/admin-ui.js"></script>
</body>
</html>
