<?php
$newPassword = $_GET["newPass"];
$old = $_GET["old"];
$confirm = $_GET["confirm"];
$mob = $_GET["mobile"];
$random = $_GET["random"];
$x=0;
$conn = mysqli_connect("127.0.0.1","root",null,"vss_mydb");
$q = "select * from users";
$result= mysqli_query($conn,$q);
$valid="";
echo "mobile = ".$mob. "random = ".$random."time = ".time();
while($row=mysqli_fetch_array($result)){

    if($row[2] == $mob && $row[3] == $random && $row[4] >= time()){
        $valid =1;
        break;

    }
}
echo "flag" . $valid;

if($valid == 1) {
        $s = "update users set password='".$newPassword."' where mobile='".$mob."'";
        $result= mysqli_query($conn,$s);
        echo "New Password has been Generated";
    }
    else{
        echo "OTP Expire/incorrect";
    }








?>

