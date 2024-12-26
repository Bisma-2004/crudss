<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>form</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <form action="create.php" method="post" onsubmit="return pass()">
                <h1>CRUD</h1>
                <div class="input-box">
                    <label for="">Name</label>
                    <input type="text" id="name" name="name" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <label for="">Email</label>
                    <input type="email" id="email" name="email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <label for="">Password</label>
                    <input type="password" id="pswd" name="pswd">
                    <i class='bx bxs-show' id="toggle"></i>
                    <span id="sms1"></span>
                </div>

            

                <input type="submit" class="btn" name="btn">
                <a href="#" class="btn-view">View Record</a>
              
                <?php if (isset($_GET["Error"])) { ?>
                    <div class="alert  alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> <?php echo $_GET["Error"]; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

            </form>
        </div>
    </div>

    <script>
        function pass() {
            let pswd = document.getElementById('pswd').value;

            if (pswd.length < 5) {
                document.getElementById('sms1').innerHTML = "Password must contain at least 5 characters";
                return false;
            }

            if (!Number(pswd)) {
                document.getElementById('sms1').innerHTML = "Password must have only numbers";
                return false;
            } else {
                document.getElementById('sms1').innerHTML = "";
                return true;
            }
        }

        let togglepass = document.getElementById('toggle');

        togglepass.addEventListener('click', function () {
            let pswd = document.getElementById('pswd');
            if (pswd.type === "password") {
                pswd.type = "text";
                togglepass.innerHTML = "<i class='bx bxs-hide'></i>";
            } else {
                pswd.type = "password";
                togglepass.innerHTML = "<i class='bx bxs-show'></i>";
            }
        });
    </script>

    <?php
        require("connection.php");
        if (isset($_POST['btn'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pswd'];

            $modify = "SELECT * FROM `final` WHERE `Email` = '$email'";
            $result = mysqli_query($connect, $modify);

            if (mysqli_num_rows($result) > 0) {
                header('location: create.php?Error=Email already register');
                exit();
            } else {
                $insert = "INSERT INTO `final`(`Name`, `Email`, `Password`) VALUES ('$name','$email','$pass')";
                mysqli_query($connect, $insert);
                exit();
            }
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
