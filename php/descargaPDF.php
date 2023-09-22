<?php
include("online.php");
require_once('../TCPDF-main/tcpdf.php');

if (isset($_GET['id_info'])) {
    $id = $_GET['id_info'];

    // Consulta SQL para obtener los informes del paciente específico
    $sql1 = "SELECT 
        paciente.id_pac, paciente.nombre_pac, paciente.sexo_pac, paciente.dni_pac, paciente.tel_pac, 
        usuario.id_us, usuario.nombre_us, 
        informe.id_info, informe.paciente_info, informe.llegada_info, informe.operacion_info, informe.salida_info, informe.desc_info,
        usuario_informe.id_infous, usuario_informe.info_infous, usuario_informe.us_infous,
        autoridad.id_auto, autoridad.nombre_auto

    FROM usuario_informe

    JOIN usuario ON usuario_informe.us_infous = usuario.dni_us
    JOIN informe ON usuario_informe.info_infous = informe.id_info
    JOIN paciente ON informe.paciente_info = paciente.id_pac
    JOIN sexo ON paciente.sexo_pac = sexo.id_sexo
    JOIN autoridad ON usuario.autoridad_us = autoridad.id_auto

    WHERE informe.id_info = '$id'";
    
    $query1 = mysqli_query($online, $sql1);

    if (!$query1) {
        die("Error en la consulta de informes: " . mysqli_error($online));
    }

    $sql2 = "SELECT 
        tipo.id_tipo, tipo.nombre_tipo,
        informe.id_info, informe.boxx_info,
        boxx.id_boxx, boxx.num_boxx,
        zona.id_zona, zona.nombre_zona,
        habitacion.id_hab, habitacion.numero_hab, habitacion.zona_hab

    FROM informe

    JOIN boxx ON informe.boxx_info = boxx.id_boxx
    JOIN habitacion ON boxx.hab_boxx = habitacion.id_hab
    JOIN zona ON habitacion.zona_hab = zona.id_zona
    JOIN tipo ON habitacion.id_hab = tipo.id_tipo

    WHERE informe.id_info = '$id'";

    $query2 = mysqli_query($online, $sql2); // Ejecuta la consulta SQL $sql2

    if (!$query2) {
        die("Error en la consulta de informes: " . mysqli_error($online));
    }
}
// Crear un objeto TCPDF
$pdf = new TCPDF();
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

// Crear una tabla para el informe con estilos CSS inline
$html = '<table style="width: 100%; border-collapse: collapse;">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">Nombre del paciente</th>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">Sexo </th>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">DNI</th>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">Telefono</th>';
$html .='</tr>';
$html .='<tr>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">Nombre del medico</th>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">Hora de llegada</th>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">Hora atendida</th>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">hora de salida</th>';
$html .='</tr>';
$html .='<tr>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">Descripcion</th>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">Num habitacion</th>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">Habitacion</th>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">Box</th>';
$html .= '<th style="border: 1px solid #000; background-color: #ccc; font-weight: bold; padding: 5px;">Zona</th>';


$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

while ($row = mysqli_fetch_array($query1)) {
    $html .= '<tr>';

    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['nombre_pac'] . '</td>';
    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['nombre_sexo'] . '</td>';
    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['dni_pac'] . '</td>';

    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['tel_pac'] . '</td>';
    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['nombre_us'] . '</td>';
    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['llegada_info'] . '</td>';
    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['operacion_info'] . '</td>';
    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['salida_info'] . '</td>';

    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['desc_info'] . '</td>';
    $html .='</tr>' ;


}

while ($row = mysqli_fetch_array($query2)) {
    $html .= '<tr>';

    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['numero_hab'] . '</td>';
    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['num_boxx'] . '</td>';
    $html .= '<td style="border: 1px solid #000; background-color: #f2f2f2; padding: 5px;">' . $row['nombre_zona'] . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';

echo $id;
echo $html;
/*
// Agregar la tabla al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y enviarlo al navegador para descargar
$pdf->Output('informe de .pdf', 'D');
exit; */
?>