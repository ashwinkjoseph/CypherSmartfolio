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
        <?php
        try{
        $handler = new PDO("mysql:host=13.95.219.185;dbname=matthew;charset=utf8", "root", "");
        $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['submitproject'])){
            $region = intval($_POST['Region']);
            $platform = (isset($_POST['platform']))?$_POST['platform']:"ALL";
            $language = ($_POST['language']!="")?$_POST['language']:"ALL";
            $hardware = (isset($_POST['hardware']))?$_POST['hardware']:"ALL";
            $sql = "SELECT o.id, o.Name, r.Region_Name FROM organisations AS o INNER JOIN regions AS r ON (o.Region_id = r.Region_id) WHERE r.Region_id = :rid";
            $org = $handler->prepare($sql);
            $org->bindParam(":rid", $region);
            $org->execute();
            while($oid = $org->fetch(PDO::FETCH_ASSOC)){
                ?>
        <table border = "1">
            <thead>
            <tr>
            <th>College</th>
            <th>Student Name</th>
            <th>Region Name</th>
            <th>Platform</th>
            <th>Language</th>
            <th>Hardware</th>
            <th>Project Link</th>
            <th>Project Summary</th>
            </tr>
            </thead>
            <tbody>
        <?php
                $pcon = "Platform=:platform";
                $lcon = "Language=:language";
                $hcon = "Hardware=:hardware";
                if($platform == "ALL"){
                    $pcon = "";
                }
                if($language == "ALL"){
                    $lcon = "";
                }
                if($hardware == "ALL"){
                    $hcon = "";
                }
                $sql = "select * from projects where o_id = :oid";
                foreach (array($pcon, $lcon, $hcon) as $con){
                    if($con!=""){
                        $sql = $sql." AND ".$con;
                    }
                }
                $query = $handler->prepare($sql);
                $query->bindParam(":oid", $oid['id'], PDO::PARAM_INT);
                if($pcon!=""){
                    $query->bindParam(":platform", $platform);
                }
                if($lcon!=""){
                    $query->bindParam(":language", $language);
                }
                if($hcon!=""){
                    $query->bindParam(":hardware", $hardware);
                }
                if($query->execute()){
                    while($var = $query->fetch(PDO::FETCH_ASSOC)){
                        $sql = "SELECT Name FROM o".$oid['id']." WHERE id=".$var['user_id'];
                        $query2 = $handler->query($sql);
                        while($var2 = $query2->fetch(PDO::FETCH_ASSOC)){
                        ?>
                <tr>
                <td><?php echo $oid['Name']; ?></td>
                <td><a href="profileview.php?uid=<?php echo $var['user_id']; ?>&oid=<?php echo $oid['id']; ?>"><?php echo $var2['Name']; ?></a></td>
                <td><?php echo $oid['Region_Name']; ?></td>
                <td><?php echo $var['Platform']; ?></td>
                <td><?php echo $var['Language']; ?></td>
                <td><?php echo $var['Hardware']; ?></td>
                <td><a href="<?php echo $var['Project_Link']; ?>"><?php echo $var['Project_Link']; ?></a></td>
                <td><?php echo $var['Project_Summary']; ?></td>
                </tr>
                <?php
                        }
                    }
                }
                else{
                    die("Failed");
                }
                ?>
                </tbody>
                </table>
                <?php 
            }
        }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        ?>
    </body>
</html>
