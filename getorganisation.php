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
            $conn = mysqli_connect("localhost", "root", "", "matthew");
            $o_id = intval(mysqli_real_escape_string($conn, $_GET['q']));
            $result = mysqli_query($conn, "select * from organisations where Region_id = $o_id");
            while($var = mysqli_fetch_array($result)){
                ?>
            <option value="<?php echo $var['id']; ?>"><?php echo $var['Name']; ?></option>
            <?php } ?>
        </select>
    </body>
</html>
