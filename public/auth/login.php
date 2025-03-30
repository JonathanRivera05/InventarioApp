<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión - Inventario App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Incluir Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
  <style>
    body {
      background: #f4f4f4;
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
    }
    .login-container {
      max-width: 400px;
      margin: 80px auto;
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .login-container h1 {
      text-align: center;
      font-size: 1.8em;
      margin-bottom: 20px;
      color: #333;
    }
    .login-container label {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
      color: #555;
    }
    .login-container input {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1em;
      box-sizing: border-box;
    }
    .login-container button {
      width: 100%;
      padding: 12px;
      background-color: #007BFF;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 1em;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .login-container button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Iniciar Sesión</h1>
    <form action="login_action.php" method="POST">
      <label for="username">Usuario:</label>
      <input type="text" name="username" id="username" required>
      
      <label for="password">Contraseña:</label>
      <input type="password" name="password" id="password" required>
      
      <button type="submit">Iniciar Sesión</button>
    </form>
  </div>
</body>
</html>
