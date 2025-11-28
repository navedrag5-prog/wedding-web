<?php
// Database helper for Arunika Wedding (MySQLi)
// Update credentials as needed for your XAMPP setup
function get_db(){
    static $conn = null;
    if($conn === null){
        $host = '127.0.0.1';
        $user = 'root';
        $pass = '';
        $db   = 'arunika_wedding';
        $conn = new mysqli($host, $user, $pass, $db);
        if($conn->connect_error){
            die('DB connect error: ' . $conn->connect_error);
        }
        $conn->set_charset('utf8mb4');
    }
    return $conn;
}

function esc($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

?>
