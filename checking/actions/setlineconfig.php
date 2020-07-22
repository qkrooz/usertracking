<?php
include '../serverConnection.php';
if($conn){
    $line = $_POST['line'];
    $shift = $_POST['shift'];
    $param = $_POST['param'];
    $value = $_POST['value'];
    switch($shift){
        case 1:
            switch($param){
                case 'userstofetch':
                    $sql = "UPDATE lineconfig SET userstofetch1 = $value WHERE [line] = $line";
                default:
                    break;
            }
            break;
        case 2:
            switch($param){
                case 'userstofetch':
                    $sql = "UPDATE lineconfig SET userstofetch2 = $value WHERE [line] = $line";
                default:
                    break;
            }
            break;
        case 3:
            switch($param){
                case 'userstofetch':
                    $sql = "UPDATE lineconfig SET userstofetch3 = $value WHERE [line] = $line";
                default:
                    break;
            }
            break;
        default:
            break;
    }
    $stmt = sqlsrv_query($conn, $sql);
}else{
    echo 'Ocurrio un error';
}