<?php
$server='localhost';
$username='root';
$password='';
$dbname = "home";
$conn=mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit'])) {//Check it is coming from a form
	$srno = $_POST["srno"]; 
	$mode = $_POST["mod"];
	$srank = $_POST["srank"];
    $sem = $_POST["sem"];
    $branch = $_POST["branch"];
    
	$query = "INSERT INTO academic_info(SR_NO ,MODE_OF_ADMISSION,STUDENT_RANK,SEMESTER,BRANCH) VALUES ('$srno','$mode','$srank','$sem','$branch')";

    
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
        header('location: paymentinfo.php');
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    
      mysqli_close($conn);
            
}
?>