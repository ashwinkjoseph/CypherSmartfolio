<html>
<head><title>Ashwin</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="newsfeed.css">
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
                        <div id="NewsFeed" style="background-color:black; padding-right:0px; text-align:center"><a href="newsFeed.php?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>" style="color: white">NewsFeed</a></div>
                        <div id="portfolio" style="text-align:center"><a href="portFolio.php?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>" style="color:white;">portFolio</a></div>
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
                            <div class="col-md-12">
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
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function(){
                        $("#news").load("getFeed.php");
                    }); 
                </script>
                <script src="post_status.js"></script>
                <div class="row">
                    <div class="col-md-12" id="preBox">
                        <div id="statusError"></div>
                        <textarea id="statusBox" placeholder="Write a Status here....."></textarea>
                        <button id="statusBtn">POST</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="news"></div>
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
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>