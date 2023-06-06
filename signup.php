<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tracking-web";

// Create connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if (isset($_POST['confirmPassword'])) {
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];



    $query = "INSERT INTO signup ( userName,email,password,confirmPassword) VALUES ( '$userName','$email',' $password',' $confirmPassword');";

    mysqli_query($con, $query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create an account</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="fonts.css">
    <script src="https://kit.fontawesome.com/c306671123.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card mt-5 bg-dark">
                <div class="card-title text-center mt-3">
                    <img src="image/download.png" alt="a yellow login avatar" width="150px" height="150px">
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            </div>
                            <input type="text" name="userName" class="form-control py-2" placeholder="username" reguired="">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" name="email" class="form-control py-2" placeholder="user@123.com">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="password" class="form-control py-2" placeholder="Enter your passord">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="confirmPassword" class="form-control py-2" placeholder="confirm your password">
                        </div>
                        <p class="float-right text-white mt-3 py-2"><input type="checkbox">Accept the terms and conditions</p>
                        <button class="btn btn-success">submit</button>
                    </form>
                   
                    <div class="text-center mt-3" id="flipText">
    <p class="text-white">Already have an account? <a href="#" id="signupLink">Login</a></p>
</div>

                </div>
            </div>
        </div>
    </div>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    
</body>

</html>