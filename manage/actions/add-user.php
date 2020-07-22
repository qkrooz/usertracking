<?php
include '../serverConnection.php';
if($conn){
    $sso = $_POST['sso'];
    $line = $_POST['line'];
    $station = $_POST['station'];
    $status = "na";
    $shift = $_POST['shift'];
    $sql = "INSERT INTO usersmaster (sso, line, station, status, shift) VALUES (?,?,?,?,?)";
    $params = array($sso, $line, $station, $status, $shift);
    $stmt = sqlsrv_query($conn, $sql, $params);
}else{
    echo 'Error';
}
?>