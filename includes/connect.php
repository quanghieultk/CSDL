<?php
    $serverName = "DESKTOP-0K07THG"; //serverName\instanceName
    $connectionInfo = array( "Database"=>"BTL_CSDL", "UID"=>"", "PWD"=>"","CharacterSet"=>"UTF-8");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    ini_set('mssql.charset', 'UTF-8');
    if( $conn ) {

    }else{
        echo "Connection could not be established.<br />";
        die( print_r( sqlsrv_errors(), true));
    }
    // $sql = "SELECT * FROM dbo.SanPham";
    // $rs = sqlsrv_query($conn,$sql);
    // echo ($rs);
    // while($r = sqlsrv_fetch_array($rs))
    // {
    //     print($r['Ten']);
    // }
?>    