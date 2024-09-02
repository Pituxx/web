<?php

$servername = "localhost";
$username = "digisale_wp915";
$password = "";
$dbname = "digisale_wp915";

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
    $email = $_POST['email'] ?? '';
    $opcion = $_POST['opcion'] ?? '';

    // Validar que todos los campos estén llenos
    if (!empty($nombre) && !empty($contacto) && !empty($email) && !empty($opcion)) {
        // Insertar los datos en la base de datos
        $sql = "INSERT INTO postulantes (nombre, numero_contacto, email, opcion) VALUES ('$nombre', '$contacto', '$email', '$opcion')";

        if ($conn->query($sql) === TRUE) {
            ?>
            <h3>Tu postulacion ha sido enviada</h3>
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}

$conn->close();

?>
