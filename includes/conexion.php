<?php
// conexion.php
$host = 'localhost'; // Cambiar según tu configuración
$db = 'intranet';
$user = 'tu_usuario'; // Cambiar por tu usuario de MySQL
$pass = 'tu_clave'; // Cambiar por tu contraseña de MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("No se pudo conectar a la base de datos: " . $e->getMessage());
}
?>
