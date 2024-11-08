<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 	<link rel="stylesheet" type="text/css" href="CSS/style.css">
 	<link rel="icon" href="img/Logo.jpeg" type="image/x-icon">
 	<script src="JS/funciones.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<title>Contacto</title>
</head>
<body id="CambioColor">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand nav-link disabled" href="">
      <img src="img/Logo.jpeg" alt="Logo" style="width:40px;" class="rounded-pill">
    </a>

    <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Sobre mi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Proyectos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active disabled" href="">Contacto</a>
      </li>
      <a class="nav-link" href="">Test</a>
    </ul>
  </div>
  </div>
</nav>

<!-- (123) 456-7890 -->

<?php

    $Nombre = $Email = $Numtelefono = $FechaNacimiento = $Genero = $FotoPerfil = $PaisResidencia = $DescPro = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Nombre = input($_POST["Name"]);
        //echo "El nombre del usuario es: $Nombre";

        $Email = input($_POST["email"]);
        $Numtelefono = input($_POST["NumTelefono"]);
        $FechaNacimiento = input($_POST["fechai"]);
        $Genero = $_POST["Sexo"];
        $FotoPerfil = input($_POST["file"]);
        $PaisResidencia = input($_POST["Pais"]);
        $DescPro = input($_POST["DescPro"]);
    }    

   function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
   }

?>

<div class='formulario form-control mt-3 d-flex justify-content-center'>
    <table>
    <table>
    <tr>
    <th><p>Nombre Completo: </p></th>
    <td><p><?php echo $Nombre ?></p></td>
    </tr>
    <tr>
    <th><p>Correo electrónico: </p></th>
    <td><p><?php echo $Email ?></p></td>
    </tr>
    <tr>
    <th><p>Número de teléfono: </p></th>
    <td><p><?php $Numtelefono ?></p></td>
    </tr>
    <tr>
    <th><p>Fecha de nacimiento: </p></th>
    <td><p><?php echo $FechaNacimiento ?></p></td>
    </tr>
    <tr>
    <th><p>Selecciona tu género</p></th>
    <td><p><?php echo $Genero ?></p></td>
    </tr>
    <tr>
    <th colspan='2'><p><br>Habilidades Profesionales</p></th>
    </tr>
    <tr>
    <td><p><br>Foto de perfil: </p></td>
    <td><p><?php echo $FotoPerfil ?></p></td>
    </tr>
    <tr>
    <th><p>País de Residencia </p></th>
    <td><p><?php echo $PaisResidencia ?></p></td>
    </tr>
    <tr>
    <th colspan='2'><p>Descripción Profesional </p></th>
    </tr>
    <tr>
    <td colspan='2'><p><?php echo $DescPro ?></p></td>
    </tr>
    </table>
    </table>
</div>

<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <p>&copy; 2024 Alejandro González García. Todos los derechos reservados.</p>
        <p>
	        <a href="#" class="text-white">Política de Privacidad</a>
	        <a href="#" class="text-white">Términos de Servicio</a>
        </p>
        <p>
          <a href="https://www.instagram.com/"><ion-icon name="logo-instagram"></ion-icon></a>
          <a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></a>
          <a href="https://x.com/"><ion-icon name="logo-twitter"></ion-icon></a>
        </p>
    </div>
</footer>

</body>
</html>