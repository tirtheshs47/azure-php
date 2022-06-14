<?php
    $serverName = "rutuja-sql-server.database.windows.net"; 
    $connectionOptions = array(
        "Database" => "rutuja-db", 
        "Uid" => "rutuja", 
        "PWD" => "rutu@1234" 
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "INSERT INTO employeeinfo (fname, lname) VALUES('$_POST[fname]','$_POST[lname]')";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Data entered successfully!" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['CategoryName'] . " " . $row['ProductName'] . PHP_EOL);
    }
    sqlsrv_free_stmt($getResults);
?>
