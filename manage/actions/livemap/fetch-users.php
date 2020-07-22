<?php
include '../../serverConnection.php';
if($conn){
    $line = $_POST['line'];
    $shift = $_POST['shift'];
    switch($shift){
        case '1':
            $column = "userstofetch1";
            $sql="SELECT $column FROM lineconfig WHERE [line] = $line";
            break;
        case '2':
            $column = "userstofetch2";
            $sql="SELECT $column FROM lineconfig WHERE [line] = $line";
            break;
        case '3':
            $column = "userstofetch3";
            $sql="SELECT $column FROM lineconfig WHERE [line] = $line";
            break;
        default:
            break;
    }
    $stmt = sqlsrv_query($conn, $sql);
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        $userstofetch = $row[$column];
    }
    if($userstofetch == '0'){
        die();
    }else{
        $sql = "SELECT TOP ($userstofetch) * FROM usersmaster WHERE [line] = $line AND [shift] = $shift";
        $stmt = sqlsrv_query($conn, $sql);
        $res = [];
        while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
            $res[] = $row;
        }
        echo json_encode( $res );
      

//     $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

// echo json_encode($arr);
    }
}