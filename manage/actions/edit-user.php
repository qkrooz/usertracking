<?php
include '../serverConnection.php';
if($conn){
    $id = $_POST['id'];
    $sso = $_POST['sso'];
    $line = $_POST['line'];
    $station = $_POST['station'];
    $status = "na";
    $shift = $_POST['shift'];
    $sql = "UPDATE usersmaster
            SET sso = ?,
                line = ?,
                station = ?,
                status = ?,
                shift = ? 
            WHERE id = ?";
    $params = array($sso, $line, $station, $status, $shift, $id);
    $stmt = sqlsrv_query($conn, $sql, $params);
}else{ echo 'Ocurrio un erro a la hora de editar';}
?>