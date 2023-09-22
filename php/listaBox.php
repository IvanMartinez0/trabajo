<?php

include ("online.php");


    $hab = $_GET['id_hab']; //recibe el valor de id_hab de la pagina ""

    $sql="SELECT      habitacion.id_hab, habitacion.tipo_hab, habitacion.zona_hab, zona.id_zona, zona.nombre_zona, zona.piso_zona, piso.id_piso, piso.numero_piso, tipo.id_tipo, tipo.nombre_tipo, habitacion.numero_hab, boxx.id_boxx, boxx.num_boxx, boxx.ocupado_boxx, boxx.ocupado_boxx, boxx.carac_boxx, boxx.hab_boxx, ocupado.id_ocu, ocupado.nombre_ocu, caracteristica.desc_carac
    from boxx

    join caracteristica on boxx.carac_boxx = caracteristica.id_carac
    JOIN ocupado on boxx.ocupado_boxx = ocupado.id_ocu
    JOIN habitacion ON boxx.hab_boxx = habitacion.id_hab
    JOIN tipo ON habitacion.tipo_hab = tipo.id_tipo
    JOIN zona ON habitacion.zona_hab = zona.id_zona
    JOIN piso ON zona.piso_zona = piso.id_piso 
    WHERE id_hab = $hab
    ORDER BY boxx.ocupado_boxx DESC

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
    <title>Lista de box</title>
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
                    <th>Numero de box</th>
                    <th>Habitacion</th>
                    <th>Caracteristicas</th>
                                        
                    
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>

                        <th><?= $row['nombre_ocu'] ?></th>
                        <th><?= $row['num_boxx'] ?></th>
                        <th><?= $row['numero_hab'] ?></th>
                        <th><?= $row['desc_carac'] ?></th>


                        
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="vuelta"><a href="../php/area.php">Volver</a></div>
    </div>
</body>


</html>