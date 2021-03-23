<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Parking Base</title>
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!--Custom CSS-->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">DBMS Project</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    
                    <a class="nav-item nav-link" href="new.php">Parking</a>
                    </div>
                </div>
                <div class="nav navbar-nav navbar-right">
                <a class="nav-item nav-link" href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
                </div>
            </nav>

            <div class="container">
                <form action="insert.php" method="POST">
                    <div class="form-group">
                        <label for="carNo">Car No.</label>
                        <input class="form-control" id="carNo" name="carNo" type="value">
                    </div>
                    <div class="form-group">
                        <label for="carOwn">Car Owner Name</label>
                        <input class="form-control" id="carOwn" name="carOwn" type="value">
                    </div>
                    <div class="form-group">
                        <label for="carOwnnum">Car Owner Number</label>
                        <input class="form-control" id="carOwnnum" name="carOwnnum" type="value">
                    </div>
                    <div class="form-group">
                        <label for="carEntry">Car Entry Time</label>
                        <input class="form-control" id="carEntry" name="carEntry" value="">
                        <script>
                                var d= new Date();
                                document.getElementById("carEntry").setAttribute("value", d);
                            
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="carSpotnum">Parking Spot</label>
                        <input class="form-control" id="carSpotnum" name="carSpotnum" type="value">
                    </div>
                    <button class="btn btn-success" type="submit">Admit</button>
                </form>
            </div>

    
        <!--Bootstrap Jquery-->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <!--Bootstrap Javascript-->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>    