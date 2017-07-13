<?php

if(isset($_POST['submit'])){
    $name = $_POST['Fname'];
    try {
    $conn = new PDO("sqlsrv:server = tcp:smartfolio.database.windows.net,1433; Database = matthew", "matthew", "MaC3!333");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
    try{
        $query = $handler->prepare("INSERT INTO schools VALUES(id, :name)");
        $query->bindParam(":name", $name);
        $query->execute();
    }
    catch(PDOException $e){
        echo "Sorry, couldn't complete";
    }
}