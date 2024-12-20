<?php
if (!isset($_SESSION)) {
    session_start(); 
}

function isUser() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'user';
}

if (!isUser()) {
    header("Location:admin/login.php");
    exit();
}
?>