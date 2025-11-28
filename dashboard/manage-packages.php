<?php require_once __DIR__ . '/../inc/auth.php'; require_admin(); ?>
<!doctype html>
<html lang="id">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Kelola Paket</title><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@400;700;900&display=swap" rel="stylesheet"><link rel="stylesheet" href="../css/style.css"></head>
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
    <h1>Kelola Paket</h1>
    <div class="card">
      <button class="btn btn-gold admin-only">Tambah Paket</button>
      <table style="width:100%; margin-top:1rem; border-collapse:collapse">
        <thead><tr><th>Nama</th><th>Harga</th><th>Aksi</th></tr></thead>
        <tbody>
          <tr><td>Paket Rose</td><td>Rp 10.000.000</td><td><button>Edit</button> <button>Hapus</button></td></tr>
        </tbody>
      </table>
    </div>
  </main>
  <script src="../js/admin-ui.js"></script>
</body>
</html>
