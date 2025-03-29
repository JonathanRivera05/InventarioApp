<?php
// Configuración de la conexión a la base de datos

$host = "localhost"; // Modifica estos parametros segun tus necesidades
$db_name = "inventario_db";
$username = "root"; // Si estas usando XAMPP el usuario predeterminado es root, y no tiene contraseña
$password = "";  

try {
    $conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: No se pudo conectar. " . $e->getMessage());
}
?>


<?php
//echo realpath('database.php');
?>