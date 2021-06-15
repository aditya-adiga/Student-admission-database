<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "home";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
die("Connection failed: " . $link->connect_error);
}
$id=$_GET['id'];
$sql1="DELETE FROM academic_info
WHERE SR_NO = $id ";
$sql2="DELETE FROM payment_info
WHERE SR_NO = $id ";
$sql3="DELETE FROM parent_info
WHERE SR_NO = $id ";
$sql4="DELETE FROM address_info
WHERE SR_NO = $id ";
$sql5="DELETE FROM student_info
WHERE SR_NO = $id ";
if(mysqli_query($link,$sql1))
{
    
    echo "academic info deleted";
}
else{

    echo "unsuccessful";
}
if(mysqli_query($link,$sql2))
{
    
    echo "payment info deleted";
}
else{

    echo "unsuccessful";
}
if(mysqli_query($link,$sql3))
{
    
    echo "parent info deleted";
}
else{

    echo "unsuccessful";
}
if(mysqli_query($link,$sql4))
{
    
    echo "address info deleted";
}
else{

    echo "unsuccessful";
}
if(mysqli_query($link,$sql5))
{
    
    header('location:search.php');
}
else{

    echo "unsuccessful";
}
?>