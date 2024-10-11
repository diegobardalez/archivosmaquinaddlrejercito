<?php
// Ruta al directorio donde se guardarán los archivos subidos
$uploadDir = 'uploads/';

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se ha seleccionado un archivo
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        // Obtener información del archivo
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];

        // Sanitizar el nombre del archivo para evitar problemas de seguridad
        $fileName = basename($fileName);
        $fileName = str_replace(" ", "_", $fileName); // Reemplazar espacios por guiones bajos
        $fileName = preg_replace("/[^A-Za-z0-9_\-\.]/", '', $fileName); // Eliminar caracteres especiales

        // Ruta completa del archivo de destino
        $dest_path = $uploadDir . $fileName;

        // Verificar que el directorio de subida exista, si no, crearlo
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Mover el archivo subido al directorio de destino (sobrescribir si existe)
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $message = 'Archivo subido exitosamente.';
        } else {
            $message = 'Hubo un error moviendo el archivo al directorio de destino.';
        }
    } else {
        $message = 'No se ha seleccionado ningún archivo o hubo un error en la subida.';
    }

    // Mostrar mensaje
    echo "<p>$message</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivo</title>
</head>
<body>
    <h1>Subir Archivo</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Selecciona un archivo:</label>
        <input type="file" name="file" id="file" required>
        <br><br>
        <input type="submit" value="Subir Archivo">
    </form>
</body>
</html>
