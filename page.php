<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tracking-web";

// Create connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if (isset($_POST['name'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];
    // $checkbox = $_POST['checkbox'];

    $query = "INSERT INTO contactform (email,name,message,) VALUES ('$email','$name','$message');";

    mysqli_query($con, $query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="image\Elegant e-commerce Online Shop Logo Template.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/c306671123.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>

    <!--Nav Bar-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-black">
        <div class="container">
            <a href="#" class="navbar-brand">kienyeji chicken</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Home</a>
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
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="fas fa-shopping-cart fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--slider-->
    <section id="main">
        <div id="Carousel" class="carousel" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#Carousel" data-slide-to="0"></li>
                <li data-target="#Carousel" data-slide-to="1"></li>
                <li data-target="#Carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item carousel-image-1 active">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block text-right mb-5">
                            <h1 class="display-3 title-color">Discover Your Perfect Hens</h1>
                            <p class="lead">Browse our wide selection of hens for sale. We take pride in offering a diverse range of high-quality, healthy hens that are perfect for your backyard flock.
                                Our hens are carefully raised in a clean and comfortable environment, ensuring their well-being and optimal health.</p>
                            <a href="signup.php" class="btn btn-color slide-btn btn-lg">
                                Sign Up Now
                            </a>

                        </div>
                    </div>
                </div>
                <!-- end -->
                <div class="carousel-item carousel-image-2">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block mb-5">
                            <h1 class="display-3 title-color">Feathered Friends for Your Flock</h1>
                            <p class="lead">Whether you're a seasoned chicken keeper or just starting out, we have the right hens for you.
                                Our experienced team is dedicated to helping you find the perfect additions to your flock.
                                With a variety of breeds and colors to choose from, you can select hens that match your preferences and requirements. </p>
                            <a href="#" class="btn btn-color slide-btn btn-lg">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-image-3">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block mb-5">
                            <h1 class="display-3 title-color">Experience the Delights of Chicken-Keeping</h1>
                            <p class="lead">Don't miss out on the opportunity to enhance your backyard with these delightful creatures.

                                Join our community of happy customers who have experienced the joys of sustainable living and the simple pleasures of farm-fresh eggs.</p>
                            <a href="#" class="btn btn-color slide-btn btn-lg">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
                <a href="#Carousel" data-slide="prev" class="carousel-control-prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#Carousel" data-slide="next" class="carousel-control-next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>
    <!--end of slider-->
    <!--service section-->
    <section class="services py-5 text-center">
        <div class="container">
            <div class="row">
                <!--single service-->
                <div class="col-10 mx-auto col-md-6 col-lg-4 my-3">
                    <span class="service-icon">
                        <i class="fa-solid fa-globe fa-2x" style="color: blue;"></i>
                    </span>
                    <h5 class="font-weight-bold text-uppercase" style="color: #fff;">
                        Countrywide Shipping</h5>
                    <p class="text-capitalize">Experience seamless shipping services across the country,
                        ensuring your hens arrive safely and on time.
                        We prioritize the well-being of our feathered friends throughout the journey,
                        providing secure packaging and proper care during transit.
                        Trust us to deliver your hens with utmost care and professionalism.</p>
                </div>
                <!--end of sinle service-->
                <!--single service-->
                <div class="col-10 mx-auto col-md-6 col-lg-4 my-3">
                    <span class="service-icon">
                        <i class="fas fa-stamp fa-2x" style="color: yellow;"></i>
                    </span>
                    <h5 class="font-weight-bold text-uppercase" style="color: #fff;">
                        certified by Kenchic</h5>
                    <p class="text-capitalize">We are an authorized partner of Kenchic, ensuring that our hens meet the highest standards of quality and health.
                        With rigorous inspections and testing, our hens are certified to be genuine and top-notch poultry.
                        Choose our hens with confidence, knowing that they have been approved and certified by Kenchic.</p>
                </div>
                <!--end of sinle service-->
                <!--single service-->
                <div class="col-10 mx-auto col-md-6 col-lg-4 my-3">
                    <span class="service-icon">
                        <i class="fas fa-file-invoice-dollar fa-2x" style="color: green;"></i>
                    </span>
                    <h5 class="font-weight-bold text-uppercase" style="color: #fff;">
                        30 days money back</h5>
                    <p class="text-capitalize">We offer a 30-day money back guarantee on our hens.
                        If you're not satisfied with your purchase within 30 days, contact us for a refund.
                        Your satisfaction is important to us,
                        and we want you to feel confident in choosing our hens for your flock.</p>
                </div>
                <!--end of sinle service-->
            </div>
        </div>
    </section>
    <!--end of service section-->
    <!--featured products-->
    <section id="products" class="products py-5">
        <div class="container">
            <!--section title-->
            <div class="row">
                <div class="col-10 mx-auto col-sm-6 text-center">
                    <h1 class="text-capitalize product-title">
                        featured products
                    </h1>
                </div>
            </div>
            <!--end of section title-->
            <!--product items-->
            <div class="row product-items" id="product-items">
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/threeegg.jpg" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name"> KienyejinEggs</h5>
                                <span> <i class="fas fa-dollar-sign"></i> 30 each</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of single item-->
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/image3.jpg" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name">New improved Layers</h5>
                                <span> <i class="fas fa-dollar-sign"></i> 800</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of single item-->
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/image1.jpg" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name">New improved Broilers</h5>
                                <span> <i class="fas fa-dollar-sign"></i> 600</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of single item-->
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/chick.jpg" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name">Bloiler chicks</h5>
                                <span> <i class="fas fa-dollar-sign"></i> 300</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of single item-->
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/slider2.png" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name">Broilers</h5>
                                <span> <i class="fas fa-dollar-sign"></i> 950</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of single item-->
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/hencock.jpg" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name">cock</h5>
                                <span> <i class="fas fa-dollar-sign"></i> 1050</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of single item-->
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/image8.jpg" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name">broiler chicken</h5>
                                <span> <i class="fas fa-dollar-sign"></i> 1250</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of single item-->
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/image7.jpg" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name">Turkey</h5>
                                <span> <i class="fas fa-dollar-sign"></i> 2000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of single item-->
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/purebrownlayers.jpg" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name">Pure Brown Layers</h5>
                                <span> <i class="fas fa-dollar-sign"></i> 1050</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of single item-->
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/image5.jpg" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name">pure kienyeji Eggs</h5>
                                <span> <i class="fas fa-dollar-sign"></i>40</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of single item-->
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/image4.jpg" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name">Quality Broilers</h5>
                                <span> <i class="fas fa-dollar-sign"></i> 1250</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of single item-->
                <!--single item-->
                <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
                    <div class="card single-item">
                        <div class="img-container">
                            <img src="./image/image3.jpg" alt="" class="card-img-top product-img">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex jusify-content-between text-capitalize">
                                <h5 id="item-name">Dark-Brown layers</h5>
                                <span> <i class="fas fa-dollar-sign"></i> 1050</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of product items-->
        </div>
    </section>
    <!--end of featured products-->
    <!--about section-->
    <section id="about-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class=" col-lg-5 text-center">
                    <img src="./image/image2.jpg" alt="" width="450" height="150" class="img-fluid watch-img">
                </div>
                <div class="col-lg-7 text-lg-right text-center text-color about-text" style="color: #fff;">
                    <h1>About Company</h1>
                    <p class="text" style="color: #000;"> Welcome to our world of exceptional hens.
                        We take great pride in offering you the finest selection of poultry,
                        raised with care and passion. Our commitment to quality ensures that each
                        hen meets the highest standards of health and well-being.
                        Experience the difference and elevate your flock with our extraordinary hens</p>
                </div>
            </div>
        </div>
    </section>
    <!--end of about section-->
    <!--best seller section-->
    <section class="seller py">
        <div class="container">
            <!--section title-->
            <div class="row">
                <div class="col-10 mx-auto col-sm-6 text-center">
                    <h1 class="text-capitalize product-title">
                        best seller products
                    </h1>
                </div>
            </div>
            <!--end of section title-->
            <!--row-->
            <div class="row">
                <div class="col-sm-6">
                    <div class="seller-item">

                        <img src="./image/pureekienyejispotted.png" alt="" class="img-fluid photo img-top">
                        <p>Pure and brown kienyeji chicken</p>
                    </div>
                </div>
                <!--end of col-->
                <div class="col-sm-6 d-flex flex-column justify-content-between">
                    <!--row-->
                    <div class="row">
                        <!--img-1-->
                        <div class="col-sm-6">
                            <div class="seller-item">
                                <img src="./image/pic5.jpeg" alt="" class="img-fluid-seller-img img-top ">
                                <p>Brown-red improved kienyeji.</p>
                            </div>
                        </div>
                        <!--end of img-1-->
                        <!--img-1-->
                        <div class="col-sm-6">
                            <div class="seller-item">
                                <img src="./image/pic1.jpeg" alt="" class="img-fluid-seller-img img-top">
                                <p>indeginous black kienyeji chicken</p>
                            </div>
                        </div>
                        <!--end of img-1-->
                    </div>

                    <div class="row">
                        <!--img-1-->
                        <div class="col-sm-6">
                            <div class="seller-item">
                                <img src="./image/pic2.jpeg" alt="" class="  img-top">
                                <p>high-breed kienyeji
                                </p>
                            </div>
                        </div>
                        <!--end of img-1-->
                        <!--img-1-->
                        <div class="col-sm-6">
                            <div class="seller-item">
                                <img src="./image/pic4.jpeg" alt="" class="  img-top">
                                <p> new improved kienyeji</p>
                            </div>
                        </div>
                        <!--end of img-1-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end of best seller section-->
    <!--contact section-->
    <section class="contact py-5">
        <div class="container">
            <h2 class="section-heading text-center">Contact Us</h2>
            <form method="POST" class="col-lg-6 offset-lg-3" id="contactForm">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name">

                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5">
                </textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="check" id="check">
                    <label class="form-check-label" for="check">
                        Subscribe to news letter</label>
                </div>
                <div class="text-center">
                    <button class="btn btn-lg btn-color cont-btn">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!--end of contact section-->
    <footer class="footer mt-5">
        <div class="text-center py-5">
            <h2 class="py-3">kienyeji </h2>
            <div class="mx-auto heading-line"></div>
        </div>
        <div class="container">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <p>
                        <footer>
                            <p>© 2023 Local Famers Community. All rights reserved.
                                | <a href="privacy.html">Privacy Policy</a>
                                | <a href="terms.html">Terms of Service</a>
                                | <a href="contact.html">Contact Us</a></p>
                            <p>Address: 1075 Kiambu, Nairobi, Nairobi, 00900</p>
                            <p>Phone: (123) 456-7890</p>
                            <p>Email: info@localfamers.com</p>
                        </footer>
                        </p>
                        <div class="justify-content-center">
                            <i class="fab fa-facebook fa-2x"></i>
                            <i class="fab fa-twitter fa-2x"></i>
                            <i class="fab fa-instagram fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="copyright text-center py-3 border-top text-light">
                    <p>&copy; copy right kukukienyeji</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>