<?php include '../../auth_check.php'; ?>

<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Verificar Token - Inventario App</title>
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
    .token-container {
      max-width: 400px;
      margin: 80px auto;
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .token-container h1 {
      text-align: center;
      font-size: 1.8em;
      margin-bottom: 20px;
      color: #333;
    }
    .token-container label {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
      color: #555;
    }
    .token-container input {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1em;
      box-sizing: border-box;
    }
    .token-container button {
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
    .token-container button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="token-container">
    <h1>Verificar Token</h1>
    <form action="token_verification_action.php" method="POST">
      <label for="token">Ingresa el token enviado a tu correo:</label>
      <input type="text" name="token" id="token" required>
      <button type="submit">Verificar Token</button>
    </form>
  </div>
</body>
</html>
