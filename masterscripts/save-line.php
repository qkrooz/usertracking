<?php
    include 'C:\inetpub\wwwroot\UserTracking\checking\serverConnection.php';
    if($conn){
        // Horarios de entrada para los turnos
        $shiftStart_first = strtotime('01 Jan 2000 06:00:00 AM');
        $shiftStart_seccond = strtotime('01 Jan 2000 03:30:00 PM');
        $shiftStart_seccondFix = strtotime('01 Jan 2000 12:00:00 AM');
        $shiftStart_third = strtotime('01 Jan 2000 12:30:00 AM');
        // 
        $shiftEnd_first = strtotime('01 Jan 2000 03:30:00 PM');
        $shiftEnd_seccond = strtotime('01 Jan 2000 11:59:59 PM');
        $shiftEnd_seccondFix = strtotime('01 Jan 2000 12:30:00 AM');
        $shiftEnd_third = strtotime('01 Jan 2000 06:00:00 AM');
        // 
        $pivot = '01 Jan 2000 ';
        $time = date("g:i:s A");
        $currentTime = strtotime($pivot.$time);
        if (
            ($currentTime >= $shiftStart_first && $currentTime <= $shiftStart_seccond) ||
            $currentTime == $shiftStart_first
        ) {
            $shift = 1;            
        } else if (
            ($currentTime >= $shiftStart_seccond && $currentTime <= shiftEnd_seccond) ||
            $currentTime == $shiftStart_seccond
        ) {
            $shift = 2;           
        } else if (
            ($currentTime >= $shiftStart_seccondFix && $currentTime <= $shiftStart_third) ||
            $currentTime == $shiftStart_seccondFix
        ) {
            $shift = 2;           
        } else if (
            ($currentTime >= $shiftStart_third && $currentTime <= $shiftStart_first) ||
            $currentTime == $shiftStart_third
        ) {
            $shift = 3;
        } else {
            echo "ERROR 5000";
        }
        // INSERT ROW TO WORK
        $dateStamp = date("d-m-Y");
        $timeStamp = date('H:i:s');
        $sql = "INSERT INTO userslogsline (date, time, shift) VALUES (?,?,?)";
        $params = array($dateStamp, $timeStamp, $shift);
        $stmt = sqlsrv_query($conn, $sql, $params);
        if($stmt){
            // 
            $sql3 = "SELECT * FROM usersmaster WHERE [shift] = $shift";
            $stmt3 = sqlsrv_query($conn, $sql3);
            while($row3 = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)){
                // 
                $sql2 = "SELECT TOP 1 * FROM userslogsline ORDER BY id DESC";
                $stmt2 = sqlsrv_query($conn, $sql2);
                while($row2 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)){
                    $id = $row2['id'];
                }
                //  
                $sso = $row3['sso'];
                $line = $row3['line'];
                $station = '0';
                $status = $row3['status'];
                $index = $row3['index'];
                switch($index){
                    case '1':
                        $sql4 = "UPDATE userslogsline SET [line] = ?, u1 = ?, u1status = ? WHERE id = '$id'";
                    break;
                    case '2':
                        $sql4 = "UPDATE userslogsline SET [line] = ?, u2 = ?, u2status = ? WHERE id = '$id'";
                    break;
                    case '3':
                        $sql4 = "UPDATE userslogsline SET [line] = ?, u3 = ?, u3status = ? WHERE id = '$id'";
                    break;
                    case '4':
                        $sql4 = "UPDATE userslogsline SET [line] = ?, u4 = ?, u4status = ? WHERE id = '$id'";
                    break;
                    case '5':
                        $sql4 = "UPDATE userslogsline SET [line] = ?, u5 = ?, u5status = ? WHERE id = '$id'";
                    break;
                    case '6':
                        $sql4 = "UPDATE userslogsline SET [line] = ?, u6 = ?, u6status = ? WHERE id = '$id'";
                    break;
                    case '7':
                        $sql4 = "UPDATE userslogsline SET [line] = ?, u7 = ?, u7status = ? WHERE id = '$id'";
                    break;
                    case '8':
                        $sql4 = "UPDATE userslogsline SET [line] = ?, u8 = ?, u8status = ? WHERE id = '$id'";
                    break;
                    default:
                    break;
                }
                $params4 = array($line, $sso, $status);
                $stmt4 = sqlsrv_query($conn, $sql4, $params4);
                if($stmt4){
                }else{
                    die( print_r( sqlsrv_errors(), true));
                }
            }
        }else{
            die( print_r( sqlsrv_errors(), true));
        }
    }
?>