<!DOCTYPE html>
<html>
<head>
    <title>Generate OTP</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
<h1>update</h1>
<?php
$mobile = $_GET["mobile"];
$email = $_GET["email"];
$x=0;
$conn = mysqli_connect("127.0.0.1","root",null,"vss_mydb");
if($conn == null){
    echo "Database Not Connected";
}
$s = "select * from users";
$result = mysqli_query($conn,$s);
while ($row = mysqli_fetch_array($result)){
    if($mobile == $row[2] && $email == $row[0]){
        $x=1;
        break;
    }
}
$randomNum ="";
if($x == 1){

    for($i=0;$i<6;$i++){
        $randomNum=$randomNum.rand(1,9);
    }


    $exptime = time()+180;
    $up = "update users set otp=".$randomNum." , expiryTime=".$exptime." where mobile='".$mobile."'";
    //echo $up;
    mysqli_query($conn,$up);
    //echo "db updated";
    //send SMS with OTP
    $smsForm="";
    $smsForm=$smsForm.'<form action="sendsms.php" method="post">
        
    <table>
       
        <tr>
            <th>Your Mobile No :</th>
            <td><input type="number" readonly name="num" value='.$mobile.'></td>
        </tr>
        <tr>
           
            <td>
            <input type="hidden" name="msg" value='.$randomNum.'>
               
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <input type="submit" value="Send OTP">
            </th>
        </tr>
    </table>
</form>';
    echo $smsForm;



}else{
    echo "mobile and email not matched";
}

?>
</div>
</body>
</html>