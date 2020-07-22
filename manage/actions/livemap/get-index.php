<?
include '../../serverConnection.php';
if($conn){
    $sso = $_POST['sso'];
    echo $sso;
    // $sql = "SELECT * FROM usersmaster WHERE [sso] = $sso";
    // $stmt = sqlsrv_query($conn, $sql);
    // while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    //     $index = $row['index'];
    // }
    // echo $index;
}