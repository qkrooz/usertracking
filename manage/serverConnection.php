<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$serverName = "MXCJSBAK01\SQLTESTSVR";  
$connectionInfo = array( "Database"=>"ITSUPPORT", "UID"=>"DB_user", "PWD"=>"S1stu5er");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
?>