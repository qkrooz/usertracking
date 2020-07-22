<?php
include '../serverConnection.php';
if($conn){
    $initLine = $_POST['line'];
    $nextShift = $_POST['nextShift'];
    $sql = "SELECT * FROM usersmaster WHERE line = $initLine AND shift = $nextShift";
    $stmt = sqlsrv_query($conn, $sql);
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        $sso = $row['sso'];
        $station = $row['station'];
        if($sso == 0){

        }else{
            echo '
            <!-- Usercard -->
            <div
            class="col-auto bg-white d-flex flex-column justify-content-between align-items-center rounded border shadow-sm"
            >
            <i class="fas fa-user flex-grow-1 p-0 m-0 display-4"></i>
            <p class="m-0 mb-2 font-weight-bold">'.$sso.'</p>
            </div>
            <!-- usercard -->
        ';
        }

    }
}else{
    echo 'Hay un error de conexion inicial con SQLServer';
}