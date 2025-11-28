<?php
require_once __DIR__ . '/../inc/db.php';
session_start();
$token = $_GET['token'] ?? '';
$ok = false;
if($token){
    $db = get_db();
    $stmt = $db->prepare('SELECT t.id,t.admin_id,t.expires_at,t.used,a.email FROM admin_tokens t JOIN admins a ON a.id = t.admin_id WHERE t.token = ? LIMIT 1');
    $stmt->bind_param('s',$token);
    $stmt->execute();
    $res = $stmt->get_result();
    if($row = $res->fetch_assoc()){
        if($row['used']){
            $msg = 'Token sudah digunakan.';
        } elseif(strtotime($row['expires_at']) < time()){
            $msg = 'Token sudah kadaluarsa.';
        } else {
            // set session admin
            $_SESSION['role'] = 'admin';
            $_SESSION['admin_id'] = $row['admin_id'];
            // mark token used
            $u = $db->prepare('UPDATE admin_tokens SET used = 1 WHERE id = ?');
            $u->bind_param('i',$row['id']); $u->execute();
            $ok = true;
            header('Location: /Wedding Organizer/dashboard/index.php');
            exit;
        }
    } else {
        $msg = 'Token tidak ditemukan.';
    }
} else {
    $msg = 'Token kosong.';
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Verify</title></head><body>
  <main style="padding:2rem;max-width:700px;margin:auto">
    <h1>Verifikasi Link</h1>
    <p><?php echo htmlspecialchars($msg); ?></p>
    <p><a href="/Wedding Organizer/auth/request_link.php">Minta link baru</a></p>
  </main>
</body></html>
