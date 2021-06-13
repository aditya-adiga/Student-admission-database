<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'student_admission_admin_login');
   $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
   }
if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($uname != "" && $password != ""){
        $sql_query = "select count(*) as cntUser from users where email_id='".$uname."' and passcode='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count == 1){
            $_SESSION['uname'] = $uname;
            header('Location: index.php');
        }else{
            echo "Invalid username and password";
        }

    }

?>
