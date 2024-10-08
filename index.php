<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Intranet - Ejército de Wadiya</title>
</head>
<body>
    <?php include 'includes/menu.php'; ?>

    <div class="container">
        <h1>Bienvenido a la Intranet del Ejército de Wadiya</h1>
        <p>Contenido exclusivo para usuarios logueados.</p>
    </div>
</body>
</html>
