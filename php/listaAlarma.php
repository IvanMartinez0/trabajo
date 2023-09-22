<?php

include ("online.php");

    $sql="SELECT paciente.id_pac, paciente.nombre_pac, alarma.id_al, alarma.estado_al, alarma.info_al,  usuario_informe.id_infous, informe.id_info, informe.paciente_info, informe.hab_info, habitacion.id_hab, habitacion.tipo_hab, habitacion.zona_hab, habitacion.piso_hab, zona.id_zona, zona.nombre_zona, piso.id_piso, piso.numero_piso, tipo.id_tipo, tipo.nombre_tipo, estado.nombre_estado, informe.llegada_info, habitacion.numero_hab
    FROM alarma
    JOIN estado ON  alarma.estado_al = estado.id_estado
    JOIN usuario_informe ON alarma.info_al = usuario_informe.id_infous
    JOIN informe ON usuario_informe.info_infous = informe.id_info
    JOIN paciente ON informe.paciente_info = paciente.id_pac 
    JOIN habitacion ON informe.hab_info = habitacion.id_hab
    JOIN tipo ON habitacion.tipo_hab = tipo.id_tipo
    JOIN zona ON habitacion.zona_hab = zona.id_zona
    JOIN piso ON habitacion.piso_hab = piso.id_piso 

    ";

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
    <title>Lista de alarmas</title>
</head>
<body>
<section  class="barra">

      <a class="logo" href="../php/index.html"></a>

      <a class="foto" href="../php/insertarTurno.php"></a>
      
    </section>

    <div class="separador"></div>

    <div class="users-table">
        <table>
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Hora activada</th>
                    <th>Nombre del paciente</th>
                    <th>Habitacion</th>
                    <th>Piso</th>
                    <th>Zona</th>
                    
                    
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>

                        <th><?= $row['nombre_estado'] ?></th>
                        <th><?= $row['llegada_info'] ?></th>
                        <th><?= $row['nombre_pac'] ?></th>
                        <th><?= $row['numero_hab'] ?></th>
                        <th><?= $row['numero_piso'] ?></th>
                        <th><?= $row['nombre_zona'] ?></th>


                        
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="vuelta"><a href="../php/index.html">Volver</a></div>
    </div>
</body>


</html>