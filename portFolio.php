<html>
<head><title><?php echo $_GET['id1']; ?></title></head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<body>
    <div>
        <div class="row">
            <div class="col-md-2" style="background-color:  3a739e; height:100%;">
                <div class="row">
                    <!-- <div class="col-md-4"></div> -->
                    <div class="col-md-12">
                        <br><br>
                        <div id="NewsFeed" style="text-align:center"><a href="/newsFeed.php" style="color: white">NewsFeed</a></div>
                        <div id="portfolio" style="background-color:black; padding-right:0px; text-align:center"><a href="/portFolio.php" style="color:white;">portFolio</a></div>
                        <div id="freelancing"style="text-align:center"><a href="/newsFeed.php" style="color: white">Free Lancing</a></div>
                        <div id="collaboration"style="text-align:center"><a href="/newsFeed.php" style="color: white">Collaboration</a></div>
                        <div id="Notesharing"style="text-align:center"><a href="/newsFeed.php" style="color: white">Note Sharing</a></div>
                        <div id="College-board" style="text-align:center"><a href="/newsFeed.php" style="color: white">College Board</a></div>
                        <div id="College-board" style="text-align:center"><a href="/newsFeed.php" style="color: white">Jobs</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-10" style="background-color:black">
            <br>
                <div class="row">
                    <div class="col-md-12" style="background-color: black">
                        <div class="row">
                            <div class="col-md-12" style="width:100%">
                                <div class="row">
                                    <div class="col-md-11"></div>
                                    <div class="col-md-1">
                                        <div id="userOptions" style="color:white"><?php echo $_GET['id1']; ?></div>
                                    </div>
                                </div>
                                <div class="row" style="height:50px; background-color:grey;">
                                    <div id="addNew" class="col-md-4" style="color:white">Add New Portfolios</div>
                                    <div id="viewPortfolios" class="col-md-4" style="color:white">View Existing Portfolios</div>
                                    <div id="search" class="col-md-4" style="color:white;">Search in Portfolios</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="content"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var viewPortfolios = document.getElementById("viewPortfolios");
        viewPortfolios.addEventListener("click", function(){
            document.getElementById("content").innerHTML = 
        });
    </script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>