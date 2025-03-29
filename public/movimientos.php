<?php
include '../src/config/database.php';

// Consulta para obtener los movimientos ordenados por fecha descendente
$query = "SELECT id, descripcion, fecha FROM movimientos ORDER BY fecha DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Movimientos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Registro de Movimientos</h1>
    </header>

    <section class="container">
        <!-- Botón "Volver" arriba -->
        <div class="top-button-container">
            <button onclick="location.href='index.php'" class="form-button">Volver</button>
        </div>

        <div class="table-wrapper">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                </tr>
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['descripcion']) ?></td>
                        <td><?= htmlspecialchars($row['fecha']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Gestión de Inventario by Ing. Jonathan Rivera</p>
    </footer>
</body>
</html>
