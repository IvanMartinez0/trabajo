<?php

include ("online.php");


if (isset($_GET['id_pac'])) {
    $id_paciente = $_GET['id_pac'];
    

    // Consulta SQL para obtener los informes del paciente específico
   $sql = "SELECT habitacion.id_hab, habitacion.numero_hab, informe.id_info, informe.llegada_info, informe.boxx_info, informe.paciente_info, informe.desc_info, boxx.id_boxx, boxx.num_boxx, boxx.hab_boxx, paciente.id_pac, paciente.nombre_pac

     FROM informe
     JOIN boxx on informe.boxx_info = boxx.id_boxx
     JOIN habitacion on boxx.hab_boxx = habitacion.id_hab
     JOIN paciente on informe.paciente_info = paciente.id_pac

      WHERE paciente_info = $id_paciente";
    $query = mysqli_query($online, $sql);

    if (!$query) {
        die("Error en la consulta de informes: " . mysqli_error($online));
    }
}


    

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../php/CSS/informe.css">
    <title>Informe</title>
</head>
<body>
    <section  class="barra">

        <a class="logo" href="../php/index.html"></a>
  
        <a class="foto" href="../php/perfil.php"></a>
        
      </section>
  
      <div class="separador"></div>

      <div class="informe-header">
        <h1>Informes del Paciente</h1>
    </div>

      <table>
      <thead>
    <tr>
        <th data-title="Habitacion">Habitacion</th>
        <th data-title="Llegada">Llegada</th>
        <th data-title="Descripción">Descripción</th>
        <th data-title="Box">Box</th>
        <th data-title="Mas info">Mas info</th>
    </tr>
</thead>
<tbody>
    <?php while ($row = mysqli_fetch_array($query)): ?>
        <tr>
            <td data-title="Habitacion"><?= $row['numero_hab'] ?></td>
            <td data-title="Llegada"><?= $row['llegada_info'] ?></td>
            <td data-title="Descripción"><?= $row['desc_info'] ?></td>
            <td data-title="Box"><?= $row['num_boxx'] ?></td>
            <th data-title="Mas info"><a class="descargar" href="../php/masInfo.php?id_pac=<?= $id_paciente ?>&id_info=<?= $row['id_info'] ?>">mas info</a></th>
            <a class="descargar" href="../php/descargaPDF.php?id_info=<?=$row['id_info'] ?>">Descargar informe en PDF</a>
        </tr>
    <?php endwhile; ?>
</tbody>
</table>

<a class="volver-link" href="paciente.php">Volver a la lista de pacientes</a>




    
</body>
</html>