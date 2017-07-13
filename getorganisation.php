<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <select name='organisation'>
            <option value =" " selected="1">Organisation</option>
            <?php 
            try {
    $conn = new PDO("sqlsrv:server = tcp:smartfolio.database.windows.net,1433; Database = matthew", "matthew", "MaC3!333");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
try{
            $o_id = intval($_GET['q']);
            $result = $handler->prepare("select * from organisations where Region_id = :o_id");
            $result->bindParam(":o_id", $o_id, PDO::PARAM_INT);
            $result->execute();
            while($var = $result->fetch(PDO::FETCH_ASSOC)){
                ?>
            <option value="<?php echo $var['id']; ?>"><?php echo $var['Name']; ?></option>
            <?php }
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            ?>
        </select>
    </body>
</html>
