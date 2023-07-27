<?php
session_start(); // Add session_start() at the beginning to start the session

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tracking-web";

// Create connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['loginButton'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM signup WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['loggedIn'] = true;
        header("Location: page.php"); // Redirect to the page.html page
        exit();
    } else {
        // Login failed, handle error or display a message
        echo "Invalid email or password.";
    }
}

if (isset($_POST['signupButton'])) { // Update the condition to check if the signup form is submitted
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $query = "INSERT INTO signup (userName, email, password, confirmPassword) VALUES ('$userName', '$email', '$password', '$confirmPassword');";

    if (mysqli_query($con, $query)) {
        // Signup successful, handle success or display a message
        header("Location: login.php"); // Redirect to login page after successful signup
        exit();
    } else {
        // Signup failed, handle error or display a message
        echo "Error: " . mysqli_error($con);
    }
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
       

        .login-avatar {
            width: 100px;
            height: 100px;
            margin: 0 auto;
            display: block;
            border-radius: 50%;
            background-color: #353b40;
            text-align: center;
            line-height: 100px;
            font-size: 36px;
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
            margin: 20px 0;
        }

        .login-header h1 {
            font-size: 24px;
            color: #ffffff;
        }

        .btn-toggle {
            display: flex;
            justify-content: center;
        }

        .btn-toggle .btn {
            flex: 1;
            border-radius: 0;
            padding: 10px 20px;
            font-size: 18px;
        }

        .login-form {
            display: none;
        }

        .login-form.active {
            display: block;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            color: #ffffff;
        }

        .form-control {
            height: 40px;
        }

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
    <div class="col-lg-5 m-auto" style="width: 500px; height: 400px;">
            <div class="card mt-5 bg-dark">
                <div class="card-title text-center mt-3">
                    <div class="row">
                 
        <div class="login-avatar">
            <i class="fa-solid fa-user"></i>
        </div>
           
                <div class="arrow-text-container">
                    <span class="arrow-text">
                    <h4>Login</h4> 
                    </span>
                  
                        <i class="fa-solid fa-arrow-right flip-arrow"></i>
                        </div>
                        </div>
                    <div class="arrow-container">
                       
                    </div>
                </div>
                <div class="card-body" id="contentContainer">
                    <form id="loginForm" action="" method="POST">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user my-2" style="height: 10px; "></i>
                                </span>
                            </div>
                            <input type="email" name="email" class="form-control py-2 " placeholder="Email" required>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock my-2" style="height: 10px; "></></i>
                                </span>
                            </div>
                            <input type="password" name="password" class="form-control py-2" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="loginButton">Login Now</button>
                        <p class="float-right text-white mt-3 py-2"><input type="checkbox">Remember me</p>
                    </form>


                    <form id="signupForm" style="display: none;" method="POST">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user my-2" style="height: 10px;"></i>
                                </span>
                            </div>
                            <input type="text" name="userName" class="form-control py-2" placeholder="username" required>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-envelope my-2" style="height: 10px; "></i>
                                </span>
                            </div>
                            <input type="email" name="email" class="form-control py-2" placeholder="user@123.com">
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock my-2" style="height: 10px; "></i>
                                </span>
                            </div>
                            <input type="password" name="password" class="form-control py-2" placeholder="password" required>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock my-2" style="height: 10px; "></i>
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
                flipArrow.classList.toggle('fa-arrow-right');
                flipArrow.classList.toggle('fa-arrow-left');
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
                document.getElementById('arrowText').textContent = 'Signup';
                isLoginFormVisible = false;
            } else {
                flipArrow.classList.toggle('fa-arrow-left');
                flipArrow.classList.toggle('fa-arrow-right');
                loginForm.style.display = 'block';
                signupForm.style.display = 'none';
                document.getElementById('arrowText').textContent = 'Login';
                isLoginFormVisible = true;
            }
        });
    </script>
</body>

</html>