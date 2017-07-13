<?php

if(isset($_POST['submit'])){
    $name = $_POST['Fname'];
    try{
        $handler = new PDO("mysql:host=127.0.0.1;dbname=matthew;charset=utf8", "ashwin", "ashwin");
        $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die("Sorry, Error Establishing Connection To Database");
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