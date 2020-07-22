<?php
    include 'C:\inetpub\wwwroot\UserTracking\checking\serverConnection.php';
    if($conn){
        $sql = "UPDATE lineconfig SET userstofetch1 = 0";
        $stmt = sqlsrv_query($conn, $sql);
    }
?>