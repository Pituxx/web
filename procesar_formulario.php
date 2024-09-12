<?php

$servername = "localhost";
$username = "digisale_admin";
$password = "V[{JLX}=SVy3";
$dbname = "digisale_page";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre'] ?? '');
    $contacto = mysqli_real_escape_string($conn, $_POST['contacto'] ?? '');
    $rut = mysqli_real_escape_string($conn, $_POST['rut'] ?? '');
    $opcion = mysqli_real_escape_string($conn, $_POST['opcion'] ?? '');

    if (!empty($nombre) && !empty($contacto) && !empty($rut) && !empty($opcion)) {
        // Insertar los datos en la base de datos
        $sql = "INSERT INTO usuarios (nombre, contacto, rut, opcion) VALUES ('$nombre', '$contacto', '$rut', '$opcion')";
        if ($conn->query($sql) === TRUE) {
            echo '
            <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f8ff;">
                <div style="text-align: center; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); background-color: #ffffff;">
                    <img src="images/LogoDigi.png" alt="Éxito" style="width: 100px; margin-bottom: 20px;">
                    <h2 style="color: #28a745;">¡Registro Exitoso!</h2>
                    <p style="color: #555555;">Tu solicitud ha sido registrada! Nuestro horario de atención es desde las 8:00 hasta las 22:00 hrs. Te contactaremos a la brevedad.</p>
                    <a href="index.html" style="display: inline-block; margin-top: 20px; padding: 10px 20px; color: #ffffff; background-color: #28a745; text-decoration: none; border-radius: 5px;">Volver a la página principal</a>
                </div>
            </div>';
        } else {
            echo "Error en la consulta: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}

$conn->close();

?>
