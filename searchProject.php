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
        $handler = new PDO("mysql:host=127.0.0.1;dbname=matthew;charset=utf8", "root", "");
        $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['submitproject'])){
            $region = inval($_POST['Region']);
            $platform = $_POST['platform'];
            $language = $_POST['language'];
            $hardware = $_POST['hardware'];
            $sql = "SELECT o.id, o.Name FROM organisations AS o INNER JOIN regions AS r ON (o.Region_id = r.Region_id) WHERE r.Region_id = :rid";
            $org = $handler->prepare($sql);
            $org->bindParam(":rid", $region);
            $org->execute();
            while($oid = $org->fetch(PDO::FETCH_ASSOC)){
                ?>
                <h2><?php echo $oid['Name']; ?></h2>
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
                    $count++;
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
                    
                }
                else{
                    die("Failed");
                }
            }
        }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        ?>
    </body>
</html>
