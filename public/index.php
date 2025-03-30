<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Gestión de Inventario de productos</h1>
    </header>

    <!-- Bloque de notificación -->
    <?php if(isset($_GET['mensaje'])): ?>
        <div class="alert">
            <?= htmlspecialchars($_GET['mensaje']) ?>
        </div>
    <?php endif; ?>

    <section class="main-layout">
        <!-- Formulario de filtros a la izquierda -->
        <div class="filter-wrapper">
            <form method="GET" action="" class="filter-form">
                <label for="buscar">Buscar por nombre:</label>
                <input type="text" id="buscar" name="buscar" placeholder="Escribe el nombre..." value="<?= htmlspecialchars($_GET['buscar'] ?? '') ?>">

                <label for="precio_min">Precio mínimo:</label>
                <div class="input-group">
                    <span class="input-prefix">$</span>
                    <input type="number" id="precio_min" name="precio_min" step="0.01" value="<?= htmlspecialchars($_GET['precio_min'] ?? '') ?>">
                </div>

                <label for="precio_max">Precio máximo:</label>
                <div class="input-group">
                    <span class="input-prefix">$</span>
                    <input type="number" id="precio_max" name="precio_max" step="0.01" value="<?= htmlspecialchars($_GET['precio_max'] ?? '') ?>">
                </div>

                <label for="cantidad_min">Cantidad mínima:</label>
                <input type="number" id="cantidad_min" name="cantidad_min" value="<?= htmlspecialchars($_GET['cantidad_min'] ?? '') ?>">

                <label for="cantidad_max">Cantidad máxima:</label>
                <input type="number" id="cantidad_max" name="cantidad_max" value="<?= htmlspecialchars($_GET['cantidad_max'] ?? '') ?>">

                <button type="submit" class="form-button">Filtrar</button>
                <button type="button" class="form-button" onclick="window.location.href='index.php'">Limpiar filtros</button>
            </form>
        </div>

        <!-- Tabla de productos en el centro -->
        <div class="table-wrapper">
            <?php include '../src/api/read_products.php'; ?>
        </div>

        <!-- Formulario de actualizar inventario y botón agregar producto a la derecha -->
        <div class="stock-form-wrapper">
            <button onclick="location.href='add_product.html'" class="add-button" style="margin-bottom: 20px;">Agregar Producto</button>

            <h3>Actualizar Inventario</h3>
            <form action="../src/api/update_stock.php" method="POST" class="stock-form">
                <label for="id_producto">ID del Producto:</label>
                <input type="number" name="id_producto" id="id_producto" required>

                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" required>

                <label for="tipo">Tipo de Movimiento:</label>
                <select name="tipo" id="tipo" required>
                    <option value="entrada">Entrada</option>
                    <option value="salida">Salida</option>
                </select>

                <button type="submit" class="form-button">Actualizar</button>
            </form>

            <!-- Botón para ver el registro de movimientos -->
            <div class="movimientos-button-container" style="margin-top:20px;">
                <button onclick="location.href='movimientos.php'" class="form-button">Ver Registro de Movimientos</button>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Gestión de Inventario by Ing. Jonathan Rivera</p>
    </footer>
    <script src="js/app.js"></script>
</body>
</html>
