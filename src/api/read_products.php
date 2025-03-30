<?php
include 'D:\APPS\XAMPP\htdocs\InventarioApp\src\config\database.php'; // Verifica la ruta en la que tienes el archivo database.php y reemplaza aqui

// Obtener valores de los filtros enviados desde el formulario
$nombre = $_GET['buscar'] ?? '';
$precio_min = $_GET['precio_min'] ?? '';
$precio_max = $_GET['precio_max'] ?? '';
$cantidad_min = $_GET['cantidad_min'] ?? '';
$cantidad_max = $_GET['cantidad_max'] ?? '';

// Construir la consulta SQL con condiciones dinámicas
$sql = "SELECT id, nombre, descripcion, precio, cantidad FROM productos WHERE 1=1";
$params = [];

if (!empty($nombre)) {
    $sql .= " AND nombre LIKE ?";
    $params[] = "%$nombre%";
}
if (!empty($precio_min)) {
    $sql .= " AND precio >= ?";
    $params[] = $precio_min;
}
if (!empty($precio_max)) {
    $sql .= " AND precio <= ?";
    $params[] = $precio_max;
}
if (!empty($cantidad_min)) {
    $sql .= " AND cantidad >= ?";
    $params[] = $cantidad_min;
}
if (!empty($cantidad_max)) {
    $sql .= " AND cantidad <= ?";
    $params[] = $cantidad_max;
}

$stmt = $conn->prepare($sql);
$stmt->execute($params);

// Mostrar la tabla con los productos filtrados
echo "<table>";
echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio/Unidad</th><th>Stock</th><th>Acciones</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['nombre']}</td>";
    echo "<td>{$row['descripcion']}</td>";
    echo "<td>$" . number_format($row['precio'], 2) . "</td>";
    echo "<td>{$row['cantidad']}</td>";
    echo "<td class='buttons'>
            <button onclick=\"location.href='../src/api/update_product.php?id={$row['id']}'\">Editar</button>
            <button onclick=\"if(confirm('¿Estás seguro de querer eliminar este producto?')) location.href='../src/api/delete_product.php?id={$row['id']}'\">Eliminar</button>
          </td>";
    echo "</tr>";
}
echo "</table>";
?>
