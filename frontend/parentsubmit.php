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
	$fname = $_POST["fname"];
	$mname = $_POST["mname"];
    $phone = $_POST["phone"];
    $income = $_POST["income"];

	$query = "INSERT INTO parent_info(SR_NO ,FATHER_NAME,MOTHER_NAME,CONTACT_NO,ANNUAL_INCOME) VALUES ('$srno','$fname','$mname','$phone','$income')";

    
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
        echo "<script>window.location.href='addressinfo.php ? id=$srno'</script>";
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    
      mysqli_close($conn);
            
}
?>