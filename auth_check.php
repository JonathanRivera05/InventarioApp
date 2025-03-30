<?php
// Inicia la sesión
session_start();

// Si el usuario no está autenticado, redirige al login
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: public/auth/login.php");
    exit;
}
?>
