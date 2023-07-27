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

if (isset($_POST['submitButton'])) { // Update the condition to check if the contact form is submitted
    $email = $_POST['email'];
    $username = $_POST['username'];
    $message = $_POST['message'];


    $query = "INSERT INTO contact( email,username,message,) VALUES ( '$email','$username',' $message');";

    if (mysqli_query($con, $query)) {
        // contact successful, handle success or display a message
        header("Location: contact.php"); // Redirect to contact page after successful signup
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
    <title>contact us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="icon" href="image\Elegant e-commerce Online Shop Logo Template.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c306671123.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body style="background-image: url(image/apple.jpeg);">


    <nav class="navbar navbar-expand-sm navbar-dark bg-black">
        <div class="container">
            <a href="#" class="navbar-brand">kienyeji chicken</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a href="page.php" class="nav-link">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                <a href="#services py-5 text-center" class="nav-link">services</a>
            </li> -->
                    <li class="nav-item">
                        <a href="products.php" class="nav-link">Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link">About</a>
                    </li>
                    <li class="nav-item  active ">
                        <a href="contact.php" class="nav-link"> Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-shopping-cart fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col mx-auto col-md-6 my-5 col-lg-4">
            <h1 style="color: rgb(0, 0, 0); margin-left: 40%; font-size: 40px;
              width: 700px;" class="font-weight-bold text-uppercase ">Get In Touch <b></b> </h1>

            <div class="review1">
                <iconify-icon icon="uiw:user"></iconify-icon>
                <div class="row">
                    <div class="col mx-6 col-md-6 my-5 col-lg-4">
                        <div class="card1 mx-1 my-1 " id="card1" style="width:18rem; height:10rem; background-color: rgb(250, 249, 249); ">
                            <div class="card-body">
                                <p class="text-capitalize"> <i class="fa-solid fa-location-dot fa-2x"></i> <br>
                                    location <br>
                                    Kiambu-towm <br> opposite <br> bidii plaza
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col mx-6 col-md-6 my-5 col-lg-4">
                        <div class="card2 mx-2 my-1 " id="card1" style="width:18rem; height:10rem; background-color: rgb(250, 247, 247); ">
                            <div class="card-body">
                                <p class="text-capitalize"><i class="fa-solid fa-phone fa-2x"></i> <br>
                                    call us <br>
                                    0789787878 or <br>
                                    0790989878 <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col mx-6 col-md-6 my-5 col-lg-4">
                        <div class="card2 mx-2 my-1 " id="card1" style="width:18rem; height:10rem; background-color: rgb(252, 245, 245); ">
                            <div class="card-body">
                                <p class="text-capitalize">
                                    <i class="fa-solid fa-envelope fa-2x"></i> <br>
                                    email us <br>
                                    localfarm@gmail.com <br>
                                    info@localfarm.co.ke
                                </p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <div class="card my-2 mx-" id="mycard" style="width: 38rem; height: 40rem; margin-top: 10%; background-color: rgb(8, 48, 34); ">

                <!--contact section-->
                <section class="contact py-5">
                    <div class="container">
                        <h5 class="font-weight-bold text-uppercase " style="margin-left: 30%; font-size: 30px; color: #ffffff;" id="headingc">
                            CONTACT US</h5>
                        <form method="POST" action="" class="col-lg-6 offset-lg-3 ">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="username" class="form-control" placeholder="Name">

                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" class="form-control" name="message" placeholder="Message" rows="5">
                </textarea>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="check">
                                <label class="form-check-label" for="check">
                                    Subscribe to news letter</label>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-lg btn-color cont-btn" name="submitButton">Submit</button>
                            </div>
                        </form>
                    </div>
                </section>
                <!--end of contact section-->

            </div>

        </div>

    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>