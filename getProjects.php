<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <?php 
                    try{
                        $handler = new PDO("mysql:host=13.95.219.185;dbname=matthew;charset=utf8", "root", "");
                        $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }
                    catch(PDOException $e){
                        die("Sorry, Error Establishing Connection To Database");
                    }
                    try{
                        $sid = $_GET['sid'];
                        $oid = $_GET['oid'];
                        $folio = $_GET['folio'];
                        $query = $handler->prepare("SELECT * FROM projects where user_id= :sid AND o_id=:roid AND school=:folio");
                        $query->bindParam(":sid", $sid);
                        $query->bindParam(":roid", $oid);
                        $query->bindParam(":folio", $folio);
                        $query->execute();
                        ?>
                        <div class="row" style="background-color:white">
                            <div class="col-md-12" style="text-align:center" data-toggle="modal" data-target="#add<?php echo $folio ?>">Add new Project</div>
                        </div>
                        <div id="add<?php echo $folio ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="Platform">Platform:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="platform" id="<?php echo $folio ?>platform" class="form-control" placeholder="Enter Platform"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="Language">Language:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="language" id="<?php echo $folio ?>language" class="form-control" placeholder="Enter Language"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="Hardware">Hardware:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="hardware" id="<?php echo $folio ?>hardware" class="form-control" placeholder="Enter Hardware"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="Project Link">Project Link:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="link" id="<?php echo $folio ?>link" class="form-control" placeholder="Paste Project Link"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="Project Summary">Project Summary:</label>
                                                <div class="col-sm-10">
                                                    <textarea name="description" id="<?php echo $folio ?>description" class="form-control" placeholder="Enter Description"></textarea>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-default" onclick="addProject('<?php echo $sid ?>', '<?php echo $oid ?>', '<?php echo $folio ?>')">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        <?php
                        if($query->rowCount()){
                            $count = 1;
                            while($temp = $query->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <div class="row" style="background-color:white" id="c<?php echo $folio.$count ?>" name="<?php echo $folio ?>">
                                    <div class="col-md-8" style="overflow:hidden"><?php echo $temp['Project_Summary'] ?></div>
                                    <div class="col-md-2" style="text-align: center" data-toggle="modal" data-target="#yet2badded">EDIT</div>
                                    <div class="col-md-2" style="text-align: center" data-toggle="modal" data-target="#cc<?php echo $folio.$count ?>">SHOW</div>
                                </div>
                                <div id="cc<?php echo $folio.$count ?>" class="modal fade" role="dialog" name="<?php echo $folio ?>">
                                    <div class="modal-dialog">
                                    
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Platform: <?php echo $temp['Platform'] ?></p>
                                            <p>Language: <?php echo $temp['Language'] ?></p>
                                            <p>Hardware: <?php echo $temp['Hardware'] ?></p>
                                            <p><a href="<?php echo $temp['Project_Link'] ?>">Project_Link</a></p>
                                            <p>Project Summary: <?php echo $temp['Project_Summary'] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                                <?php
                                $count = $count + 1;
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
            <div class="col-md-1"></div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>