# Gestión de Inventario de Productos

## Descripción

Este proyecto es una aplicación web para la gestión de inventario de productos.
Permite realizar operaciones CRUD (crear, leer, actualizar y eliminar productos),
gestionar entradas y salidas de stock, registrar movimientos y autenticar a los usuarios
mediante un sistema de inicio de sesión con verificación por token.


## Tecnologías Utilizadas

- **PHP**: Lógica del servidor.
- **MySQL**: Base de datos.
- **HTML5/CSS3**: Interfaz de usuario.
- **JavaScript**: Funcionalidades interactivas.
- **PHPMailer**: Envío de correos electrónicos.
- **Composer**: Gestión de dependencias.
- **Git**: Control de versiones.
- **XAMPP**: Servidor local.

## Requisitos

- Servidor web con PHP 7.4 o superior.
- MySQL.
- Composer.
- Extensión OpenSSL habilitada en PHP (revisar en `php.ini`).
- Un proveedor SMTP (por ejemplo, Gmail) para enviar el token de autenticación.

## Instrucciones para Ejecutar el Proyecto

### Paso 1: Clonar el Repositorio

1. Clona el repositorio público:
   ```bash
   git clone https://github.com/JonathanRivera05/InventarioApp.git
   cd InventarioApp

### Paso 2: Configurar la Base de Datos
1. Crear la Base de Datos:

- En phpMyAdmin (u otra herramienta de MySQL), crea una base de datos para el proyecto.
- Crea la siguiente base de datos ejecutando la siguiente consulta:

    -- Crear la base de datos (si no existe)

CREATE DATABASE IF NOT EXISTS InventarioApp;

USE InventarioApp;

-- Crear la tabla de productos

CREATE TABLE IF NOT EXISTS productos (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nombre VARCHAR(255) NOT NULL,

    descripcion TEXT,

    precio DECIMAL(10,2) NOT NULL,

    cantidad INT NOT NULL

);

-- Crear la tabla de movimientos

CREATE TABLE IF NOT EXISTS movimientos (

    id INT AUTO_INCREMENT PRIMARY KEY,

    descripcion VARCHAR(255) NOT NULL,

    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);


productos: Para almacenar la información de los productos.

movimientos: Para registrar los movimientos de inventario.


### Paso 3: Configurar PHPMailer para el Envío de Emails
1. Editar la Configuración SMTP:

- Navega a public/auth/login_action.php.
- Reemplaza los siguientes valores con los datos reales de tu proveedor de correo (en este ejemplo se usa Gmail):

// Correo de destino para enviar el token.

$email_destino = 'example321@gmail.com'; // Remmplazar por el correo en el que quieres recibir el token.

$mail->Host = 'smtp.gmail.com';

$mail->Username = 'example123@gmail.com'; // Cuenta de Google en el que generaste tu App Password.

$mail->Password = 'YOUR_APP_PASSWORD'; // Genera una App Password en tu cuenta de Google.

$mail->SMTPSecure = 'tls';

$mail->Port = 587;


- Navega a src/api/read_products.php

Identifica y modifica lo siguiente:

include 'D:\APPS\XAMPP\htdocs\InventarioApp\src\config\database.php'; // Verifica la ruta en la que tienes el archivo database.php y reemplaza aqui

- Navega a src/config/database.php

Identifica y modifica lo siguiente si es necesario:

$host = "localhost"; // Modifica estos parametros segun tus necesidades

$db_name = "inventario_db";

$username = "root"; // Si estas usando XAMPP el usuario predeterminado es root, y no tiene contraseña

$password = "";  

- Asegúrate de que la extensión OpenSSL esté habilitada en tu php.ini (busca la línea extension=openssl y quita el punto y coma al inicio, si es necesario).


2. Verificar el Envío de Correos:

- Una vez configurado, al iniciar sesión se enviará un token de acceso al correo example@gmail.com. Verifica que el correo llegue correctamente.


### Paso 4: Instalar Dependencias con Composer
1. Abre la terminal en la raíz del proyecto y ejecuta:

composer install

Esto instalará PHPMailer y cualquier otra dependencia definida en composer.json.


### Paso 5: Ejecutar el Proyecto
1. Inicia Apache y MySQL (por ejemplo, usando XAMPP).
2. Accede a http://localhost/InventarioApp/public/ en tu navegador para ver la aplicación.


## Funcionalidades del Proyecto
1. Autenticación de Usuarios:
- Inicia sesión con el usuario *admin* y la contraseña *password123*
- Se envía un token de acceso al correo example123@gmail.com, que debe ser verificado para completar el inicio de sesión.

2. Gestión de Productos:
- Agregar, editar, eliminar y buscar productos.

3. Control de Inventario:
- Registrar entradas y salidas de stock. Actualizaciones en el inventario
- Registrar movimientos en la tabla movimientos, como historial de entradas y salidas.


## Notas Adicionales
Control de Versiones:
Se utiliza Git para el control de versiones.

Documentación:
Este README.md incluye instrucciones detalladas para configurar y ejecutar el proyecto, así como las herramientas y cambios necesarios en los archivos de configuración.

Contacto:
Para más información, puedes contactar a: jonathanvasquez842@gmail.com.