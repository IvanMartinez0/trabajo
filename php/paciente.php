<?php

include ("online.php");

    $sql="SELECT paciente.id_pac, paciente.nombre_pac, paciente.dni_pac, paciente.tel_pac, paciente.sexo_pac,  paciente.correo_pac, sexo.nombre_sexo
    FROM paciente
    JOIN sexo ON paciente.sexo_pac = sexo.id_sexo";


    $query=mysqli_query($online, $sql);

    if (!$query) {
        die("Error en la consulta: " . mysqli_error($online));
    } 

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../php/CSS/pacientes.css">

    <title>Lista de pacientes</title>

</head>
<body>
<section  class="barra">

      <a class="logo" href="../php/index.html"></a>

      <a class="foto" href="../php/perfil.php"></a>
      
    </section>

    <div class="separador"></div>

    <div class="users-table">
        <table>
            <thead>
                <tr>
                    <th>Nombre completo</th>
                    <th>Dni</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Sexo</th>
                    <th>Informes</th>

                    
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>

                        <th><?= $row['nombre_pac'] ?></th>
                        <th><?= $row['dni_pac'] ?></th>
                        <th><?= $row['tel_pac'] ?></th>
                        <th><?= $row['correo_pac'] ?></th>
                        <th><?= $row['nombre_sexo'] ?></th>
                        <th><a href="informe.php?id_pac=<?= $row['id_pac'] ?>"><h2>JE</h2></a></th>
                    
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="vuelta"><a href="../php/index.html">Volver</a></div>
    </div>
</body>


</html>

