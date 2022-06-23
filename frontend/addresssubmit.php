<?php
$servername = "sql6.freesqldatabase.com";
$username = "sql6462764";
$password = "gKU6C5MxCY";
$dbname = "sql6462764";
$port="3306"

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,$port);
if(isset($_POST['submit'])) {//Check it is coming from a form
	$srno = $_POST["srno"]; 
	$dno = $_POST["dno"];
	$street = $_POST["street"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pincode = $_POST["pincode"];
   
	$query = "INSERT INTO address_info(SR_NO ,DOOR_NO,STREET,CITY,STATE_,PIN_CODE) VALUES ('$srno','$dno','$street','$city','$state','$pincode')";

    
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
        header('location: index.php');
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    
      mysqli_close($conn);
            
}
?>