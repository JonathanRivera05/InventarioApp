<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_producto'];
    $cantidad = (int)$_POST['cantidad'];
    $tipo = $_POST['tipo'];

    // Verificar si el producto existe y obtener su nombre
    $queryCheck = "SELECT nombre FROM productos WHERE id = :id";
    $stmtCheck = $conn->prepare($queryCheck);
    $stmtCheck->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtCheck->execute();
    $producto = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if (!$producto) {
        header("Location: ../../public/index.php?mensaje=" . urlencode("No existe un producto con el ID $id."));
        exit;
    }
    $nombreProducto = $producto['nombre'];

    // Si es salida, convertir la cantidad en negativo
    if ($tipo === 'salida') {
        $cantidad = -abs($cantidad);
    }

    // Actualizar la cantidad del producto
    $query = "UPDATE productos SET cantidad = cantidad + :cantidad WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $absCantidad = abs($cantidad);
        if ($tipo === 'salida') {
            $mensaje = "Salieron {$absCantidad} productos correctamente ({$nombreProducto})";
        } else {
            $mensaje = "Ingresaron {$absCantidad} productos correctamente ({$nombreProducto})";
        }
        
        // Registrar el movimiento en la tabla "movimientos"
        $queryMov = "INSERT INTO movimientos (descripcion) VALUES (:descripcion)";
        $stmtMov = $conn->prepare($queryMov);
        $stmtMov->bindParam(':descripcion', $mensaje, PDO::PARAM_STR);
        $stmtMov->execute();

        header("Location: ../../public/index.php?mensaje=" . urlencode($mensaje));
        exit;
    } else {
        echo "Error al actualizar el stock.";
    }
}
?>
