<?php
session_start();
if(!$_SESSION['admin'])
{
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Add Student</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">EDIT STUDENT INFORMATION</h2>
                </div>
                <?php
$servername = "sql6.freesqldatabase.com";
$username = "sql6462764";
$password = "gKU6C5MxCY";
$dbname = "sql6462764";
$port="3306"

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,$port);
$id=$_GET['id'];
$sql="SELECT * FROM student_info
WHERE SR_NO = $id ";
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result);
?>
                <div class="card-body">
                    <form  method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Sr No</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="srno" value=<?php echo $row["SR_NO"]; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Student Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="sname" value=<?php echo $row["STUDENT_NAME"]; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date of Birth</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="date" value=<?php echo $row["DOB"]; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Gender</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender" ?>>
                                            <option value=<?php echo $row["GENDER"];?>><?php echo $row["GENDER"];?></option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Others</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Blood Group</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="bg" >
                                            <option value=<?php echo $row["BLOOD_GROUP"]; ?>><?php echo $row["BLOOD_GROUP"]; ?></option>
                                            <option>A+</option>
                                            <option>A-</option>
                                            <option>B+</option>
                                            <option>B-</option>
                                            <option>AB+</option>
                                            <option>AB-</option>
                                            <option>O+</option>
                                            <option>O-</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Category</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="category"value=<?php echo $row["CATEGORY"]; ?> >
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone" value=<?php echo $row["CONTACT_NUMBER"]; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="mailid" value=<?php echo $row["EMAIL_ID"]; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit" name="submit">CONFIRM CHANGES</button>
                        </div>
                        

                        <?php 
                        if(isset($_POST['submit'])) {//Check it is coming from a form
                            $srno = $_POST["srno"]; 
                            $sname = $_POST["sname"];
                            $date = $_POST["date"];
                            $gender = $_POST["gender"];
                            $bg = $_POST["bg"];
                            $category = $_POST["category"];
                            $phone = $_POST["phone"];
                            $mail_id = $_POST["mailid"];
                            $query = "UPDATE student_info   
                            SET STUDENT_NAME='$sname',   
                            DOB='$date',   
                            GENDER='$gender',   
                            CONTACT_NUMBER = '$phone',   
                            CATEGORY = '$category',  
                            BLOOD_GROUP='$bg',
                            EMAIL_ID='$mail_id'
                            WHERE SR_NO='$srno'";
                            if(mysqli_query($conn,$query)) {
                                echo "<script>window.location.href='studentdisplay.php'</script>";
                                echo "New record created successfully";
                              } 
                              else {
                                echo "Error: " . $query . "<br>" . mysqli_error($conn);
                              }
                                        
                        }
                        mysqli_close($conn);
                        ?>
                    </form>
                    <br>
                    <a href="index.php" class="name">Return to Dashboard</a> 
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->