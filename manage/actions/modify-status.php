<?php
    include '../serverConnection.php';
    if($conn){
        $id = $_POST['id'];
        $sso = $_POST['sso'];
        $newStatus = $_POST['status'];
        $justification = $_POST['justification'];
        $oldStatus = $_POST['oldStatus'];
        // Modificacion del status dierectamente
        $sql = 'UPDATE usersmaster 
                SET status = ?
                WHERE id =?';
        $params = array($newStatus, $id);
        $stmt = sqlsrv_query($conn, $sql, $params);
        // Modificacion de los logs
        $datestamp = date("d-m-Y");
        $timestamp = date('H:i:s'); 
        $sql = 'INSERT INTO statuslogs (datestamp, timestamp, rowid, sso, oldstatus, newstatus, justification) VALUES (?,?,?,?,?,?,?)';
        $params = array($datestamp, $timestamp, $id, $sso, $oldStatus, $newStatus, $justification);
        $stmt = sqlsrv_query($conn, $sql, $params);
    }else{
        echo 'ocurrio un error de conexion al servidor';
    }
?>