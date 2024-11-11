<?php
// Definir la función input antes de su uso
function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validarEdad($fechaNacimiento) {
    // Convertir la fecha de nacimiento en un objeto DateTime
    $fechaNacimiento = new DateTime($fechaNacimiento);
    // Obtener la fecha actual
    $fechaActual = new DateTime();
    
    // Calcular la diferencia de años entre la fecha actual y la de nacimiento
    $edad = $fechaActual->diff($fechaNacimiento)->y;
    
    // Validar si la persona es mayor o menor de 18 años
    if ($edad >= 18) {
        return "El usuario es mayor de edad";
    } else {
        return "El usuario es menor de edad";
    }
}

function validarTamañoFichero($file) {
    $maxSize = 300 * 1024; // Tamaño máximo en bytes (300 KB)
    return isset($file['size']) && $file['size'] <= $maxSize;
}

// Procesamiento de datos y generación de HTML de respuesta
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nombre = input($_POST["Name"]);
    $Email = input($_POST["email"]);
    $Numtelefono = input($_POST["NumTelefono"]);
    $FechaNacimiento = input($_POST["FechaNacimiento"]);
    $Genero = isset($_POST["Sexo"]) ? $_POST["Sexo"] : "";
    $MensajeEdad = validarEdad($FechaNacimiento);
    
    // Verificar las habilidades seleccionadas y concatenarlas
    $Habilidades_pro = isset($_POST["Habilidades"]) ? implode(", ", $_POST["Habilidades"]) : "No se seleccionaron habilidades";
    
    // Inicializar la variable $FotoPerfil
    $FotoPerfil = "No se subió ninguna foto";

    // Manejar la carga del archivo de perfil
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        // Validar el tamaño del archivo
        if (validarTamañoFichero($_FILES["file"])) {
            $FotoPerfil = $_FILES["file"]["name"]; // Solo el nombre del archivo si cumple con el tamaño
        } else {
            $FotoPerfil = "El archivo supera el tamaño máximo permitido de 300 KB.";
        }
    }

    $PaisResidencia = input($_POST["Pais"]);
    $DescPro = input($_POST["DescPro"]);

    // Generar HTML de respuesta sobrescribiendo el contenido del div principal
    echo "<div class='formulario form-control mt-3 d-flex justify-content-center'>
            <table>
                <tr><th>Resumen del formulario</th></tr>
                <tr><th><br>Nombre Completo:</th><td><br>$Nombre</td></tr>
                <tr><th>Correo electrónico:</th><td>$Email</td></tr>
                <tr><th>Número de teléfono:</th><td>$Numtelefono</td></tr>
                <tr><th>Fecha de nacimiento:</th><td>$FechaNacimiento - $MensajeEdad</td></tr>
                <tr><th>Género:</th><td>$Genero</td></tr>
                <tr><th colspan='2'><br>Habilidades Profesionales:</th></tr>
                <tr><td colspan='2'>$Habilidades_pro</td></tr>
                <tr><th><br>Foto de perfil:</th><td><br>$FotoPerfil</td></tr>
                <tr><th>País de Residencia:</th><td>$PaisResidencia</td></tr>
                <tr><th colspan='2'><br>Descripción Profesional:</th></tr>
                <tr><td colspan='2'>$DescPro</td></tr>
            </table>
          </div>";
}
?>