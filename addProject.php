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
        $user_id = $_GET['id1'];
        $o_id = $_GET['id2'];
        $conn = mysqli_connect("localhost", "root", "", "matthew");
        if(isset($_POST['submitproject'])){
            $platform = $_POST['platform'];
            $language = $_POST['language'];
            $hardware = $_POST['hardware'];
            $link = $_POST['link'];
            $description = $_POST['description'];
            $school = $_POST['school'];
            if(mysqli_query($conn, "insert into projects values(Project_id, '$platform', '$language', '$hardware', '$link', '$description', $user_id, $o_id, '$school')")){
                $result = mysqli_query($conn, "select * from projects order by Project_id desc limit 1");
                if(!$result){
                    echo mysqli_error($conn);
                }
                else{
                    $result2 = mysqli_query($conn, "select * from o".$o_id." where id=".$user_id);
                    if(!$result2){
                        echo mysqli_error($conn);
                    }
                    else{
                        $var = mysqli_fetch_array($result);
                        $var2 = mysqli_fetch_array($result2);
                        $projects = $var2['Projects']." ".$var['Project_id'];
                        if(mysqli_query($conn, "UPDATE o".$o_id." SET Projects='$projects' WHERE id=".$user_id)){
                            echo "<script>alert('success');</alert>";
                            header("location:getuser.php?id1=".$user_id."&id2=".$o_id);
                        }
                        else{
                            echo mysqli_error($conn);
                        }
                    }
                }
            }
            else{
                echo mysqli_error($conn);
            }
        }
        ?>
    </body>
</html>
