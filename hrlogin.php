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
           $conn=mysqli_connect("localhost","root","","matthew");
        if(isset($_POST["login"])){
            $username=$_POST["email"];
            $password=$_POST["password"];
            $s=mysqli_query($conn, "SELECT * FROM hrlogins where email='$username' and password='$password'");
            if(mysqli_num_rows($s)>0){
                $temp=mysqli_fetch_array($s);
                $id1 = $temp['user_id'];
                header("location:getuser.php?id1=".$id1);
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
                <input list="companies" name="comapnyname" style="width:150px; height:40px;margin-left:655px; margin-top:100px">
                <datalist id="companies">
                    <?php
                    $query = "SELECT * FROM COMPANIES";
                    $var = mysqli_query($conn, $query);
                    while($temp = mysqli_fetch_array($var)){
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
                $first = mysqli_real_escape_string($conn, $_POST["name"]);
                $email = mysqli_real_escape_string($conn, $_POST["email1"]);
                $pass = mysqli_real_escape_string($conn. $_POST["password1"]);
                $companyname = explode("-", mysqli_real_escape_string($conn, $_POST['companyname']));
                $companyid = $companyname[1];
                $companykey = mysqli_real_escape_string($conn, $_POST['companykey']);
                $var=mysqli_query($conn, "select * from hrlogins");
                $flag=TRUE;
                while($temp = mysqli_fetch_array($var)){
                    if($temp["id"]==)
                }
                while($temp=mysqli_fetch_array($var)){
                    if($temp["email"]==$email){
                        $flag=TRUE;
                    }
                }
                $F=0;
                if(!$flag){
                    $blank = "";
                    $organisations = "o".$organisation;
                    $sql = "INSERT INTO ".$organisations." values(id, '$first', $region , '$blank')";
                    $E = mysqli_query($conn, $sql);
                    $result = mysqli_query($conn, "select * from ".$organisations." order by id desc limit 1");
                    if(mysqli_num_rows($result)>0){
                        $var = mysqli_fetch_array($result);
                        $user_id = $var['id'];
                        $F = mysqli_query($conn,"INSERT INTO logins values(id, '$email', '$pass', $region, $organisation, $user_id)");
                    }
                }
                if($F && $E){
                    echo "<script>alert('Success')</script>";
                }
                else{
                    $er = mysqli_error($conn);
                    echo "<script>alert('Failed')</script>";
                    echo $er;
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