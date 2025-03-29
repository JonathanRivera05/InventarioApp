<?php
include '../config/database.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM productos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Producto eliminado exitosamente.');
                window.location.href='../../public/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al eliminar el producto.');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('ID de producto no proporcionado.');
            window.history.back();
          </script>";
}
?>
