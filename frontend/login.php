<?php
if($_POST)
{
    $servername = "sql6.freesqldatabase.com";
    $username = "sql6462764";
    $password = "gKU6C5MxCY";
    $dbname = "sql6462764";
    $port="3306"

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname,$port);
      $username=$_POST['username'];
      $password=$_POST['password'];
        $query="SELECT * from  login_detail where email_id='$username' and passcode='$password'";
    $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1)
        {
            session_start();
            $_SESSION['admin']='true';
            header('location:index.php');
        }
        else{
            echo 'wrong username or password';
        }



}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Student Admission System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
  
                            <div class="col-lg-6 d-none d-lg-block">
                            <br><br><br><br><br><br>
                              <h2 align="center">Online </h2>
                              <h2 align="center">Student  Admission </h2>
                              <h2 align="center">Management  System</h2>
                                                         
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                   <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <br><br>
                                    <form method = "POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="username" name='username' aria-describedby="emailHelp"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name='password' placeholder="Password">
                                        </div>
                                        <br><br>
                                        <input type = "submit" value = " Submit " id='submit' name ='submit' class="btn btn-primary btn-user btn-block"/><br />
                                        
                                            
                                        
                                        <hr>
                                        
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>