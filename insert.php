

<?php
    //DB info
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "parking";
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
    $carEntry = $_POST["carEntry"];
    $carSpotnum = $_POST["carSpotnum"];
    
    //create sql string
    $sql="INSERT INTO park (carNo, carOwnName, carOwnnum, carEntryTime, parkingSpot) VALUES ('$carNo' ,'$carOwn' ,'$carOwnnum','$carEntry','$carSpotnum')";
    //Send query, check to ensure there are no errors
    if($conn->query($sql) === TRUE){
        echo "<p id='y' style='color:'>New record created successfully</p>";
    }
    else{
        "Error:" . $sql ."<br>" . $conn->error;
    }

    //connection closed
    $conn->close();

?>

<?php
    //DB info
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "parking";
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
    $carEntry = $_POST["carEntry"];
    //$carSpotnum = $_POST["carSpotnum"];
    
    //create sql string
    $sql="INSERT INTO storage (carNo, carOwnName, carOwnnum, carEntryTime) VALUES ('$carNo' ,'$carOwn' ,'$carOwnnum','$carEntry')";
    //Send query, check to ensure there are no errors
    if($conn->query($sql) === TRUE){
        echo "<p>New record created successfully</p>";
    }
    else{
        "Error:" . $sql ."<br>" . $conn->error;
    }

    //connection closed
    $conn->close();

?>
