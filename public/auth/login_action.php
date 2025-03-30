<?php include '../../auth_check.php'; ?>

<?php
session_start();
require '../../vendor/autoload.php'; // Asegúrate de que la ruta a autoload.php es correcta

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Credenciales fijas para autenticación
$usuario_correcto = 'admin';
$password_correcto = 'password123';

// Correo de destino para enviar el token
$email_destino = 'example123@gmail.com'; // Remmplazar por el correo en el que quieres recibir el token

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username === $usuario_correcto && $password === $password_correcto) {
        // Credenciales válidas: generar token
        $token = bin2hex(random_bytes(16));
        $_SESSION['access_token'] = $token;
        $_SESSION['authenticated'] = false;
        $_SESSION['username'] = $username;
        
        // Configurar PHPMailer para enviar el token por correo
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0; // Cambia a 2 para depurar si es necesario
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'example123@gmail.com'; // Reemplaza con tu correo
            $mail->Password = 'YOUR_APP_PASSWORD'; // Reemplaza con tu App Password de Gmail
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            
            $mail->setFrom('no-reply@example.com', 'Inventario App');
            $mail->addAddress($email_destino);
            
            $mail->Subject = 'Tu token de acceso';
            $mail->Body = "Utiliza el siguiente token para completar el inicio de sesión: " . $token;
            
            $mail->send();
            
            header("Location: token_verification.php");
            exit;
        } catch (Exception $e) {
            echo "Error al enviar correo: " . $mail->ErrorInfo;
        }
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>
