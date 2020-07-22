<?php
include '../serverConnection.php';
if($conn){
    $id = $_POST['id'];
    $sql = "DELETE FROM usersmaster WHERE id = $id";
    $stmt = sqlsrv_query($conn, $sql);
}else{
    echo 'Ocurrio un error al eliminar';
}

?>