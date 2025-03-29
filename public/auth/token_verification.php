<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar Token</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="form-box">
        <h1>Verificar Token</h1>
        <form action="token_verification_action.php" method="POST">
            <label for="token">Ingresa el token enviado a tu correo:</label>
            <input type="text" name="token" id="token" required>
            <button type="submit" class="form-button">Verificar Token</button>
        </form>
    </div>
</body>
</html>
