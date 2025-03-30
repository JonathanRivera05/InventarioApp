<?php include '../../auth_check.php'; ?>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token_ingresado = $_POST['token'];
    
    if (isset($_SESSION['access_token']) && $token_ingresado === $_SESSION['access_token']) {
        $_SESSION['authenticated'] = true;
        header("Location: ../../public/index.php");
        exit;
    } else {
        echo "Token incorrecto. Por favor, intenta de nuevo.";
    }
}
?>
