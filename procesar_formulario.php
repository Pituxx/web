<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "digisales";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $contacto = $_POST['contacto'] ?? '';
    $rut = $_POST['rut'] ?? '';
    $opcion = $_POST['opcion'] ?? '';

    // Validar que todos los campos estén llenos
    if (!empty($nombre) && !empty($contacto) && !empty($rut) && !empty($opcion)) {
        // Insertar los datos en la base de datos
        $sql = "INSERT INTO usuarios (nombre, contacto, rut, opcion) VALUES ('$nombre', '$contacto', '$rut', '$opcion')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}

$conn->close();

?>
