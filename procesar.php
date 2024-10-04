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
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $contacto = $_POST['contacto'] ?? '';
    $email = $_POST['email'] ?? '';
    $opcion = $_POST['opcion'] ?? '';

    // Verificar si se subió un cv
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        // Variables del cv
        $nombrecv = $_FILES['cv']['name'];
        $tipocv = $_FILES['cv']['type'];
        $tamañocv = $_FILES['cv']['size'];
        $rutaTemporal = $_FILES['cv']['tmp_name'];

        // Verificar el tipo de cv (por ejemplo, solo imágenes o PDFs)
        $extensionesPermitidas = array("pdf");
        $extensioncv = pathinfo($nombrecv, PATHINFO_EXTENSION);

        if (in_array($extensioncv, $extensionesPermitidas)) {
            // Definir la ruta donde se guardará el cv dentro de 'public_html/uploads'
            $directorioSubida = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
            $rutacv = $directorioSubida . basename($nombrecv);

            // Mover el cv a la carpeta deseada
            if (move_uploaded_file($rutaTemporal, $rutacv)) {
                // Validar que todos los campos estén llenos
                if (!empty($nombre) && !empty($contacto) && !empty($email) && !empty($opcion)) {
                    // Insertar los datos en la base de datos
                    $sql = "INSERT INTO postulantes (nombre, numero_contacto, email, opcion, ruta_cv) 
                            VALUES ('$nombre', '$contacto', '$email', '$opcion', '/uploads/" . basename($nombrecv) . "')";

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
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Todos los campos son obligatorios.";
                }
            } else {
                echo "Hubo un error al subir el cv.";
            }
        } else {
            echo "El tipo de cv no está permitido.";
        }
    } else {
        echo "No se ha seleccionado ningún cv o hubo un error en la subida.";
    }
}

$conn->close();

?>
