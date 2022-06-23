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
                    <h2 class="title">EDIT ACADEMIC INFORMATION</h2>
                </div>
                <?php
$server='localhost';
$username='root';
$password='';
$dbname = "home";
$conn=mysqli_connect($server,$username,$password,$dbname);
$id=$_GET['id'];
$sql="SELECT * FROM academic_info
WHERE SR_NO = $id ";
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result);
?>
                <div class="card-body">
                    <form action="#" method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Sr No</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" required name="srno" value=<?php echo $row["SR_NO"]; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Mode of Admission</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="mode">
                                            <option value=<?php echo $row["MODE_OF_ADMISSION"];?> ><?php echo $row["MODE_OF_ADMISSION"];?></option>
                                            <option>KCET</option>
                                            <option>Comed-k</option>
                                            <option>Management Quota</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">Student Rank</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="srank" required value=<?php echo $row["STUDENT_RANK"]; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Semester</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="sem" required>
                                            <option value=<?php echo $row["SEMESTER"]; ?>><?php echo $row["SEMESTER"]; ?></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Branch</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="branch" required>
                                            <option value=<?php echo $row["BRANCH"]; ?>><?php echo $row["BRANCH"]; ?></option>
                                            <option value="CV">Civil Engineering</option>  
                                            <option value="ME">Mechanical Engineering</option>  
                                            <option value="IP">Industrial and Production Engineering</option>  
                                            <option value="EEE">Electrical and Electronics Engineering</option>   
                                            <option value="ECE">Electronics and Communication Engineering</option>  
                                            <option value="IT">Instrumentation Technology</option>  
                                            <option value="CSE">Computer Science and Engineering</option>  
                                            <option value="EVE">Environmental Engineering</option>  
                                            <option value="PS">Polymer Science and Technology</option>   
                                            <option value="ISE">Information Science and Engineering</option>  
                                            <option value="BT">Biotechnology</option>  
                                            <option value="CTM">Construction Technology and Management</option>  
                                            <option value="CSBS">Computer Science and Business Systems</option>
                                        </select>
                                        <div class="select-dropdown"></div>
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
                            $mode = $_POST["mode"];
                            $srank = $_POST["srank"];
                            $sem = $_POST["sem"];
                            $branch = $_POST["branch"];
                            $query = "UPDATE academic_info   
                            SET MODE_OF_ADMISSION='$mode',   
                            STUDENT_RANK='$srank',   
                            SEMESTER='$sem',   
                            BRANCH = '$branch'   
                            WHERE SR_NO='$srno'";
                            
                            if($conn->query($query) === TRUE) {
                                echo "<script>window.location.href='academicdisplay.php'</script>";
                                header('location: academicdisplay.php');
                              } else {
                                echo "Error: " . $query . "<br>" . mysqli_error($conn);
                              }
                            
                              mysqli_close($conn);
                                    
                        }
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