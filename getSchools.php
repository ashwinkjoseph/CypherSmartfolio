<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            function  getProjects(id){
                if(window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.open("GET", "getProjects.php?sid=<?php echo $_GET['sid'] ?>&oid=<?php echo $_GET['oid'] ?>&folio="+id+"&__cachebuster__=" + new Date().getTime(),true);
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        var divi = document.createElement('div');
                        divi.innerHTML = this.responseText;
                        // var pare = document.getElementById(document.getElementById(id).parentNode.id)
                        // pare.parentNode.insertBefore(divi, pare.nextSibling);
                        $('#'+document.getElementById(id).parentNode.id).after(this.responseText);
                    }
                }
                xmlhttp.send();
            }
        </script>
    </head>
    <body>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php 
                    try{
                        $handler = new PDO("mysql:host=127.0.0.1;dbname=matthew;charset=utf8", "ashwin", "ashwin");
                        $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }
                    catch(PDOException $e){
                        die("Sorry, Error Establishing Connection To Database");
                    }
                    try{
                        $sid = $_GET['sid'];
                        $oid = $_GET['oid'];
                        $query = $handler->prepare("SELECT school FROM schools");
                        $query->execute();
                        if($query->rowCount()){
                            $count=1;
                            while($temp = $query->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <div class="row" style="background-color:white" id="c<?php echo $count ?>">
                                    <div class="col-md-10"><?php echo $temp['school'] ?></div>
                                    <div class="col-md-2" style="text-align: center" onclick="getProjects(this.id)" id="<?php echo $temp['school'] ?>">SHOW</div>
                                </div>
                                <?php
                                $count++;
                            };
                        }
                        else{
                            echo "<script>alert('The Credentials you entered are wrong')</script>";
                        }
                    }
                    catch(PDOException $e){
                        echo "<script>alert('something went wrong')</script>";
                    }
            ?>
            </div>
            <div class="col-md-2"></div>
        </div>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>