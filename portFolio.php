<html>
<head><title><?php echo $_GET['id1']; ?></title></head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<body>
    <div>
        <div class="row">
            <div class="col-md-2" style="background-color: blue; height:100%;">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <br><br>
                        <div id="NewsFeed"><a href="/newsFeed.php" style="color:white">NewsFeed</a></div>
                        <div id="portfolio"><a href="/portFolio.php" style="color:white">portFolio</a></div>
                        <div id="freelancing"></div>
                        <div id="collaboration"></div>
                        <div id="Notesharing"></div>
                        <div id="College-board"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
            <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <div id="userOptions"><?php echo $_GET['id1']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="addFolio"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12"></div>
                </div>
            </div>
        </div>
    </div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>