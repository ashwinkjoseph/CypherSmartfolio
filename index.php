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
        <title>SmartFolio</title>
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
        <script>
            function getdata(){
                var region = document.getElementById("region").value;
                if (region==" "){
                    alert('Please select a region to proceed');
                }
                else{
                    if(window.XMLHttpRequest){
                        xmlhttp = new XMLHttpRequest();
                    }else{
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.open("GET", "getorganisation.php?q="+region+ "&__cachebuster__=" + new Date().getTime(),true);
                    xmlhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            var sel = document.createElement("div");
                            sel.innerHTML = this.responseText;
                            document.getElementById("submission").appendChild(sel);
                        }
                    }
                    xmlhttp.send();
                }
            }
        </script>
        <div>
       <div style="background-color:lightgray; width:100%; height:100px;">
           <form align="Right" method="POST"><br><br>
               <input type="text" name="email" placeholder="E-Mail" style="width:150px; height:30px"/>
                 <input type="password" name="password" placeholder="password" style="width:150px; height:30px"/>
                 <input type="submit" name="login" value="LogIn" style="width:150px; height:30px; font-size:15"/>
                 <!--<button name="login">submit</button>-->
           </form>
           <?php
           $count = 0;
           // PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:smartfolio.database.windows.net,1433; Database = matthew", "matthew", "MaC3!333");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
           class logindetails{
               public function __construct() {
                   $count++;
               }
           }
           try{
        if(isset($_POST["login"])){
            $username = $_POST["email"];
            $password = $_POST["password"];
            $query = $handler->prepare("SELECT * FROM logins where email=:email and password=:password");
            $query->bindParam(":email", $username);
            $query->bindParam(":password", $password);
            $query->execute();
            if($query->rowCount()){
                $temp = $query->fetch(PDO::FETCH_ASSOC);
                $id1 = $temp['user_id'];
                $id2 = $temp['O_id'];
                header("location:portFolio.php?id1=".$id1."&id2=".$id2);
            }
            else{
                 echo "<script>alert('The Credentials you entered are wrong')</script>";
            }
        }
?>
        </div>
        <div style="width:100%;background-image:url('back.jpg'); background-repeat: repeat-x; padding-bottom: 15px">
            <form id='submission' align="Center" method="POST">
                <input type="text" name="name" placeholder="Name" style="width:150px; height:40px;margin-left:655px; margin-top:100px ">         
                <input type="email" name="email1" placeholder="Email ID" style="width:300px; height:40px;margin-left:650px;"></br><br>
                <input type="password" name="password1" placeholder="New Password" style="width:300px; height:40px;margin-left:650px;"><br><br>
                <select id='region' aria-label="Region" name="Region" title="Region" style="height:40px; margin-left:560px;" onchange="getdata()">
                    <option value=" " selected="1">Region</option>
                    <?php
                    $var = $handler->query("select * from regions");
                    while($v = $var->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <option value="<?php echo $v['Region_id']; ?>"><?php echo $v['Region_Name']; ?></option>    
                    <?php } ?>
                </select>
                <input type="submit" name="signup" value="SignUp" style="width:150px; height:40px;margin-left:500px;"><br>
            </form>    
            <?php 
            if(isset($_POST["signup"])){
                $first = $_POST["name"];
                $email = $_POST["email1"];
                $pass = $_POST["password1"];
                $region = $_POST['Region'];
                $organisation = $_POST['organisation'];
                $var = $handler->query("select * from logins");
                $flag=FALSE;
                while($temp = $var->fetch(PDO::FETCH_ASSOC)){
                    if($temp["email"]==$email){
                        $flag=TRUE;
                    }
                }
                $F=0;
                if(!$flag){
                    $blank = "";
                    $organisations = "o".$organisation;
                    $sql = "INSERT INTO $organisations values(id, :first, :region, :blank)";
                    $query = $handler->prepare($sql);
                    $query->bindParam(":first", $first);
                    $query->bindParam(":region", $region, PDO::PARAM_INT);
                    $query->bindParam(":blank", $blank);
                    $query->execute();
                    $query = $handler->prepare("select * from $organisations order by id desc limit 1");
                    $query->execute();
                    if($query->rowCount()){
                        $var = $query->fetch(PDO::FETCH_ASSOC);
                        $user_id = $var['id'];
                        $F = $handler->prepare("INSERT INTO logins values(id, :email, :pass, :region, :organisation, :user_id)");
                        $F->bindParam(":email", $email);
                        $F->bindParam(":pass", $pass);
                        $F->bindParam(":region", $region);
                        $F->bindParam(":organisation", $organisation);
                        $F->bindParam(":user_id", $user_id);
                        $F->execute();
                    }
                }
                }
           }
                catch(PDOException $e){
                    echo $e->getMessage();
                    echo "<script>alert('Failed')</script>";
                }
        ?>
            
        </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>

</html>       