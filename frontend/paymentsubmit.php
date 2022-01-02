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
	$tno = $_POST["tno"];
	$date = $_POST["date"];
  $amount = $_POST["amount"];
   
	$query = "INSERT INTO payment_info(SR_NO ,TRANSACTION_NO,PAID_DATE,FEE_PAID) VALUES ('$srno','$tno','$date','$amount')";

    
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
        echo "<script>window.location.href='parentinfo.php ? id=$srno'</script>";
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    
      mysqli_close($conn);
            
}
?>