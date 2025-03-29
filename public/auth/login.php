<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="form-box">
        <h1>Iniciar Sesión</h1>
        <form action="login_action.php" method="POST">
            <label for="username">Usuario:</label>
            <input type="text" name="username" id="username" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit" class="form-button">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
