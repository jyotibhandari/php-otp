<!DOCTYPE html>
    <html>
<head>
<title>Change Password</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
<script>
    function generate(){
        var a=document.getElementById('email').value;
        var b = document.getElementById('mobile').value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("res").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "GenerateOTP.php?email="+a+"&mobile="+b, true);
        xmlhttp.send();
    }

</script>
</head>
<body>
<div class="container">
        <div class="form-group">
            Enter Email:
            <input type="email"  id="email" class="form-control">
        </div>
        <div class="form-group">
            Enter phone no
            <input type="text"  id="mobile" class="form-control">
        </div>
        <div class="form-group">
            <input type="button" onclick="generate()" value="Generate OTP">
        </div>
<div id="res"></div>
</div>
</body>
</html>