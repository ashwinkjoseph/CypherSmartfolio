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
        try {
    $conn = new PDO("sqlsrv:server = tcp:smartfolio.database.windows.net,1433; Database = matthew", "matthew", "MaC3!333");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
try{
        if(isset($_POST['submitproject'])){
            $user_id = intval($_POST['sid']);
            $o_id = intval($_POST['oid']);
            $school = $_POST['folio'];
            $platform = $_POST['platform'];
            $language = $_POST['language'];
            $hardware = $_POST['hardware'];
            $link = $_POST['link'];
            $description = $_POST['description'];
            $query = $handler->prepare("insert into projects values(Project_id, :platform, :language, :hardware, :link, :description, :user_id, :o_id, :school)");
            $query->bindParam(":platform", $platform);
            $query->bindParam(":language", $language);
            $query->bindParam(":hardware", $hardware);
            $query->bindParam(":link", $link);
            $query->bindParam(":description", $description);
            $query->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $query->bindParam(":o_id", $o_id, PDO::PARAM_INT);
            $query->bindParam(":school", $school);
            if($query->execute()){
                $result = $handler->query("select * from projects order by Project_id desc limit 1");
                $result2 = $handler->prepare("select * from o".$o_id." where id = :user_id");
                $result2->bindParam(":user_id", $user_id, PDO::PARAM_INT);
                $result2->execute();
                $projects = array();
                $var = $result->fetch(PDO::FETCH_ASSOC);
                $var2 = $result2->fetch(PDO::FETCH_ASSOC);
                if($var2['Projects']!=""){
                    $projects = explode(",",$var2['Projects']);
                }
                array_push($projects, $var['Project_id']);
                $pstring = implode(",", $projects);
                $query = $handler->prepare("UPDATE o".$o_id." SET Projects=:pstring WHERE id=:user_id");
                $query->bindParam(":pstring", $pstring);
                $query->bindParam(":user_id", $user_id, PDO::PARAM_INT);
                if($query->execute()){
                    echo "<script>alert('success');</alert>";
                }
                else{
                    echo("Failed");
                }
            }
            else{
                echo("Failed");
            }
        }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        ?>
    </body>
</html>
