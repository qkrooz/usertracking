<?php
include '../serverConnection.php';
$sso = $_POST['sso'];
$status = $_POST['status'];
if($conn){
    $sql = "UPDATE usersmaster SET status = ? WHERE sso= $sso";
    $params = array($status);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if( $stmt === false ) {
        if( ($errors = sqlsrv_errors() ) != null) {
            foreach( $errors as $error ) {
                echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
                echo "code: ".$error[ 'code']."<br />";
                echo "message: ".$error[ 'message']."<br />";
            }
        }
}
}
?>