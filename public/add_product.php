<?php include '../auth_check.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Agregar Nuevo Producto</h1>
    </header>
    <div class="container form-box">
        <form action="../src/api/create_product.php" method="POST" class="product-form">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <label for="precio">Precio:</label>
            <div class="input-group">
                <span class="input-prefix">$</span>
                <input type="number" id="precio" name="precio" step="0.01" required>
            </div>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required>

            <button type="submit">Agregar Producto</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2025 Gestión de Inventario by Ing. Jonathan Rivera</p>
    </footer>
</body>
</html>
