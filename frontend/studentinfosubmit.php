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
	$sname = $_POST["sname"];
	$date = $_POST["date"];
    $gender = $_POST["gender"];
    $bg = $_POST["bg"];
    $category = $_POST["category"];
    $phone = $_POST["phone"];
    $mail_id = $_POST["mailid"];
	$query = "INSERT INTO student_info(SR_NO ,STUDENT_NAME,DOB,GENDER,CONTACT_NUMBER,CATEGORY,BLOOD_GROUP,EMAIL_ID) VALUES ('$srno','$sname','$date','$gender','$phone','$category','$bg','$mail_id')";

    
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
        echo "<script>window.location.href='academicinfo.php ? id=$srno'</script>";
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    
      mysqli_close($conn);
            
}
?>