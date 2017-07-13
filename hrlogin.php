<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book Your Movie</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            .wrapper {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  padding: 20px;
  background: rgba(255,248,220, 0.85);
}
        </style>
    </head>
    <body style="margin:0px; background-repeat:repeat-x;">
        <div>
       <div style="background-color:lightgray; width:100%; height:100px;">
           <form align="Right" method="POST"><br><br>
               <input type="text" name="email" placeholder="E-Mail" style="width:150px; height:30px"/>
                 <input type="password" name="password" placeholder="password" style="width:150px; height:30px"/>
                 <input type="submit" name="login" value="LogIn" style="width:150px; height:30px; font-size:15"/>
                 <!--<button name="login">submit</button>-->
           </form>
           <?php
           session_start();
           $handler = new PDO("mysql:host=127.0.0.1;dbname=matthew;charset=utf8", "ashwin", "ashwin");
           $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST["login"])){
            $username=$_POST["email"];
            $password=$_POST["password"];
            $s= $handler->prepare("SELECT * FROM hrlogins where email=:username and password=:password");
            $s->bindParam(":username", $username);
            $s->bindParam(":password", $password);
            $s->execute();
            if($s->rowCount()){
                $temp = $s->fetch(PDO::FETCH_ASSOC);
                $id1 = $temp['user_id'];
                header("location:gethruser.php?id1=".$id1."&name=".$temp['name']);
            }
            else{
                 echo "<script>alert('The Credentials you entered are wrong')</script>";
            }
        }
?>
        </div>
        <div style="width:100%;background-image:url('back.jpg'); background-repeat: repeat-x; padding-bottom: 15px">
            <form id='submission' align="Center" method="POST">
                <input type="text" name="name" placeholder="Name" style="width:150px; height:40px;margin-left:655px; margin-top:100px">         
                <input type="email" name="email1" placeholder="Email ID" style="width:300px; height:40px;margin-left:650px;"></br><br>
                <input type="password" name="password1" placeholder="New Password" style="width:300px; height:40px;margin-left:650px;"><br><br>
                <input list="companies" name="companyname" style="width:150px; height:40px;margin-left:655px; margin-top:100px">
                <datalist id="companies">
                    <?php
                    $query = "SELECT * FROM COMPANIES";
                    $var = $handler->query($query);
                    while($temp = $var->fetch(PDO::FETCH_ASSOC)){
                        ?>
                    <option value="<?php echo $temp['name'] ?>-<?php echo $temp['id'] ?>">
                        <?php
                    }?>
                </datalist>
                <input type="password" name="companykey" placeholder="Company Key" style="width:150px; height:40px;margin-left:655px; margin-top:100px">
                <input type="submit" name="signup" value="SignUp" style="width:150px; height:40px;margin-left:500px;"><br>
            </form>    
            <?php 
            if(isset($_POST["signup"])){
                $first = $_POST["name"];
                $email = $_POST["email1"];
                $pass = $_POST["password1"];
                $companyname = array();
                $companyname = explode("-", $_POST['companyname']);
                $companyid = $companyname[1];
                $companykey = $_POST['companykey'];
                $var = $handler->query("select * from COMPANIES");
                $flag=TRUE;
                while($temp = $var->fetch(PDO::FETCH_ASSOC)){
                    if($temp["id"]==$companyid){
                        if($companykey==$temp['companykey']){
                            $flag = FALSE;
                        }
                    }
                }
                $var = $handler->query("select * from hrlogins");
                while($temp=$var->fetch(PDO::FETCH_ASSOC)){
                    if($temp["email"]==$email){
                        $flag=TRUE;
                    }
                }
                $result = false;
                if(!$flag){
                    $blank = "";
                    $sql = "INSERT INTO hrlogins values(id, :name, :email, :pass, :companyid)";
                    $result = $handler->prepare($sql);
                    $result->bindParam(":name", $first);
                    $result->bindParam(":email", $email);
                    $result->bindParam(":pass", $pass);
                    $result->bindParam(":companyid", $companyid, PDO::PARAM_INT);
                    if($result->execute()){
                        echo "<script>alert('Success')</script>";
                    }
                }
            }
        ?>
        </div>
            <div class="wrapper" style="background-color: #3d3d3d;">
                <font color="white">  Designed By Joseph Ashwin Kottapurath, MACE, Kothamangalam</font>
      </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>

</html>       