<?php
include '../serverConnection.php';
if($conn){
    $ssotemp = $_POST['sso'];
    $sso = ltrim(strval($ssotemp), '0');
    $index = $_POST['index'];
    $line = $_POST['line'];
    $shift = $_POST['shift'];
    $newStatus = $_POST['status'];
    $delete = $_POST['delete'];
    if($delete == 'delete'){
        $sql = "UPDATE usersmaster SET sso = 0, station = 0, status = 0 WHERE sso = $sso";
        sqlsrv_query($conn, $sql);
    }
    // Checamos si existe para hacer el Update.
    $sql = "SELECT * FROM usersmaster WHERE sso = '$sso' AND shift = '$shift' AND [line] = '$line'";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );  
    $stmt = sqlsrv_query( $conn, $sql , $params, $options );
    $rows = sqlsrv_num_rows($stmt);
    if($rows == 0){
        $sql = "UPDATE dbo.usersmaster
        SET sso = '$sso', 
            [line] = '$line',
            station = 'na',
            [status] = '$newStatus',
            shift = '$shift'
            WHERE  [line] = $line AND [shift] = $shift AND [index] = $index";
        $add = sqlsrv_query( $conn, $sql);
    }
    $sql = "UPDATE dbo.usersmaster
                    SET sso = '$sso', 
                        [line] = '$line',
                        station = 'na',
                        [status] = '$newStatus',
                        shift = '$shift'
                    WHERE  [line] = $line AND [shift] = $shift AND [sso] = $sso";
    $add = sqlsrv_query( $conn, $sql);
    // LOGS
    $sql2= "INSERT INTO userslogssingle ([sso], [action], [line], [shift], [date], [time], [state]) VALUES (?,?,?,?,?,?,?)";
    switch($newStatus){
        case 'entrada':
            $action='se registró';
            break;
        case 'salida':
            $action = 'abandonó';
            break;
        case 'na':
            $action = $newStatus;
        break;
        default:
    break;
    }
    $date = date("d-m-Y");
    $time = date('H:i:s'); 
    $params=array($sso, $action, $line, $shift, $date, $time, $newStatus);
    $add2 = sqlsrv_query($conn, $sql2, $params);
    if($add){
        switch($newStatus){
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
            <div name="'.$index.'" id="'.$sso.'"
            class="col-auto '.$bgcolor.' d-flex flex-column justify-content-center align-items-center rounded border shadow-sm animated fadeInUp faster"
            >
            <i class="fas fa-user flex-grow-1 p-0 m-0 display-4 '.$textcolor.'"></i>
            <p
                class="'.$textcolor.' m-0 mb-2 font-weight-bold flex-grow-1 user-card-sso"
            >
                '.$sso.'
            </p>
            </div>
            <!-- user card -->
        ';
    }else{
        die( print_r( sqlsrv_errors(), true));
    }
   
}else{
    echo 'Hubo un problema en la conexcion con SQL';
}