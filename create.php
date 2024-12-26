<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Title</title>
</head>
<body>

  
        <div class="container-fluid ">
            <form action="create.php" method="post" class="m-3" onsubmit="return sms()">
                <div class="alert alert-primary">
                    <h1 class="text-center">CRUD</h1>
                </div>
       
                <label for="">Name </label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="User Name">
                <br>
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="abc@gmail.com">
                <br>
                <label for="">Password</label>
                <div class="mb-3 input-group">
                <!-- Password input with embedded eye icon -->
                <input type="password" class="form-control" id="pass" name="pswd" required>
                <span class="btn btn-outline-secondary" id="togglePass">
                <i class="fa-solid fa-eye"></i>
                </span>
            </div>
                <span id="ms1" class="text-danger mb-2"></span>
                <!-- alert -->
                <?php if (isset($_GET["Error"])) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> <?php echo $_GET["Error"]; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
        <!-- button -->
         <br>
                <input type="submit" class="btn btn-outline-primary mt-3" name="btn">
                <a href="read.php" class="btn btn-outline-dark mt-3">View Record</a>
            </form>
     
        </div>
    <?php
    require("connection.php");
    if(isset($_POST['btn'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['pswd'];

        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['pswd'])){
            header('location: create.php');
            exit();
        }
        else{
            $duplicate = "SELECT * FROM `pro` WHERE `Email` = '$email'";
            $result = mysqli_query($connect,$duplicate);

            if(mysqli_num_rows($result) > 0){
                header("location: create.php?Error = 'Email Already Registerd.'");
                exit();

            }else{
                $insert = "INSERT INTO `pro`(`Name`, `Email`, `Password`) VALUES ('$name','$email','$password')";
                mysqli_query($connect,$insert);
                exit();
            }
        }

    }
    ?>
 <script>
    function sms() {
        let pass = document.getElementById('pass').value;
        let togglePass = document.getElementById('togglePass');
       
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

    togglePass.addEventListener('click', function() {
    if (pass.type === 'password') {
        pass.type = 'text'; 
        togglePass.innerHTML = '<i class="fa-solid fa-eye-slash"></i>'; 
    } else {
        pass.type = 'password'; 
        togglePass.innerHTML = '<i class="fa-solid fa-eye"></i>'; 
    }
});



</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>