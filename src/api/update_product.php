<?php
include '../config/database.php';

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID de producto no encontrado.');

$query = "SELECT id, nombre, descripcion, precio, cantidad FROM productos WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $id);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$nombre = $row['nombre'];
$descripcion = $row['descripcion'];
$precio = $row['precio'];
$cantidad = $row['cantidad'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    <header>
        <h1>Editar Producto</h1>
    </header>
    <div class="container form-box">
        <form class="product-form" action="update_product_action.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>

            <label for="nombre">Nombre del Producto:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre, ENT_QUOTES); ?>" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($descripcion, ENT_QUOTES); ?></textarea>

            <label for="precio">Precio:</label>
            <div class="input-group">
                <span class="input-prefix">$</span>
                <input type="number" id="precio" name="precio" value="<?php echo htmlspecialchars($precio, ENT_QUOTES); ?>" step="0.01" required>
            </div>


            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($cantidad, ENT_QUOTES); ?>" required>

            <button type="submit">Actualizar Producto</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2025 Gestión de Inventario by Ing. Jonathan Rivera</p>
    </footer>
</body>
</html>
