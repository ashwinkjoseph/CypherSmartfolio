<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "matthew");
        $user_id = mysqli_real_escape_string($conn, $_GET['id1']);
        $o_id = mysqli_real_escape_string($conn, $_GET['id2']);
        $result = mysqli_query($conn, "select * from ".$o_id." where id=".$user_id);
        if($result){
        $var = mysqli_fetch_array($result);
        ?>
        <meta charset="UTF-8">
        <title><?php echo $var['Name']; ?></title>
    </head>
    <body>
        <?php}
        else{?>
            <meta charset="UTF-8">
        <title></title>
    </head>
    <body> <?php
            echo mysqli_error($conn);
        }
        ?>
        <form action="addProject.php?id1=<?php echo $user_id; ?>&id2=<?php echo $o_id; ?>" method="POST">
            <select name="platform">
                <option value=" " selected="1">Platform</option>
                <option value="ARM">ARM</option>
                <option value="x86">x86</option>
                <option value="AVR">AVR</option>
            </select>
            <input type="text" name="language" placeholder="language used">
            Leave this field if not related to hardware
            <select name="hardware">
                <option value=" ">Hardware</option>
                <option value="Raspberry Pi">Raspberry Pi</option>
                <option value="Arduino">Arduino</option>
                <option value="Galileo">Galileo</option>
                <option value="NodeMCU">NodeMCU</option>
            </select>
            <input type="text" name="link" placeholder="project link">
            <textarea name="description">description</textarea>
            <select name="school">
                <option value=" " selected="1">School</option>
                <option value="School1">School1</option>
                <option value="School2">School2</option>
            </select>
            <input type="submit" name="submitproject" value="submit">
        </form>
        <?php
        
        ?>
    </body>
</html>
