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
                    <a class="nav-item nav-link active" href="#">Current<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="home.php">All</a>
                    </div>
                </div>
                <div class="nav navbar-nav navbar-right">
                <a class="nav-item nav-link" href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
                </div>
            </nav>

            <div class="container">
        <table class="table">
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
                    $carNo=$_GET['carNo'];
                    $sql="SELECT carNo,carOwnName,carOwnNum,carEntryTime,carEntryDate,carExitTime,parkingSpot FROM vehicle  JOIN timeTrack ON vehicle.carNo= timeTrack.carNoTT JOIN parkSpace ON parkSpace.carNoPS=timeTrack.carNoTT WHERE carNo='$carNo'";
                    $result = $conn->query($sql);
                    /*                $try=$result->fetch_assoc();
                                    if($try['carOwnName']='XYZ'){
                                        echo $try['carOwnName'];
                                    }*/
                                    if($result->num_rows>0){
                                        while($row = $result->fetch_assoc()){
                                            echo "
                                            <tr>
                                                <th>Car Number:</th>
                                                <td>" .$row['carNo']."</td>
                                            </tr>
                                            <tr>
                                                <th>Car Owner:</th>
                                                <td>".$row['carOwnName']."</td>
                                            </tr>
                                            <tr>
                                                <th>Car Owner Number:</th>
                                                <td>".$row['carOwnNum']."</td>
                                            </tr>
                                            <tr>
                                                <th>Car Entry Time:</th>
                                                <td id='carEnt'>".$row['carEntryTime']."</td>
                                            </tr>
                                            <tr>
                                                <th>Car Entry Date:</th>
                                                <td>".$row['carEntryDate']."</td>
                                            </tr>
                                            <tr>
                                                <th>Parking Spot:</th>
                                                <td>".$row['parkingSpot']."</td>
                                            </tr>";
                                        }
                                    }
                                    if(isset($_POST['checkout'])){
                                        $carExitTime =$_POST['carExitTime'];
                                        $fee =$_POST['fee'];
                                        $sql ="UPDATE timeTrack SET carExitTime='$carExitTime' WHERE carNoTT='$carNo';";
                                        $sql .="UPDATE parkSpace SET checkedOut=1 WHERE carNoPS='$carNo';";
                                        $sql .="UPDATE charge SET fee='$fee' WHERE carNoC='$carNo';";
                                        $result = $conn->multi_query($sql);
                                        
                                        if($conn->multi_query($sql) === TRUE){
                                            echo "<p id='y' style='color:'>Car checked out</p> <a href='home.php'>Add new car</a> <a href='new.php'>Check Car-log</a>";
                                        }
                                        else{
                                            "Error:" . $sql ."<br>" . $conn->error;
                                        }
                                    }
                                    ?>

                                    </tbody>
                                    </div>
                            
                            <div class="container" style="margin-top: 20px;">
                            <form method="POST">
                            <div class="row mb-1">
                                <label for="carExitTime" class="col-sm-2 col-form-label"><b>Car Exit Time:</b></label>
                                <div class="col-sm-2"style="margin-left: 482px;">
                                    <input class="form-control" id="carExitTime" name="carExitTime" value="" >
                                    <script>
                                    var current= new Date;
                                    var currenttime = current.getHours() + ":" + current.getMinutes() + ":" + current.getSeconds();
                                    document.getElementById("carExitTime").setAttribute("value",currenttime);

                                </script>
                                </div>
                                
                                <button class="btn btn-success" name="checkout" value="checkout" type="submit" style="margin-bottom: 20px;">Check Out</button>
                            
                                <label for="carExitTime" class="col-sm-2 col-form-label"><b>Parking Fee:</b></label>
                                <div class="col-sm-2"style="margin-left: 482px;">
                                    <input class="form-control" id="fee" name="fee" value="20" >
                                </div>
                                </form>
                                <script src="js/checkout.js"></script>
                            <button class="btn btn-success" onclick="genrateFee()">Genrate Fee</button>
                                </div>
                                </div>
                                

                            
                                
                                
                        