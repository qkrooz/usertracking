<?php
include 'serverConnection.php';
if($conn){
    $celda=$_POST['celda'];    
    $sql = "SELECT * FROM $celda";
    $stmt = sqlsrv_query($conn, $sql);
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        $sso = $row['sso'];
        echo '
        <button type="button" id="jhg" class="btn-4 mt-2 mr-1 btn-light">
        <div class="card m-2" style="width: 15rem;">
        <i class="fas fa-user"></i>
            <div class="card-body">
              <p class="card-text">
                '.$sso.'
              </p>
            </div>
          </div>
        </button>
        
       
        ';
    }
    // echo '<div class="card m-2" style="width: 15rem;">
    // <i class="fas fa-user-plus ml-3 mt-1 mb-2" id="upl"></i>
    //     <div class="card-body">
    //       <p class="card-text">
    //         Agregar Usuario
    //       </p>
    //     </div>
    //   </div>';
}
?>