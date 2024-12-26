<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>update</title>
</head>
<body>
    <?php
    require("connection.php");
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $select = "SELECT * FROM `pro` WHERE `ID` = '$id'";
        $result = mysqli_query($connect,$select);
        $data = mysqli_fetch_assoc($result);
    }
    ?>
<div class="container">
    <div class="row">
        <div class="col">
        <div class="alert alert-primary">
                    <h1 class="text-center">Update</h1>
                </div>
            <form action="update.php" method="post" onsubmit="return sms()">
           
                <input type="hidden" class="form-control" name="id" value="<?php echo $data['ID']; ?>">
                <label for="">Name </label>
                <input type="text" name="name" class="form-control" value="<?php echo $data['Name']; ?>">
                <label for="">Email</label>
                <br>
                <input type="email" name="email" class="form-control" value="<?php echo $data['Email']; ?>">
                <label for="">Password</label>
                <br>
                <input type="password" name="pswd" id="pass" class="form-control" value="<?php echo $data['Password']; ?>">
                <i class="bi bi-eye"></i>
                <span id="ms1" class="text-danger"></span>
                <br>
                <input type="submit" class="btn btn-outline-primary mt-3" name="btn">
            </form>
        </div>
    </div>
    <?php 
if(isset($_POST["btn"])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pswd'];
    $update = "UPDATE `pro` SET `Name`='$name',`Email`='$email',`Password`='$pass' WHERE `ID` = '$id'";
    mysqli_query($connect,$update);
    header("location: read.php");
    exit();

}
?>
 <script>
    function sms() {
        let pass = document.getElementById('pass').value;
        
        if (pass.length < 5) {
            document.getElementById('ms1').innerHTML = "Password must be at least 5 characters ";
            return false;  
        }else if(!Number(pass)){
            document.getElementById('ms1').innerHTML = "Password must contain only number";
            return false;  
        } 
        
        else {
            document.getElementById('ms1').innerHTML = "";  
            return true;  
        }
    }
</script>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>