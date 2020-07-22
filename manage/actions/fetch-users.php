<?php
    include '../serverConnection.php';
    $type = $_POST['type'];
    if($conn){
        echo '<tbody class="" id="tbody-innerfetched-content-table">';
        // carga de usuarios en recarga de usuarios
        if($type == 'all'){
            $sql = "SELECT * FROM usersmaster ORDER BY id ASC";
            $stmt = sqlsrv_query($conn, $sql);
            
        }else{
            $sql = "SELECT * FROM usersmaster WHERE line = $type ORDER BY id ASC";
            $stmt = sqlsrv_query($conn, $sql);
        }
        while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
            $id = $row['id'];
            $sso = $row['sso']; 
            $celda = $row['line'];
            $station = $row['station']; 
            $status = $row['status']; 
            $shift = $row['shift'];
            $index = $row['index'];
            $shiftbg = null;
            $statusbg = null;
            switch($shift){
                case '1':
                    $shiftbg = 'bg-info';
                break;
                case '2':
                    $shiftbg = 'bg-danger';
                break;
                case '3':
                    $shiftbg = 'bg-warning';
                break;
            }
            switch($status){
                case 'na':
                    $statusbg = 'bg-secondary';
                break;
                case 'entrada':
                    $statusbg = 'bg-success';
                break;
                case 'salida':
                    $statusbg = 'bg-danger';
                break;
            }
            if($sso == 0){
                $sso = 'No asignado';
                $ssoclass= 'text-muted small';
            }else{
                $ssoclass= '';
            }
            if($station == 0){
                $station = 'No asignado';
                $stationclass= 'text-muted small';
            }else{
                $ssoclass= '';
            }
            echo '
            <tr id="'.$id.'">
                <td width="3%">'.$index.'</td>
                <td class="'.$ssoclass.'">'.$sso.'</td>
                <td>'.$celda.'</td>
                <td class="'.$stationclass.'">'.$station.'</td>
                <td><span class="p-1 '.$statusbg.' rounded text-white">'.$status.'</span></td>
                <td><span class="'.$shiftbg.' p-1 rounded text-white">'.$shift.'</span></td>
                <td class="button-cell">
                    <div class="dropdown">
                        <button class="btn btn-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-muted"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" name="edit-btn" data-id="'.$id.'" data-sso="'.$sso.'" data-line="'.$celda.'" data-station="'.$station.'" data-shift="'.$shift.'">
                                <i class="fas fa-user-edit mr-2"></i>
                                Editar
                            </a>
                            <a class="dropdown-item" name="edit-status-btn" data-id="'.$id.'" data-sso="'.$sso.'" data-status="'.$status.'" data-toggle="modal" data-target="#editStatusModal">
                                <i class="fas fa-edit mr-2"></i>
                                Modificar estatus
                            </a>
                            <a class="dropdown-item" name="delete-btn" data-id="'.$id.'">
                                <i class="fas fa-user-minus mr-2"></i>
                                Eliminar
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            ';
        }
        echo '
        </tbody>
        <script src="js/delete.js"></script>
        <script src="js/catch-edit-data.js"></script>
        <script src="js/catch-modify-status-data.js"></script>
        ';
    }else{
        echo "Connection error";
    }
?>
