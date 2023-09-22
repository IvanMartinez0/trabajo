<?php

include ("online.php");


    $sql="SELECT zona.id_zona  , zona.nombre_zona, piso.numero_piso 
    FROM zona
    JOIN piso ON zona.piso_zona = piso.id_piso
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
    <link rel="stylesheet" type="text/css" href="../php/CSS/areas.css">
    <title>Menu</title>
</head>
<body>
<section  class="barra">

       <a class="logo" href="../php/index.html"></a>
       
      <a class="foto" href="../php/perfil.php"></a>
    </section>

    <div class="separador"></div>

    <section class="lista">
    <thead>
                <tr>
                    <th><h1>AREAS</h1></th>

                </tr>
             </thead>

         <table class="users-table">

             <tbody>
             <?php while ($row = mysqli_fetch_array($query)){ ?>
                    <tr>

                    

                        <th><h2><?= $row['nombre_zona'] ?></h2></th>
                        <th><h2><?= $row['numero_piso'] ?></h2></th>
                        <td><a href="buscador.php?zona=<?= $row['id_zona'] ?>" class="users-table--edit">Buscar una habitacion</a></td>
                       

                         
                    </tr>
                <?php } ?>
             </tbody>
            </table>

            <div class="vuelta"><a href="../php/index.html">Volver</a></div>
            
             

    </section>
    

    <div class="separador"></div>

     
</body>



</html>

