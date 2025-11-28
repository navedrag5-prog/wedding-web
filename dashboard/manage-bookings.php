<?php require_once __DIR__ . '/../inc/auth.php'; require_admin(); ?>
<!doctype html>
<html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Kelola Booking</title><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@400;700;900&display=swap" rel="stylesheet"><link rel="stylesheet" href="../css/style.css"></head>
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
  <main class="container admin-main">
    <h1>Kelola Booking</h1>
    <div class="card">
      <table style="width:100%"><thead><tr><th>Klien</th><th>Tgl</th><th>Paket</th><th>Status</th><th>Aksi</th></tr></thead>
      <tbody>
        <tr><td>Andi</td><td>2025-12-01</td><td>Paket Rose</td><td>Pending</td><td><button>Setujui</button> <button>Tolak</button></td></tr>
      </tbody></table>
    </div>
  </main>
  <script src="../js/admin-ui.js"></script>
</body></html>
