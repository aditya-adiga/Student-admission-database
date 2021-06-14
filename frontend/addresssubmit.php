<?php
$server='localhost';
$username='root';
$password='';
$dbname = "home";
$conn=mysqli_connect($server,$username,$password,$dbname);

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