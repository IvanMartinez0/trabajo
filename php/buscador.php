<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>

<title>Buscador de habitaciones</title>
</head>
<body>


</body>
</html>


<?php 
 
 
// Inclusión de la conexión a la base de datos
include("online.php");

// Si las variables están vacías, establecerlas a ''
if (empty($_POST['zona'])) {
    $_POST['zona'] = '';            
}
if (empty($_POST['numhab'])) {
    $_POST['numhab'] = '';            
}
if (empty($_POST['tipohab'])) {
    $_POST['tipohab'] = '0';
}
if (empty($_POST["orden"])) {
    $_POST["orden"] = '';
}


$sql="SELECT
  zona.id_zona, zona.nombre_zona,
  piso.numero_piso, piso.id_piso,
  tipo.id_tipo, tipo.nombre_tipo,
  habitacion.id_hab, habitacion.numero_hab, habitacion.tipo_hab, habitacion.zona_hab

    FROM habitacion
    JOIN zona ON habitacion.zona_hab = zona.id_zona
    JOIN piso ON zona.piso_zona = piso.id_piso
    JOIN tipo ON habitacion.tipo_hab = tipo.id_tipo
    "

?>



<div class="container mt-5">
    <div class="col-12">
 


    <div class="row">
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">

        <h4 class="card-title">Buscador</h4>


<form id="form2" name="form2" method="POST" action="buscador.php">
        <div class="col-12 row">

            <div class="mb-3">
                    <label  class="form-label">Numero de habitacion</label>
                    <input type="text" class="form-control" id="numhab" name="numhab" value="<?php echo $_POST["numhab"] ?>" >
            </div>

            <h4 class="card-title">Filtro de búsqueda</h4>  
            
           <div class="col-11">
    <table class="table">
        <thead>
            <tr class="filters">
                <th>
                    Tipo de habitacion
                   <select id="assigned-tutor-filter" id="tipohab" name="tipohab" class="form-control mt-2">
    <option value="0"> Seleccione el tipo a buscar </option>
    <?php
    $tipohab_query = "SELECT * FROM tipo";
    $resultadotipo = mysqli_query($online, $tipohab_query);
    while ($valor = mysqli_fetch_array($resultadotipo)) {
        echo '<option value="' . $valor["nombre_tipo"] . '">' . $valor["nombre_tipo"] . '</option>';
    }
    ?>
</select>            

    <table class="table">
        <thead>
            <tr class="filters">
                <th>
                    <br>
                    Zona a filtrar
                   <select  id="zona" name="zona">
    <option value="0"> Seleccione la zona a buscar </option>
    <?php
    $tipozona_query = "SELECT * FROM zona";
    $resultadozona = mysqli_query($online, $tipozona_query);
    while ($valor = mysqli_fetch_array($resultadozona)) {
        echo '<option value="' . $valor["nombre_zona"] . '">' . $valor["nombre_zona"] . '</option>';
    }
    ?>
</select>
</th>
</tr>
</thead>
</table>
</div>

                                                                
            <div class="col-11">

                        <table class="table">
                                <thead>
                                        <tr class="filters">
                                                <th>
                                                        Selecciona el orden
                                                        <select  id="orden" name="orden" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                
                                                                
                                                                <?php 
                                                                if ($_POST["orden"] == '1'){echo 'Ordenar por numero de habitacion';} 
                                                                if ($_POST["orden"] == '2'){echo 'Ordenar por tipo de habitacion';} 
     
                                                                ?>
                                                                </option>
                                                                
                                                                <option value="">Seleccione como desea ordenar</option>
                                                                <option value="1">Ordenar por numero de habitacion (Desc)</option>
                                                                <option value="2">Ordenar por tipo de habitacio</option>
                                                               
                                                        </select>
                                                </th>
                                          
                                              
                                      
                                        </tr>
                                </thead>
                        </table>
                </div>


                <div class="col-1">
                        <input type="submit" class="btn " value="Ver" style="margin-top: 38px; background-color: purple; color: white;">
                </div>
        </div>


        <?php 
        /* FILTRO de búsqueda */
if (empty($_POST['numhab'])) {
    $_POST['numhab'] = '';
}
$aKeyword = explode(" ", $_POST['numhab']);

if ($_POST['numhab'] != '' || $_POST['tipohab'] != '0' || $_POST['zona'] != '') {
    $sql .= " WHERE ";
    $conditions = array();

    if ($_POST['numhab'] != '') {
        $conditions[] = "numero_hab = '" . $_POST['numhab'] . "'";
    }

    if ($_POST['zona'] != '') {
        $conditions[] = "nombre_zona = '" . $_POST['zona'] . "'";
    }

    if ($_POST['tipohab'] != '0') {
        $conditions[] = "nombre_tipo = '" . $_POST['tipohab'] . "'";
    }

    $sql .= implode(" AND ", $conditions);
}



 //Ordenar por---------------------------------------------------

         if ($_POST["orden"] == '1') {
    $sql .= " ORDER BY numero_hab DESC";
} elseif ($_POST["orden"] == '2') {
    $sql .= " ORDER BY nombre_tipo DESC";
}

   
    ;




    $query=mysqli_query($online, $sql);

    if (!$query) {
        die("Error en la consulta: " . mysqli_error($online));
    } 


        ?>
 
</form>


<div class="col-12">
    <table class="table">
        <thead>
            <tr style="background-color:purple; color:#FFFFFF;">
                <th style="text-align: center;">Numero de habitacion</th>
                <th style="text-align: center;">Zona </th>
                <th style="text-align: center;">Tipo de habitacion</th>
                <th>box</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <td><?= $row['numero_hab'] ?></td>
                    <td><?= $row['nombre_zona'] ?></td>
                    <td><?= $row['nombre_tipo'] ?></td>
                    <td><a href="listaBox.php?id_hab=<?= $row['id_hab'] ?>" class="users-table--edit">Ver box</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>



</div>
</div>
</div>
</div>


    </div>
</div>







</body>
</html>