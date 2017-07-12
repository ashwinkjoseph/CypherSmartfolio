<html>
<head><title>Ashwin</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
    .dropbtn {
        background-color: black;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
</style>
</head>
<body>
    <div>
        <div class="row">
            <div class="col-md-2" style="background-color:  3a739e; height:100%;">
                <div class="row">
                    <!-- <div class="col-md-4"></div> -->
                    <div class="col-md-12">
                        <br><br>
                        <div id="NewsFeed" style="text-align:center"><a href="newsFeed.php?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>" style="color: white">NewsFeed</a></div>
                        <div id="portfolio" style="background-color:black; padding-right:0px; text-align:center"><a href="portFolio.php?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>" style="color:white;">portFolio</a></div>
                        <div id="freelancing"style="text-align:center" data-toggle="modal" data-target="#yet2badded"><a style="color: white">Free Lancing</a></div>
                        <div id="collaboration"style="text-align:center" data-toggle="modal" data-target="#yet2badded"><a style="color: white">Collaboration</a></div>
                        <div id="Notesharing"style="text-align:center" data-toggle="modal" data-target="#yet2badded"><a style="color: white">Note Sharing</a></div>
                        <div id="College-board" style="text-align:center" data-toggle="modal" data-target="#yet2badded"><a style="color: white">College Board</a></div>
                        <div id="Jobs" style="text-align:center" data-toggle="modal" data-target="#yet2badded"><a style="color: white">Jobs</a></div>
                        <div id="AluminiConnect" style="text-align:center" data-toggle="modal" data-target="#yet2badded"><a style="color: white">Alumini Connect</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-10" style="background-color:white">
            <br>
                <div class="row">
                    <div class="col-md-12" style="background-color: black; z-index:1; margin-top:-20px">
                        <div class="row">
                            <div class="col-md-12" style="width:100%">
                                <div class="row">
                                    <div class="col-md-11"></div>
                                    <div class="col-md-1">
                                        <div class="dropdown" style="float:right;">
                                            <button id="userOptions" style="color:white" class="dropbtn">Ashwin</button>
                                            <div class="dropdown-content">
                                                <a data-toggle="modal" data-target="#yet2badded">Profile</a>
                                                <a href="index.php">Log Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="height:50px; background-color:grey;">
                                    <div id="addNew" class="col-md-4" style="color:white; cursor:pointer" data-toggle="modal" data-target="#addFolio">Add New Portfolios</div>
                                    <div id="viewPortfolios" class="col-md-4" style="color:white; cursor:pointer">View Existing Portfolios</div>
                                    <div id="search" class="col-md-4" style="color:white; cursor:pointer" data-toggle="modal" data-target="#yet2badded">Search in Portfolios</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="contentField" style="width:100%; height:100%; background-color:white; margin:0px">
                </div>
            </div>
        </div>
    </div>
    <div id="addFolio" class="modal fade" role="dialog">
        <div class="modal-dialog">
        
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="PortFolio">New PortFolio:</label>
                        <div class="col-sm-10">
                            <input type="text" name="PortFolio" id="PortFolio" class="form-control" placeholder="Enter Name of Portfolio"/>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default" onclick="createFolio()">Create</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
    </div>
    <div id="yet2badded" class="modal fade" role="dialog">
        <div class="modal-dialog">
        
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                This feature is still being added
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
    </div>
    <script>
        var viewPortfolios = document.getElementById("viewPortfolios");
        viewPortfolios.addEventListener("click", function(){
            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.open("GET", "getSchools.php?sid=<?php echo $_GET['id1'] ?>&oid=<?php echo $_GET['id2'] ?>&__cachebuster__=" + new Date().getTime(),true);
            xmlhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    var sel = document.createElement("content");
                    sel.innerHTML = this.responseText;
                    document.getElementById("contentField").appendChild(sel);
                }
            }
            xmlhttp.send();
        });
        function  getProjects(id){
                if(window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.open("GET", "getProjects.php?sid=<?php echo $_GET['id1'] ?>&oid=<?php echo $_GET['id2'] ?>&folio="+id+"&__cachebuster__=" + new Date().getTime(),true);
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        var divi = document.createElement('div');
                        divi.innerHTML = this.responseText;
                        var pare = document.getElementById(document.getElementById(id).parentNode.id)
                        pare.parentNode.insertBefore(divi, pare.nextSibling);
                    }
                }
                xmlhttp.send();
            }
        function addProject(sids, oids, folios){
            let platforms = document.getElementById(folios+"platform").value;
            let languages = document.getElementById(folios+"language").value;
            let hardwares = document.getElementById(folios+"hardware").value;
            let links = document.getElementById(folios+"link").value;
            let descriptions = document.getElementById(folios+"description").value;
            // if(window.XMLHttpRequest){
            //     xmlhttp = new XMLHttpRequest();
            // }else{
            //     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            // }
            // xmlhttp.open("POST", "addProjects.php?sid="+sid+"&oid="+oid+"&folio="+folio, true);
            // xmlhttp.onreadystatechange = function(){
            //         if(this.readyState == 4 && this.status == 200){
            //             var divi = document.createElement('div');
            //             divi.innerHTML = this.responseText;
            //             var pare = document.getElementById(document.getElementById(id).parentNode.id)
            //             pare.parentNode.insertBefore(divi, pare.nextSibling);
            //         }
            //     }
            // xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // xmlhttp.send("platform="+platform+"&language="+language+"&hardware="+hardware+"&link="+link+"&description="+description);
            $.post("addProject.php",
            {
                sid: sids,
                oid: oids,
                folio: folios,
                platform: platforms,
                language: languages,
                hardware: hardwares,
                link : links,
                description: descriptions,
                submitproject: "yes"
            },
            function(data, status){
                alert("Status: " + status);
            });
            $('div[name='+folios+']').remove();
            getProjects(folios);
        }
        function createFolio(){
            var Fname = document.getElementById('PortFolio').value
            $.post("addFolio.php",
            {
                Fname: Fname,
                submit: "yes"
            },
            function(data, status){
                alert("Status: " + status);
            });
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>