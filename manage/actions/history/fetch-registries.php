<?php
    include '../../serverConnection.php';
    $type = $_POST['type'];
    if($conn){
        echo '<tbody class="" id="tbody-innerfetched-content-table2">';
        // carga de usuarios en recarga de usuarios
        if($type == 'all'){
            $sql = "SELECT * FROM userslogssingle ORDER BY id DESC";
            $stmt = sqlsrv_query($conn, $sql);
            
        }else{
            $sql = "SELECT * FROM userslogssingle WHERE line = $type ORDER BY id DESC";
            $stmt = sqlsrv_query($conn, $sql);
        }
        while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
            $id = $row['id'];
            $sso = $row['sso']; 
            $action = $row['action'];
            $line = $row['line']; 
            $shift = $row['shift']; 
            $date = $row['date']; 
            $time = $row['time'];
            $state = $row['state'];
            if($shift == null){
                $shift = '!NULL!';
            }else{
                switch($shift){
                    case '1':
                        $shift = 'primer';
                    break;
                    case '2':
                        $shift = 'segundo';
                    break;
                    case '3':
                        $shift = 'tercer';
                    break;
                    default:
                break;
                }
            }
            if($sso == 0){
                $sso = 'No asignado';
                $ssoclass= 'text-muted small';
            }else{
                $ssoclass= '';
            }
            if(html_entity_decode($action) == 'se registró'){
                $wordaux = "en la";
            }else{
                $wordaux = "la";
            }
            echo '
            <tr id="'.$id.'">
               <td class="d-flex flex-column w-auto">
                    <div class="font-weight-normal"><span>'.$date.'</span></div>
                    <div class="font-weight-normal"><span>'.$time.'</span></div>
               </td>
               <td class="font-weight-normal text-lowercase"><span class="font-weight-bold">'.$sso.'</span> '.html_entity_decode($action).' '.$wordaux.' línea '.$line.', del <span class="text-uppercase font-weight-bold">'.$shift.'</span> turno</td>
               <td class="text-lowercase font-weight-normal">estado actual: <span class="text-uppercase font-weight-bold">'.$state.'</span></td>
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
