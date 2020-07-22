<?php
include '../serverConnection.php';
if($conn){
    // variables del escaneado!!
    $ssotemp = $_POST['sso'];
    $scansso = ltrim(strval($ssotemp), '0');
    $scanline = $_POST['line'];
    $scanshift = $_POST['shift'];
    $scannewStatus = $_POST['status'];
    $sql = "UPDATE usersmaster SET sso = 0, station = 0, status = 0 WHERE sso = $scansso"; //UPDATE OF THE RECIPENT TO 0
    sqlsrv_query($conn, $sql);

    //===========================================================================//
    // Consultamos el usuario SSO que esta en el index 1.
    $sql = "SELECT TOP 1 [sso] FROM usersmaster WHERE [line] = $scanline AND [shift] = $scanshift AND [index] = 1";
    $stmt = sqlsrv_query($conn, $sql);
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        $abandonsso = $row['sso'];
    }
    // LOGS FOR ABANDONEMENT
    $sql2= "INSERT INTO userslogssingle ([sso], [action], [line], [shift], [date], [time], [state]) VALUES (?,?,?,?,?,?,?)";
    $date = date("d-m-Y");
    $time = date('H:i:s'); 
    $params=array($abandonsso, 'abandonó', $scanline, $scanshift, $date, $time, $scannewStatus);
    $add2 = sqlsrv_query($conn, $sql2, $params);
    $sql2= "INSERT INTO userslogssingle ([sso], [action], [line], [shift], [date], [time], [state]) VALUES (?,?,?,?,?,?,?)";
    $date = date("d-m-Y");
    $time = date('H:i:s'); 
    $params=array($scansso, 'se registró', $scanline, $scanshift, $date, $time, $scannewStatus);
    $add2 = sqlsrv_query($conn, $sql2, $params);
    // end logs 
    //===========================================================================//


    // Rearrange
    $i = 2;
    while($i <= 8){
        $sql = "SELECT TOP 1 * FROM usersmaster WHERE [shift] = '$scanshift' AND [line] = '$scanline' AND [index] = $i";
        $stmt = sqlsrv_query($conn, $sql);
        while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
            $sso = $row['sso'];
            $station = $row['station'];
            $status = $row['status'];
        }
        $sql2 = "UPDATE usersmaster SET [sso] = '$sso', [station] = '$station', [status] = '$status' WHERE [shift] = '$scanshift' AND [line] = '$scanline' AND [index] = $i-1";
        $stmt2 = sqlsrv_query($conn, $sql2);
        $i++;
    }
    $sql = "UPDATE usersmaster SET sso = '$scansso', station = 0, [status] = '$scannewStatus' WHERE shift = '$scanshift' AND [line] = '$scanline' AND [index] = 8";
    $stmt = sqlsrv_query($conn, $sql);
    switch($scannewStatus){
        case 'entrada':
            $bgcolor = 'bg-success';
            $textcolor ='text-light';
            break;
        case 'salida':
            $bgcolor = 'bg-danger';
            $textcolor ='text-white';
            break;
        case 0:
            $bgcolor = 'bg-white';
            $textcolor ='text-black';
        default:
            break;
    }
    echo '
    
        <!-- user card -->
        <div name="8" id="'.$scansso.'"
        class="col-auto '.$bgcolor.' d-flex flex-column justify-content-center align-items-center rounded border shadow-sm animated fadeInUp faster"
        >
        <i class="fas fa-user flex-grow-1 p-0 m-0 display-4 '.$textcolor.'"></i>
        <p
            class="'.$textcolor.' m-0 mb-2 font-weight-bold flex-grow-1 user-card-sso"
        >
            '.$scansso.'
        </p>
        </div>
        <!-- user card -->
    ';
}
