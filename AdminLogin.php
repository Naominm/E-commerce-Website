<?php
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tracking-web";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['loginButton'])) {
    $admin_id = $_POST['admin_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT * FROM admin WHERE admin_id = ? AND username = ? AND password = ?");
    $stmt->bind_param("iss", $admin_id, $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $client = $result->fetch_assoc();
        if ($client['admin'] == 1) {
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = true;
            $_SESSION['isAdmin'] = true;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = true;
            header("Location: html.php");
            exit();
        }
    } else {
        // Invalid credentials, redirect to error page
        header("Location: error.php");
        exit();
    }

    $stmt->close();
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
    
    <style>
        body {
            background-color: #f0f2f5;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #353b48;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            opacity: 12;
            color: #ffffff;
        }

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

        .btn-submit {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            border-radius: 5px;
          background-color: green;
            color: #ffffff;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 2);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #fbcf04;
        }

        .form-check {
            margin-bottom: 20px;
        }

        .form-check input {
            margin-right: 10px;
        }
        .preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
  }
  
  /* Style for the preloader image */
  .preloader img {
    animation: animation__wobble 1s infinite;
    border-radius: 50%;
  }
  /* Animation keyframes */
@keyframes animation__wobble {
    0% { transform: translateX(0%); }
    15% { transform: translateX(-25%) rotate(-5deg); }
    30% { transform: translateX(20%) rotate(3deg); }
    45% { transform: translateX(-15%) rotate(-3deg); }
    60% { transform: translateX(10%) rotate(2deg); }
    75% { transform: translateX(-5%) rotate(-1deg); }
    100% { transform: translateX(0%); }
  }
    </style>
</head>
<body style="visibility: hidden;">
    <!-- Your preloader HTML -->
    <!-- <div class="preloader">Loading...</div> -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="Korina Claudia.png" alt="logo" height="260" width="260" style="border-radius: 50%" ;>
    </div>
    <div class="content-container">
    <div class="body-overlay"></div>

        <!-- loader END -->
        <div class="wrapper">
    <div class="login-container">
        <div class="login-avatar">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="login-header">
            <h1>Login</h1>
        </div>
        <form class="login-form login active" id="loginForm" action="" method="POST">
            <div class="form-group">
                <label for="admin_id">Client ID</label>
                <input type="number" name="admin_id" class="form-control" id="admin_id" min="1" max="10" placeholder="Enter your Client ID" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-icon btn-increment">

                    </button>
                </div>
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="username" required>
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
                </div>
                <button type="submit" class="btn btn-submit" name="loginButton">Login Now</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
            showPreloader();

            // Set the timeout for 1 second (1000 milliseconds)
            setTimeout(function() {
                hidePreloader();
                showContent();
            }, 3000);

            // ... Rest of your code ...

            function showPreloader() {
                const preloader = document.querySelector('.preloader');
                preloader.style.visibility = 'visible';
            }

            function hidePreloader() {
                const preloader = document.querySelector('.preloader');
                preloader.style.display = 'none';
            }

            function showContent() {
                const contentContainer = document.querySelector('.content-container');
                contentContainer.style.display = 'block';
                document.body.style.visibility = 'visible';
            }
        });

        $("#logoutLink").click(function() {
            // Make an AJAX request to the logout.php script
            $.ajax({
                type: "POST",
                url: "logout.php", // Update this with the correct path to your logout script
                cache: false,
                beforeSend: function() {
                    // Code to show a loading spinner or message, if desired
                },
                success: function(response) {
                    // Handle the response from the server, if needed
                    // For a logout action, you may not need to do anything here
                    // The redirect should be handled on the server-side script
                    // You can also add a success message here if you want
                },
                error: function() {
                    // Handle any AJAX request errors, if necessary
                    alert("An error occurred during logout. Please try again.");
                },
                complete: function() {
                    // Code to hide the loading spinner or message, if shown
                    // Redirect to login page after logout is complete
                    window.location.href = "AdminLogin.php";
                }
            });
        });


    </script>
</body>

</html>