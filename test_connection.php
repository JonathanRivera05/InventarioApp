<?php include '../auth_check.php'; ?>

<?php
include 'src/config/database.php'; // Ajusta la ruta si es necesario

try {
    $conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    echo "Conexión exitosa!";
} catch(PDOException $exception) {
    echo "Error de conexión: " . $exception->getMessage();
}
?>
