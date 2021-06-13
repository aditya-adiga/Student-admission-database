<?php
include_once 'db.php';

if(isset($_POST['submit']))
{    
     $srno = $_POST['srno'];
     $sname = $_POST['sname'];
     $dob = $_POST['dob'];
     $gender = $_POST['gender'];
     $blood_group = $_POST['blood_group'];
     $category = $_POST['category'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $moa = $_POST['moa'];
     $rank = $_POST['rank'];
     $sem = $_POST['sem'];
     $branch = $_POST['branch'];
     $Transaction_no = $_POST['Transaction_no'];
     $Pdate = $_POST['Pdate'];
     $amount = $_POST['amount'];
     $f_name = $_POST['f_name'];
     $m_name = $_POST['m_name'];
     $phone = $_POST['phone'];
     $income = $_POST['income'];
     $door = $_POST['door'];
     $street = $_POST['street'];
     $city = $_POST['city'];
     $state = $_POST['state'];
     $pincode = $_POST['pincode'];
     $sql1 = "INSERT INTO student_info (SR_NO,STUDENT_NAME,DOB,GENDER,BLOOD_GROUP,CATEGORY,CONTACT_NUMBER,EMAIL_ID)
     VALUES ('$srno','$sname','$dob','$gender','$blood_group',' $category','$phone','$email')";
     $sql2 = "INSERT INTO academic_info (SR_NO,MODE_OF_ADMISSION,STUDENT_RANK ,SEMESTER ,BRANCH)
     VALUES ('$srno','$moa','$rank','$sem','$branch')";
     $sql3 = "INSERT INTO payment_info (SR_NO,TRANSACTION_NO,PAID_DATE ,FEE_PAID)
     VALUES ('$srno','$Transaction_no','$Pdate','$amount')";
     $sql4 = "INSERT INTO parent_info (SR_NO,FATHER_NAME ,MOTHER_NAME ,CONTACT_NO ,ANNUAL_INCOME)
      VALUES ('$srno','$f_name','$m_name','$phone','$income')";
     $sql5 = "INSERT INTO parent_info (SR_NO,DOOR_NO ,STREET  , CITY ,STATE,PIN_CODE  )
     VALUES ('$door','$street','$city','$state','$pincode')";
     
    
     if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5)){
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>