<?php
include '../serverConnection.php';
if($conn){
    for($i=1;$i<=8;$i++){
            $sql = "INSERT INTO usersmaster (sso, line, station, status, shift, [index]) VALUES(0,26,'0','na','1',$i)";
            $stmt = sqlsrv_query($conn, $sql);
    }
    for($i=1;$i<=8;$i++){
        $sql = "INSERT INTO usersmaster (sso, line, station, status, shift, [index]) VALUES(0,26,'0','na','2',$i)";
        $stmt = sqlsrv_query($conn, $sql);
    }
    for($i=1;$i<=8;$i++){
        $sql = "INSERT INTO usersmaster (sso, line, station, status, shift, [index]) VALUES(0,26,'0','na','3',$i)";
        $stmt = sqlsrv_query($conn, $sql);
    }
}