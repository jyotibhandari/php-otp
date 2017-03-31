<!DOCTYPE html>
<html>
<head>
    <title>New Password</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script>
        function save(){
            var old=document.getElementById('oldPass').value;
            var newPass = document.getElementById('newPass').value;
            var confirm = document.getElementById('confirmPass').value;
            var mobile = document.getElementById('mobile').value;
            var random = document.getElementById('random').value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("res").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "savePassword.php?old="+old+"&newPass="+newPass+"&confirm="+confirm+"&mobile="+mobile+"&random="+random, true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
<div class="container">
        <input type="hidden" id="mobile" value="<?php echo $_REQUEST['mobile']; ?>">
        <input type="hidden" id="random" value="<?php echo $_REQUEST['random']; ?>">
    
        <div class="form-group">
            Enter Old Password
            <input type="password" required id="oldPass" class="form-control">
        </div>
        <div class="form-group">
            Enter New Password
            <input type="password" required id="newPass" class="form-control">
        </div>
        <div class="form-group">
            Enter Confirm Password
            <input type="password" required id="confirmPass" class="form-control">
        </div>
        <div class="form-group">
            <input type="button" onclick="save()" value="save Password">
        </div>
    <div id="res"></div>
</div>
</body>
</html>