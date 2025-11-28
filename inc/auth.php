<?php
// Simple auth helper: start session and ensure admin role from magic link
session_start();
// if already admin in session, ok
function require_admin(){
    if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
        // redirect to request link page
        header('Location: /Wedding Organizer/auth/request_link.php');
        exit;
    }
}

?>
