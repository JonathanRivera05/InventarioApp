<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = (int)$_POST['cantidad'];

    // Insertar el nuevo producto en la tabla 'productos'
    $query = "INSERT INTO productos (nombre, descripcion, precio, cantidad) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt->execute([$nombre, $descripcion, $precio, $cantidad])) {
        // Mensaje para notificación visual
        $mensaje_visual = "Ingreso el producto {$nombre} con {$cantidad} unidades";
        // Mensaje para registrar en la tabla 'movimientos' (formato de actualización)
        $mensaje_movimiento = "Ingresaron {$cantidad} productos correctamente ({$nombre})";
        
        // Registrar el movimiento en la tabla 'movimientos'
        $queryMov = "INSERT INTO movimientos (descripcion) VALUES (:descripcion)";
        $stmtMov = $conn->prepare($queryMov);
        $stmtMov->bindParam(':descripcion', $mensaje_movimiento, PDO::PARAM_STR);
        $stmtMov->execute();

        // Redirigir a index.php con el mensaje visual
        header("Location: ../../public/index.php?mensaje=" . urlencode($mensaje_visual));
        exit;
    } else {
        header("Location: ../../public/index.php?mensaje=" . urlencode("Error al agregar el producto."));
        exit;
    }
}
?>
