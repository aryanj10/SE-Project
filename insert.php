

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
    //create variable for each info to be added into database
    //if(isset($_POST['carNo']) &&isset( $_POST['carOwn']) &&isset( $_POST['carOwnnum']) && isset( $_POST['carEntry']) && isset( $_POST['carSpotnum'])) {
    $carNo = $_POST["carNo"];
    $carOwn = $_POST["carOwn"];
    $carOwnnum = $_POST["carOwnnum"];
    $carEntryTime = $_POST["carEntryTime"];
    $carEntryDate = $_POST["carEntryDate"];
    $parkingSpot = $_POST["parkingSpot"];
    
    //create sql string

    $sql="INSERT INTO vehicle (carNo, carOwnName, carOwnnum) VALUES ('$carNo' ,'$carOwn' ,'$carOwnnum');";
    $sql .="INSERT INTO parkSpace(parkingSpot, checkedOut,carNoPS) VALUES ('$parkingSpot','0','$carNo');";
    $sql .="INSERT INTO timeTrack(carNoTT, carEntryDate, carEntryTime) VALUES ('$carNo','$carEntryDate','$carEntryTime');";
    $sql .="INSERT INTO charge(carNoC) VALUES ('$carNo');";
    //Send query, check to ensure there are no errors
    if($conn->multi_query($sql) === TRUE){
        echo "<p id='y' style='color:'>Car admitted successfully</p> <a href='home.php'>Add new car</a> <a href='current.php'>Check Car-log</a>";
    }
    else{
        "Error:" . $sql ."<br>" . $conn->error;
    }

    //connection closed
    $conn->close();
  
    //SELECT carNo,carOwnName,carOwnNum,carEntryTime,carEntryDate,carExitTime,parkingSpot,checkedOut FROM vehicle  JOIN timeTrack ON vehicle.carNo= timeTrack.carNo JOIN parkSpace ON parkSpace.carNo=timeTrack.carNo

?>


