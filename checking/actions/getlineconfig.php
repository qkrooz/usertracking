<?php
include '../serverConnection.php';
if($conn){
    $line = $_POST['line'];
    $shift = $_POST['shift'];
    $param = $_POST['param'];
    switch($shift){
        case 1:
            switch($param){
                case 'userstofetch':
                    $sql = "SELECT userstofetch1 FROM lineconfig WHERE [line] = $line";
                default:
                    break;
            }
            break;
        case 2:
            switch($param){
                case 'userstofetch':
                    $sql = "SELECT userstofetch2 FROM lineconfig WHERE [line] = $line";
                default:
                    break;
            }
            break;
        case 3:
            switch($param){
                case 'userstofetch':
                    $sql = "SELECT userstofetch3 FROM lineconfig WHERE [line] = $line";
                default:
                    break;
            }
            break;
        default:
            break;
    }
    $stmt = sqlsrv_query($conn, $sql);
    
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        echo  $row[$param.$shift];
    }
}else{
    echo 'Ocurrio un error';
}