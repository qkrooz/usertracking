<?php
include '../serverConnection.php';
if($conn){
    $shift = $_POST['shift'];
    $line = $_POST['line'];
    $index = $_POST['index'];
    $sql = "SELECT TOP $index * FROM usersmaster WHERE line = $line AND shift = $shift";
    $stmt = sqlsrv_query($conn, $sql);
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        $sso = $row['sso'];
        $index = $row['index'];
        $status = $row['status'];
        switch($status){
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
        if($sso == 0){
        }else{
            echo '
            <!-- user card -->
            <div name="'.$index.'" id="'.$sso.'"
            class="col-auto '.$bgcolor.' d-flex flex-column justify-content-center align-items-center rounded border shadow-sm"
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
        }

    }
}else{
    echo 'Ocurrio un error en SQL';
}