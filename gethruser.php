<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        try{
        $handler = new PDO("mysql:host=13.95.219.185;dbname=matthew;charset=utf8", "root", "");
        $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user_id = $_GET['id1'];
        ?>
        <meta charset="UTF-8">
        <title><?php echo $_GET['name']; ?></title>
    </head>
    <body>
            <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="searchProject.php" method="POST">
            <select id='region' aria-label="Region" name="Region" title="Region" style="height:40px; margin-left:560px;" onchange="getdata()">
                <option value=" " selected="1">Region</option>
                <?php
                $var = $handler->query("select * from regions");
                while($v = $var->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option value="<?php echo $v['Region_id']; ?>"><?php echo $v['Region_Name']; ?></option>    
                <?php } ?>
            </select>
            <select name="platform">
                <option value="ALL" selected="1">Platform</option>
                <option value="ARM">ARM</option>
                <option value="x86">x86</option>
                <option value="AVR">AVR</option>
            </select>
            <input type="text" name="language" placeholder="language used">
            Leave this field if not related to hardware
            <select name="hardware">
                <option value="ALL">Hardware</option>
                <option value="Raspberry Pi">Raspberry Pi</option>
                <option value="Arduino">Arduino</option>
                <option value="Galileo">Galileo</option>
                <option value="NodeMCU">NodeMCU</option>
            </select>
            <input type="submit" name="submitproject" value="submit">
        </form>
        <?php
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        
        ?>
    </body>
</html>
