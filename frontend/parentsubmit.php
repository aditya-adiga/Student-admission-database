<?php
$server='localhost';
$username='root';
$password='';
$dbname = "home";
$conn=mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit'])) {//Check it is coming from a form
	$srno = $_POST["srno"]; 
	$fname = $_POST["fname"];
	$mname = $_POST["mname"];
    $phone = $_POST["phone"];
    $income = $_POST["income"];

	$query = "INSERT INTO parent_info(SR_NO ,FATHER_NAME,MOTHER_NAME,CONTACT_NO,ANNUAL_INCOME) VALUES ('$srno','$fname','$mname','$phone','$income')";

    
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
        header('location: addressinfo.php');
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    
      mysqli_close($conn);
            
}
?>