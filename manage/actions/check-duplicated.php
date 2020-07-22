<?php
include '../serverConnection.php';
if($conn){
    $sso = $_POST['sso'];
    $sql = "SELECT * FROM usersmaster WHERE sso = $sso";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );  
    $stmt = sqlsrv_query( $conn, $sql , $params, $options );
    $rows = sqlsrv_num_rows($stmt);
    echo $rows;
}else{echo 'Ocurrio un problema';}
?>