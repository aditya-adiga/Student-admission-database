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
	$mode = $_POST["mod"];
	$srank = $_POST["srank"];
    $sem = $_POST["sem"];
    $branch = $_POST["branch"];
    
	$query = "INSERT INTO academic_info(SR_NO ,MODE_OF_ADMISSION,STUDENT_RANK,SEMESTER,BRANCH) VALUES ('$srno','$mode','$srank','$sem','$branch')";

    
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
        echo "<script>window.location.href='paymentinfo.php ? id=$srno'</script>";
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    
      mysqli_close($conn);
            
}
?>