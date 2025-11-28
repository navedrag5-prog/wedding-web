<?php
require_once __DIR__ . '/../inc/db.php';
session_start();

$message = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = trim($_POST['email'] ?? '');
    if(!$email){ $message = 'Masukkan email admin.'; }
    else {
        $db = get_db();
        // check admin exists
        $stmt = $db->prepare('SELECT id,email FROM admins WHERE email = ? LIMIT 1');
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $res = $stmt->get_result();
        if($row = $res->fetch_assoc()){
            $admin_id = $row['id'];
            // generate token
            $token = bin2hex(random_bytes(16));
            $expires = date('Y-m-d H:i:s', time() + 60*15); // 15 minutes
            $ins = $db->prepare('INSERT INTO admin_tokens (admin_id, token, expires_at, used) VALUES (?,?,?,0)');
            $ins->bind_param('iss',$admin_id,$token,$expires);
            $ins->execute();
            // build link
            $link = sprintf('%s://%s%s/auth/verify.php?token=%s',
                isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on' ? 'https' : 'http',
                $_SERVER['HTTP_HOST'], rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'), $token);
            // In production: send $link via email (PHPMailer or mail()). For now, display it.
            $message = 'Magic link (demo): <a href="' . htmlspecialchars($link) . '">'.htmlspecialchars($link).'</a>';
        } else {
            $message = 'Email tidak terdaftar sebagai admin.';
        }
    }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Request Admin Magic Link</title>
  <link rel="stylesheet" href="/Wedding Organizer/css/style.css">
  <style>body{padding:2rem}</style>
</head>
<body>
  <main class="container">
    <h1>Request Magic Link (Admin)</h1>
    <p>Masukkan email admin untuk menerima link sekali pakai (demo akan menampilkan link).</p>
    <?php if($message): ?>
      <div class="card"><p><?php echo $message; ?></p></div>
    <?php endif;?>
    <form method="post">
      <label>Email admin<br><input type="email" name="email" required style="padding:.5rem;width:100%;max-width:420px"></label>
      <div style="margin-top:1rem"><button class="btn btn-gold" type="submit">Kirim Link</button></div>
    </form>
    <p style="margin-top:1rem"><a href="/Wedding Organizer/index.html">Kembali ke situs</a></p>
  </main>
</body>
</html>
