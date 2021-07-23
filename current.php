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
                <a class="navbar-brand" href="#">DBMS Project</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-item nav-link" href="home.php">Home </a>
                    <a class="nav-item nav-link" href="all.php">All</a>
                    <a class="nav-item nav-link active" href="#">Current<span class="sr-only">(current)</span></a>
                    </div>
                </div>
                <div class="nav navbar-nav navbar-right">
                <a class="nav-item nav-link" href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
                </div>
            </nav>

            <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Car Number</th>
                    <th>Car Owner</th>
                    <th>Car Owner Number</th>
                    <th>Car Entry Time</th>
                    <th>Car Entry Date</th>
                    <th>Parking Spot</th>
                    <th>Checked Out</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //DB info
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname= "parkingdb";
                //connect and check db connection
                $conn = new mysqli($servername,$username,$password,$dbname);
                if($conn->connect_error){
                    die("Connection Failed:" . $conn->connect_error);
                }

                $sql ="SELECT carNo,carOwnName,carOwnNum,carEntryTime,carEntryDate,carExitTime,parkingSpot,checkedOut FROM vehicle  JOIN timeTrack ON vehicle.carNo= timeTrack.carNoTT JOIN parkSpace ON parkSpace.carNoPS=timeTrack.carNoTT";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                            <td>" .$row['carNo']."</td>
                            <td>".$row['carOwnName']."</td>
                            <td>".$row['carOwnNum']."</td>
                            <td>".$row['carEntryTime']."</td>
                            <td>".$row['carEntryDate']."</td>
                            <td>".$row['parkingSpot']."</td>";
                            if($row['checkedOut']==1){
                               echo "<td>".$row['carExitTime']."</td></tr>";
                            }
                            else{
                            echo "<td><a href=check-out.php?carNo=".$row['carNo'].">Check out</td>
                        </tr>";
                    }
                }
            }
            ?>
            </tbody>
    
    </div>
    
        <!--Bootstrap Jquery-->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <!--Bootstrap Javascript-->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>    