<?php

session_start();

if (!isset($_SESSION['nombre_us'])) {
    // El usuario no ha iniciado sesión, redirige a la página de login
    header('Location: login.php');
    exit();
}

include("online.php");

$username = $_SESSION['nombre_us'];


// Consulta SQL para obtener la información del usuario
$sql = "SELECT usuario.nombre_us, usuario.dni_us, usuario.correo_us, usuario.tel_us, autoridad.nombre_auto 
FROM usuario 
JOIN autoridad ON usuario.autoridad_us = autoridad.id_auto
WHERE nombre_us = '$username'";
$query = mysqli_query($online, $sql);

if ($query) {
    if (mysqli_num_rows($query) == 1) {
        $user_data = mysqli_fetch_assoc($query);
        // Muestra la información del usuario en la página de perfil
        // Muestra otros campos aquí
    } else {
        // Maneja el caso en el que el usuario no existe
        echo "Usuario no encontrado.";
    }
} else {
    // Maneja el caso de error en la consulta SQL
    echo "Error en la consulta SQL.";
}
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../php/CSS/perfil.css">
    <title>Document</title>
</head>
<body>
<section  class="barra">

      <a class="logo" href="../php/index.html"></a>

    </section>

    <div class="separador"></div>

    <section class="informacion">

         <div class="persona"></div>

         <div class="sobre">
        <table>
            <thead>
                
            </thead>
            <tbody>
                <tr>
                    <td>Nombre</td>
                    <td><?= $user_data['nombre_us'] ?></td>
                </tr>
                <tr>
                    <td>DNI</td>
                    <td><?= $user_data['dni_us'] ?></td>
                </tr>
                <tr>
                    <td>Gmail</td>
                    <td><?= $user_data['correo_us'] ?></td>
                </tr>
                <tr>
                    <td>Telefono</td>
                    <td><?= $user_data['tel_us'] ?></td>
                </tr>
                <tr>
                    <td>Autoridad</td>
                    <td><?= $user_data['nombre_auto'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    </section>

    <div class="separador"></div>

    <a href="logout.php">Cerrar Sesión</a>

</body>


</html>