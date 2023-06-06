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

    $query = "INSERT INTO signup (userName, email, password, confirmPassword) VALUES ('$userName', '$email', '$password', '$confirmPassword');";

    mysqli_query($con, $query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="fonts.css">
    <script src="https://kit.fontawesome.com/c306671123.js" crossorigin="anonymous"></script>
    <style>
        .flip-arrow {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 24px;
            color: #ffffff;
        }

        .arrow-text {
            color: #ffffff;
            letter-spacing: 2.5px;
        }

        .arrow-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .arrow-text-container {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card mt-5 bg-dark">
                <div class="card-title text-center mt-3">
                    <div class="arrow-container">
                        <img src="image/download.png" alt="a yellow login avatar" width="150px" height="150px">
                        <div class="arrow-text-container">
                            <span id="arrowText" class="arrow-text">Login</span>
                        </div>
                        <i class="fa-solid fa-arrow-right flip-arrow"></i>
                    </div>
                </div>
                <div class="card-body" id="contentContainer">
                    <form id="loginForm" action="" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            </div>
                            <input type="email" name="email" class="form-control py-2" placeholder="Email" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="password" class="form-control py-2" placeholder="Password" required>
                        </div>
                        <button class="btn btn-success" name="loginButton">Login Now</button>
                        <p class="float-right text-white mt-3 py-2"><input type="checkbox">Remember me</p>
                    </form>


                    <form id="signupForm" style="display: none;" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            </div>
                            <input type="text" name="userName" class="form-control py-2" placeholder="username" required>
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
                            <input type="password" name="password" class="form-control py-2" placeholder="password" required>
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
                        <button class="btn btn-success" name="signupButton">Signup Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const flipArrow = document.querySelector('.flip-arrow');
        const loginForm = document.getElementById('loginForm');
        const signupForm = document.getElementById('signupForm');
        const contentContainer = document.getElementById('contentContainer');
        let isLoginFormVisible = true;

        flipArrow.addEventListener('click', function() {
            if (isLoginFormVisible) {
                flipArrow.classList.remove('fa-arrow-right');
                flipArrow.classList.add('fa-arrow-left');
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
                document.getElementById('arrowText').textContent = 'Signup';
                isLoginFormVisible = false;
            } else {
                flipArrow.classList.remove('fa-arrow-left');
                flipArrow.classList.add('fa-arrow-right');
                loginForm.style.display = 'block';
                signupForm.style.display = 'none';
                document.getElementById('arrowText').textContent = 'Login';
                isLoginFormVisible = true;
            }
        });
    </script>
</body>

</html>