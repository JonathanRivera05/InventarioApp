<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $query = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, cantidad = :cantidad WHERE id = :id";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $mensaje = "La información del producto {$nombre} se ha actualizado exitosamente";
        header("Location: ../../public/index.php?mensaje=" . urlencode($mensaje));
        exit;
    } else {
        echo "Error al actualizar el producto.";
    }
}
?>
