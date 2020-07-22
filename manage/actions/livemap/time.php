<?php
$functionType = $_POST['functionType'];
#FECHA NORMAL CON FORMATO ANIO MES DIA
// $date = date("d M Y"); no se esta usando actualmente, comentado en dado caso de ser necesario. La fecha que se va a comprarar siempre, sera la siguiente:
#Es una fecha arbitraria para hacer comparaciones
$date = "01 Jan 2000";
#TIEMPO NORMAL CON FORMATO 09:00:00.
$time  = date("H:i:s");
#TIEMPO CON FORMATO 24:00:00
$rawTime = date("g:i:s A");
#TIEMPO CONCATENADO UTIL PARA JAVASCRIPT CON FORMATO      DIA/MES/ANIO "ESPACIO" 09:00:00 AM/PM
$usefulRawTime = $date . " " . $rawTime;
#ELECCION DE FUNCION, ESTILIZADA O UTIL
switch ($functionType) {
    case 'styleTime':
        styleTime($time);
        break;
    case 'rawTime':
        rawTime($usefulRawTime);
    default:
        # code...
        break;
}
#Functions
function rawTime($usefulRawTime){
    echo $usefulRawTime;
}
function styleTime(){
    $time = date("h:i:s");
    echo $time;
}
?>