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
                    <h2 class="title">EDIT ADDRESS INFORMATION</h2>
                </div>
                <?php
$server='localhost';
$username='root';
$password='';
$dbname = "home";
$conn=mysqli_connect($server,$username,$password,$dbname);
$id=$_GET['id'];
$sql="SELECT * FROM address_info
WHERE SR_NO = $id ";
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result);
?>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Sr No</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="srno" value=<?php echo $row["SR_NO"]; ?> required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Door Number</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="dno" value=<?php echo $row["DOOR_NO"]; ?> required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Street</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="street" value=<?php echo $row["STREET"]; ?> required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">City</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="city" value=<?php echo $row["CITY"]; ?> required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">State</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="state" value=<?php echo $row["STATE_"]; ?> required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Pin Code</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="pincode" value=<?php echo $row["PIN_CODE"]; ?> required>
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
                            $dno = $_POST["dno"];
                            $street = $_POST["street"];
                            $city = $_POST["city"];
                            $state = $_POST["state"];
                            $pincode = $_POST["pincode"];
                            
                            $query = "UPDATE address_info   
                            SET DOOR_NO='$dno',   
                            STREET='$street',      
                            CITY = '$city',   
                            STATE_ = '$state',
                            PIN_CODE = '$pincode'
                            WHERE SR_NO='$srno'";
                            
                            if($conn->query($query) === TRUE) {
                                echo "New record created successfully";
                                echo "<script>window.location.href='addressdisplay.php'</script>";
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