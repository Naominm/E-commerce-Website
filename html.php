<?php
// Establish database connection
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'tracking-web';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['employeeId'])) {
        // Update existing employee details
        $employeeId = $_POST['employeeId'];
        $newName = $_POST['newName'];

        // Prepare the UPDATE statement using a prepared statement
        $stmt = $conn->prepare("UPDATE employees SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $newName, $employeeId);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Fetch the updated employee data
            $selectStmt = $conn->prepare("SELECT * FROM employees WHERE id = ?");
            $selectStmt->bind_param("i", $employeeId);
            $selectStmt->execute();
            $result = $selectStmt->get_result();

            if ($result->num_rows > 0) {
                $employee = $result->fetch_assoc();
                echo json_encode($employee);
            } else {
                echo json_encode(null);
            }
            $selectStmt->close();
        } else {
            echo json_encode(null);
        }

        // Close the statement
        $stmt->close();
    } else {
        // Add a new employee to the database
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        // Prepare the INSERT statement using a prepared statement
        $stmt = $conn->prepare("INSERT INTO employees (name, email, address, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $address, $phone);

        // Execute the prepared statement
        if ($stmt->execute()) {
            $employeeId = $stmt->insert_id;

            // Fetch the inserted employee data
            $selectStmt = $conn->prepare("SELECT * FROM employees WHERE id = ?");
            $selectStmt->bind_param("i", $employeeId);
            $selectStmt->execute();
            $result = $selectStmt->get_result();

            if ($result->num_rows > 0) {
                $employee = $result->fetch_assoc();
                echo json_encode($employee);
            } else {
                echo json_encode(null);
            }
            $selectStmt->close();
        } else {
            echo json_encode(null);
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="icon" href="image\Elegant e-commerce Online Shop Logo Template.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">



</head>

<body>
    <!-- loader Start -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="Korina Claudia.png" alt="logo" height="260" width="260" style="border-radius: 50%" ;>
    </div>
    <div class="content-container">

        <!-- loader END -->
        <div class="wrapper">

            <div class="body-overlay"></div>
            <!-- Menu Bar -->
<div class="menu-bar">
    <span class="material-icons" id="menu-icon">menu</span>
</div>
<div class="body-overlay"></div>
            <!--sidebar-->
            <div id="sidebar">
                <div class="sidebar-header">
                    <h3><img src="Korina Claudia.png" alt="" class="img-fluid  "><span>Admin</span></h3>
                </div>
                <ul class="list-unstyled components m-0">
                 
                    </li>




                    <li class="dropdown">
                        <a href="#pagesubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">aspect_ratio</i><span>layouts</span> </a>
                        <ul class=" collapse list-unstyled menu" id="pagesubmenu1">
                            <li><a href="./sales_summary.php">sales_summary</a></li>
                            <li><a href="#">layout2</a></li>
                            <li><a href="#">layout3</a></li>
                        </ul>

            
            
                   
                   
                    <li class="dropdown">
                        <a href="#pagesubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">content_copy</i><span>pages</span></a>
                        <ul class=" collapse list-unstyled menu" id="pagesubmenu7">
                            <li><a href="page.php">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="about.h">About</a></li>
                        </ul>
                    </li>
                    <li>

                    </li>

                    <!-- <li class="">
                        <a href="#"><i class="material-icons">date_range </i><span>copy</span> </a>
                    </li> -->

                </ul>
            </div>
            </div>
            <!--page content-->
            <div id="Content">
                <!--top-nav-bar-->
                <div class="top-navbar">
                    <div class="xd-topbar">
                        <div class="row mx-3">
                            <div class="col-2 col-md-1 col-lg-1 order-2n order-md-1 align-self-center">
                                <div class="xp-menubar">
                                    <span class="material-icons text-white">signal_cellular_alt</span>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-3 order-3 order-md-2">
                                <div class="xp-searchbar">
                                    <form>
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="search">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon2">Go</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="topBarText">

                            </div>
                            <div class="col-md-5 col-lg-8 order-1 order-md-3">
                                <div class="xp-profilebar text-right">
                                    <nav class="navbar p-0">
                                        <ul class="nav navbar-nav flex-row ml-auto">
                                            <li class="dropdown nav-item active">
                                                <a class="nav-link" href="#" data-toggle="dropdown">
                                                    <span class="material-icons">notifications</span>
                                                    <span class="notification">4</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">You have 4 New Messages</a></li>
                                                    <li><a href="#">You have 4 New Messages</a></li>
                                                    <li><a href="#">You have 4 New Messages</a></li>
                                                    <li><a href="#">You have 4 New Messages</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <span class="material-icons">question_answer</span>
                                                </a>
                                            </li>
                                            <li class="dropdown nav-item">
                                                <a class="nav-link" href="#" data-toggle="dropdown">
                                                    <img src="image/profile.png" width="40px" style="border-radius: 50%;">
                                                    <span class="xp-user-live"></span>
                                                </a>
                                                <ul class="dropdown-menu small-menu">
    <li><a href="#"><span class="material-icons">person_outline</span>Profile</a></li>
    <li><a href="#"><span class="material-icons">settings</span>Settings</a></li>
    <li><a href="#" id="logoutLink"><span class="material-icons">logout</span>Logout</a></li>
</ul>

                                            </li>
                                        </ul>

                                </div>
                            </div>
                            <div class="col-md-2 col-lg-1 order-4 align-self-center">

                            </div>
                        </div>
                    </div>
                    <div class="xp-breadcrumbbar text-center">
                        <div class="breadcrumb-date">
                            <div class="form-group">
                                <label>Select Date Range:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="salesdate" value="02 Apr 22 - 02 May 22" readonly>

                                </div>
                            </div>
                        </div>
                        <!--                           
                      <h4 class="page-title">Dashboard</h4> -->
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Nashchiq</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>


                    </div>


                </div>
                </nav>

                <!--top-navbar-end-->

                <!--main--content-->
                <div class="main-content">
                    <div class="row my-2">
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-warning">
                                        <span class="material-icons">equalizer</span>
                                    </div>

                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>visits</strong></p>
                                    <h3 class="card-title">70,102</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-info">info</i>
                                        <a href="#">see detailed report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-rose">
                                        <span class="material-icons">shopping_cart</span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Orders</strong></p>
                                    <h3 class="card-title">102</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-info">local_offer</i>
                                        product-wise sales
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-sucess">
                                        <span class="material-icons">attach_money</span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Revenue</strong></p>
                                    <h3 class="card-title">$23,100</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> weekly sales
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-info">
                                        <span class="material-icons">follow_the_signs</span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>followers</strong></p>
                                    <h3 class="card-title">+2542</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-info">update</i>
                                        just updated
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--row--second-->

                    <div class="row my-3">
                        <div class="col-lg-7 col-md-12 col-sm-12 ">
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Employee status</h4>
                                    <p class="category">New employees on 15th December, 2022</p>
                                </div>
                                <div class="card-content table-rensponsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>salary</th>
                                                <th>country</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>bob willims</td>
                                                <td>$23,564</td>
                                                <td>USA</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>mike tyson</td>
                                                <td>$23,564</td>
                                                <td>canada</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>tim sebastian</td>
                                                <td>$32,564</td>
                                                <td>Netherands</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>philip morris</td>
                                                <td>$31,124</td>
                                                <td>Korea</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>minerva Booper</td>
                                                <td>$20,564</td>
                                                <td>SA</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>bulk Bohan</td>
                                                <td>$43,564</td>
                                                <td>Netherands</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Phillip moris</td>
                                                <td>$53,564</td>
                                                <td>Australia</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-5 col-md-12">
                            <div class="card" style="min-height: 485">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">activities</h4>
                                </div>

                                <div class="card-content">
                                    <div class="steamline">
                                        <div class="sl-item sl-primary">
                                            <div class="sl-content">
                                                <small class="text-muted">5 min Ago</small>
                                                <p>willims has just joined projectx</p>
                                            </div>
                                        </div>
                                        <div class="sl-item sl-danger">
                                            <div class="sl-content">
                                                <small class="text-muted">25 min Ago</small>
                                                <p>willims just joined projectx</p>
                                            </div>
                                        </div>
                                        <div class="sl-item sl-success">
                                            <div class="sl-content">
                                                <small class="text-muted">40 min Ago</small>
                                                <p>willims just joined projectx</p>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="sl-content">
                                                <small class="text-muted">45 min Ago</small>
                                                <p>willims just joined projectx</p>
                                            </div>
                                        </div>
                                        <div class="sl-item sl-warning">
                                            <div class="sl-content">
                                                <small class="text-muted">55 min Ago</small>
                                                <p>willims just shared folder with you</p>

                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="sl-content">
                                                <small class="text-muted">60 min Ago</small>
                                                <p>willims just joined projectx</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="php-content">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                                <h2 class="ml-lg-2">Manage Employees</h2>
                                            </div>
                                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                                    <i class=" material-icons">&#xE147;</i>
                                                    <span Add New Employees></span>
                                                </a>
                                                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"> <i class=" material-icons">&#xE15C;</i>
                                                    <span Delete Employees></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-stripped table-hover">
                                        <thead>
                                            <tr>
                                                <th><span class="custom-checkbox">
                                                        <input type="checkbox" id="selectAll">
                                                        <label for="selectAll"></label></th>
                                                <th>Name</th>
                                                <th><Em>Email</Em></th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th><span class="custom-checkbox">
                                                        <input type="checkbox" id="checkbox1" name="option{}" value="1">
                                                        <label for="checkbox1"></label></th>
                                                <th>Thomas andry</th>
                                                <th><Em>tin@gmail.com</Em></th>
                                                <th>987b manchester Usa</th>
                                                <th>(7805-667788-3)</th>
                                                <th><a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                                        <i class="material-icons" data-toggle="tooltip" title="edit">&#xE254;</i>
                                                    </a>
                                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                                    </a>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th><span class="custom-checkbox">
                                                        <input type="checkbox" id="checkbox1" name="option{}" value="2">
                                                        <label for="checkbox2"></label></th>
                                                <th>daniel leo</th>
                                                <th><Em>danielle.com</Em></th>
                                                <th>987b berlin Usa</th>
                                                <th>(30045-667788-3)</th>
                                                <th><a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                                        <i class="material-icons" data-toggle="tooltip" title="edit">&#xE254;</i>
                                                    </a>
                                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                                    </a>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th><span class="custom-checkbox">
                                                        <input type="checkbox" id="checkbox3" name="option{}" value="3">
                                                        <label for="checkbox3"></label></th>
                                                <th>Malawi mick</th>
                                                <th><Em>tin@gmail.com</Em></th>
                                                <th>987b manchester Usa</th>
                                                <th>(7805-667788-3)</th>
                                                <th><a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                                        <i class="material-icons" data-toggle="tooltip" title="edit">&#xE254;</i>
                                                    </a>
                                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                                    </a>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th><span class="custom-checkbox">
                                                        <input type="checkbox" id="checkbo4" name="option{}" value="4">
                                                        <label for="checkbox4"></label></th>
                                                <th>Maria suleman</th>
                                                <th><Em>marie345@gmail.com</Em></th>
                                                <th>987b romania,Greece</th>
                                                <th>(78-9835-56434-7)</th>
                                                <th><a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                                        <i class="material-icons" data-toggle="tooltip" title="edit">&#xE254;</i>
                                                    </a>
                                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                                    </a>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th><span class="custom-checkbox">
                                                        <input type="checkbox" id="checkbox5" name="option{}" value="5">
                                                        <label for="checkbox5"></label></th>
                                                <th>Nash sherry</th>
                                                <th><Em>sherrym@gmail.com</Em></th>
                                                <th>654 South C</th>
                                                <th>(254-765-8765-9)</th>
                                                <th><a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                                        <i class="material-icons" data-toggle="tooltip" title="edit">&#xE254;</i>
                                                    </a>
                                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                                    </a>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="clearfix">
                                        <div class="hint-text">showing <b>5</b> <b>out of</b> <b>25</b></div>
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a href="#">previous</a></li>
                                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                                            <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                                            <li class="page-item"><a href="#" class="page-link">Next</a></li>
                                        </ul>
                                    </div>


                                </div>
                            </div>

                            <!-- add modal-start -->
                            <div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Employees</h5>
                                            <button type="button" class="close" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" id="addEmployeeForm">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea class="form-control" id="address" name="address" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success" id="addEmployeeBtn" name="addE">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--edit-modal-end-->
                        <!-- edit modal-start -->
                        <div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Employees</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" id="editEmployeeForm">
                                            <div class="form-group">
                                                <label for="editName">Name</label>
                                                <input type="text" class="form-control" id="editName" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="editEmail">Email</label>
                                                <input type="email" class="form-control" id="editEmail" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="editAddress">Address</label>
                                                <textarea class="form-control" id="editAddress" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="editPhone">Phone</label>
                                                <input type="text" class="form-control" id="editPhone" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-success" id="saveEmployeeBtn">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--edit-modal-end-->
                        <!--delete modal-start-->
                        <div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="mode-content">
                                    <div class="mode-header">
                                        <h5 class="modal-title">Delete Employees</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this Records</p>
                                        <p class="text-warning"><small>this action cannot be undone,</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-success">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--edit-modal-end-->
                    </div>

                </div>
                <!--main-content-end-->
                <!--footer-design-->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="footer-in">
                            <p class="mb-0">&copy 2021 Nashchiq Design All Right REserved</p>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
    </div>
    <!--html content end-->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.0.5/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.0.5/daterangepicker.min.js"></script>
    <script>
        //     document.getElementById("sidebarCollapse").addEventListener("click", function () {
        //     document.getElementById("sidebar").classList.toggle("active");
        // });
        $(document).ready(function() {
            showPreloader();

            // Set the timeout for 5 seconds (5000 milliseconds)
            setTimeout(function() {
                hidePreloader();
                showContent();
            }, 1000);
            $(".xp-menubar").on('click', function() {
                $("#sidebar").toggleClass('active');
                $("#Content").toggleClass('active');
            });

            $('.xp-menubar, .body-overlay').on('click', function() {
                $("#sidebar, .body-overlay").toggleClass('show-nav');
            });

            // Add click event listener to the dropdown-toggle elements
            $(".sidebar .dropdown-toggle").on("click", function() {
                // Toggle the visibility of the menu element next to the clicked dropdown-toggle
                $(this).next(".menu").slideToggle(300);
            })
            $('#addEmployeeBtn').click(function() {
                // Retrieve input values
                var name = $('#name').val();
                var email = $('#email').val();
                var address = $('#address').val();
                var phone = $('#phone').val();

                // Create a new employee row
                var newRow = $('<tr>');
                newRow.append($('<th>').html('<span class="custom-checkbox"><input type="checkbox" id="checkbox1" name="option{}" value="1"><label for="checkbox1"></label>'));
                newRow.append($('<th>').text(name));
                newRow.append($('<th>').html('<em>' + email + '</em>'));
                newRow.append($('<th>').text(address));
                newRow.append($('<th>').text(phone));
                newRow.append($('<th>').html('<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="edit">&#xE254;</i></a><a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>'));

                // Append the new row to the table body
                $('table.table tbody').append(newRow);

                // Send the form data to the server using $.post()
                $.post('<?php echo $_SERVER["PHP_SELF"]; ?>', {
                        name: name,
                        email: email,
                        address: address,
                        phone: phone
                    })
                    .done(function(response) {
                        // Handle the response from the server
                        if (response.success) {
                            // Success: do something if needed
                        } else {
                            // Error: do something if needed
                        }
                    })
                    .fail(function() {
                        // Handle the AJAX request failure
                        alert('An error occurred while adding the employee. Please try again.');
                    });

                // Clear the form fields
                $('#name').val('');
                $('#email').val('');
                $('#address').val('');
                $('#phone').val('');
            });

            // Edit employee button click event
            $(document).on('click', '.edit', function() {
                // Retrieve employee details from the row
                var row = $(this).closest('tr');
                var employeeId = row.find('input[type="checkbox"]').attr('value');
                var name = row.find('th:nth-child(2)').text();
                var email = row.find('th:nth-child(3)').text();
                var address = row.find('th:nth-child(4)').text();
                var phone = row.find('th:nth-child(5)').text();

                // Populate the modal with employee details
                $('#editEmployeeId').val(employeeId);
                $('#editName').val(name);
                $('#editEmail').val(email);
                $('#editAddress').val(address);
                $('#editPhone').val(phone);

                // Show the modal
                $('#editEmployeeModal').modal('show');
            });

            // Save employee details button click event
            $('#saveEmployeeBtn').click(function(event) {
                event.preventDefault(); // Prevent form submission

                // Retrieve input values
                var employeeId = $('#editEmployeeId').val();
                var newName = $('#editName').val();
                var newEmail = $('#editEmail').val();
                var newAddress = $('#editAddress').val();
                var newPhone = $('#editPhone').val();

                // Update the employee details in the interface
                var row = $('#employeeRow-' + employeeId);
                row.find('th:nth-child(2)').text(newName);
                row.find('th:nth-child(3)').text(newEmail);
                row.find('th:nth-child(4)').text(newAddress);
                row.find('th:nth-child(5)').text(newPhone);

                // Show success notification
                toastr.success('Employee details updated successfully!');

                // Update the employee details in the database
                $.post('updateEmployee.php', {
                        employeeId: employeeId,
                        newName: newName,
                        newEmail: newEmail,
                        newAddress: newAddress,
                        newPhone: newPhone
                    })
                    .done(function(response) {
                        // Handle the response from the serversss
                        console.log(response);
                        // You can handle the response if needed
                    })
                    .fail(function() {
                        // Handle the AJAX request failure
                        alert('An error occurred while updating the employee. Please try again.');
                    });

                // Close the modal
                $('#editEmployeeModal').modal('hide');
            });

            // Clear modal fields when the modal is hidden
            $('#editEmployeeModal').on('hidden.bs.modal', function() {
                // Reset the form fields to their original values
                var employeeId = $('#editEmployeeId').val();
                var originalName = $('#employeeRow-' + employeeId).find('th:nth-child(2)').text();
                var originalEmail = $('#employeeRow-' + employeeId).find('th:nth-child(3)').text();
                var originalAddress = $('#employeeRow-' + employeeId).find('th:nth-child(4)').text();
                var originalPhone = $('#employeeRow-' + employeeId).find('th:nth-child(5)').text();

                $('#editName').val(originalName);
                $('#editEmail').val(originalEmail);
                $('#editAddress').val(originalAddress);
                $('#editPhone').val(originalPhone);
            });
            $(document).ready(function() {
                $(".xp-menubar").on('click', function() {
                    $("#sidebar").toggleClass('active');
                    $("#Content").toggleClass('active');
                });

                $('.xp-menubar, .body-overlay').on('click', function() {
                    $("#sidebar, .body-overlay").toggleClass('show-nav');
                });

                // Add click event listener to the dropdown-toggle elements
                $(".sidebar .dropdown-toggle").on("click", function() {
                    // Toggle the visibility of the menu element next to the clicked dropdown-toggle
                    $(this).next(".menu").slideToggle(300);
                });

                $('#addEmployeeBtn').click(function() {
                    // Retrieve input values
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var address = $('#address').val();
                    var phone = $('#phone').val();

                    // Create a new employee row
                    var newRow = $('<tr>');
                    newRow.append($('<th>').html('<span class="custom-checkbox"><input type="checkbox" id="checkbox1" name="option{}" value="1"><label for="checkbox1"></label>'));
                    newRow.append($('<th>').text(name));
                    newRow.append($('<th>').html('<em>' + email + '</em>'));
                    newRow.append($('<th>').text(address));
                    newRow.append($('<th>').text(phone));
                    newRow.append($('<th>').html('<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="edit">&#xE254;</i></a><a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>'));

                    // Append the new row to the table body
                    $('table.table tbody').append(newRow);

                    // Send the form data to the server using $.post()
                    $.post('<?php echo $_SERVER["PHP_SELF"]; ?>', {
                            name: name,
                            email: email,
                            address: address,
                            phone: phone
                        })
                        .done(function(response) {
                            // Handle the response from the server
                            if (response.success) {
                                // Success: do something if needed
                            } else {
                                // Error: do something if needed
                            }
                        })
                        .fail(function() {
                            // Handle the AJAX request failure
                            alert('An error occurred while adding the employee. Please try again.');
                        });

                    // Clear the form fields
                    $('#name').val('');
                    $('#email').val('');
                    $('#address').val('');
                    $('#phone').val('');
                });

                // Edit employee button click event
                $(document).on('click', '.edit', function() {
                    // Retrieve employee details from the row
                    var row = $(this).closest('tr');
                    var employeeId = row.find('input[type="checkbox"]').attr('value');
                    var name = row.find('th:nth-child(2)').text();
                    var email = row.find('th:nth-child(3)').text();
                    var address = row.find('th:nth-child(4)').text();
                    var phone = row.find('th:nth-child(5)').text();

                    // Populate the modal with employee details
                    $('#editEmployeeId').val(employeeId);
                    $('#editName').val(name);
                    $('#editEmail').val(email);
                    $('#editAddress').val(address);
                    $('#editPhone').val(phone);

                    // Show the modal
                    $('#editEmployeeModal').modal('show');
                });

                // Save employee details button click event
                $('#saveEmployeeBtn').click(function(event) {
                    event.preventDefault(); // Prevent form submission

                    // Retrieve input values
                    var employeeId = $('#editEmployeeId').val();
                    var newName = $('#editName').val();
                    var newEmail = $('#editEmail').val();
                    var newAddress = $('#editAddress').val();
                    var newPhone = $('#editPhone').val();

                    // Update the employee details in the interface
                    var row = $('#employeeRow-' + employeeId);
                    row.find('th:nth-child(2)').text(newName);
                    row.find('th:nth-child(3)').text(newEmail);
                    row.find('th:nth-child(4)').text(newAddress);
                    row.find('th:nth-child(5)').text(newPhone);

                    // Show success notification
                    toastr.success('Employee details updated successfully!');

                    // Update the employee details in the database
                    $.post('update_employee.php', {
                            employeeId: employeeId,
                            newName: newName,
                            newEmail: newEmail,
                            newAddress: newAddress,
                            newPhone: newPhone
                        })
                        .done(function(response) {
                            // Handle the response from the server
                            console.log(response);
                            // You can handle the response if needed
                        })
                        .fail(function() {
                            // Handle the AJAX request failure
                            alert('An error occurred while updating the employee. Please try again.');
                        });

                    // Close the modal
                    $('#editEmployeeModal').modal('hide');
                });

                // Clear modal fields when the modal is hidden
                $('#editEmployeeModal').on('hidden.bs.modal', function() {
                    // Reset the form fields to their original values
                    var employeeId = $('#editEmployeeId').val();
                    var originalName = $('#employeeRow-' + employeeId).find('th:nth-child(2)').text();
                    var originalEmail = $('#employeeRow-' + employeeId).find('th:nth-child(3)').text();
                    var originalAddress = $('#employeeRow-' + employeeId).find('th:nth-child(4)').text();
                    var originalPhone = $('#employeeRow-' + employeeId).find('th:nth-child(5)').text();

                    $('#editName').val(originalName);
                    $('#editEmail').val(originalEmail);
                    $('#editAddress').val(originalAddress);
                    $('#editPhone').val(originalPhone);
                });
                const salesdateInput = document.getElementById('salesdate');
                const dateIcon = document.querySelector('.date-icon');
                let startDate = null;
                let endDate = null;
                let isSecondDateSelected = false;

                const datepickerOptions = {
                    showButtonPanel: true,
                    dateFormat: 'dd M yy',
                    numberOfMonths: 2,
                    beforeShow: function(input, inst) {
                        $(inst.dpDiv).addClass('month-calendar');
                        if (!isSecondDateSelected) {
                            inst.input.val(startDate); // Set the default second date
                        }
                    },
                    onSelect: function(dateText, inst) {
                        if (!startDate) {
                            startDate = dateText;
                        } else if (!endDate) {
                            endDate = dateText;
                            isSecondDateSelected = true;
                        } else {
                            startDate = dateText;
                            endDate = null;
                            isSecondDateSelected = false;
                        }
                        updateSalesDateText();
                        setTimeout(function() {
                            $(salesdateInput).datepicker('show'); // Show the popup calendar again after date selection
                        }, 1);
                    },
                    // Function to customize the button placement
                    createButtonPanel: function(inst) {
                        const buttonPane = $('<div class="ui-datepicker-buttonpane"></div>');
                        const buttonContainer = $('<div class="ui-datepicker-group ui-datepicker-button-container"></div>');

                        // Append the "Today" button
                        const todayButton = $('<button type="button" class="ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all">Today</button>');
                        todayButton.on('click', function() {
                            const currentDate = new Date();
                            inst.input.datepicker('setDate', currentDate);
                        });
                        buttonContainer.append(todayButton);

                        // Append the "Apply" button
                        const applyButton = $('<button type="button" class="ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all">Apply</button>');
                        applyButton.on('click', function() {
                            inst.input.datepicker('hide');
                        });
                        buttonContainer.append(applyButton);

                        buttonPane.append(buttonContainer);
                        return buttonPane;
                    }
                };

                $(salesdateInput).datepicker(datepickerOptions);

                $(dateIcon).on('click', function() {
                    $(salesdateInput).datepicker('show');
                });

                function updateSalesDateText() {
                    if (startDate && endDate) {
                        salesdateInput.value = startDate + ' to ' + endDate;
                        filterSalesRecords(startDate, endDate);
                    } else if (startDate) {
                        salesdateInput.value = startDate;
                        filterSalesRecords(startDate, startDate);
                    } else {
                        salesdateInput.value = '';
                        showAllSalesRecords();
                    }
                }

                function filterSalesRecords(start, end) {
                    // Array of card titles (indexes) to show "Loading..."
                    const cardTitlesToLoad = [0, 1, 2, 3];

                    // Show "Loading..." for specific card titles
                    $(".card-title").each(function(index) {
                        if (cardTitlesToLoad.includes(index)) {
                            $(this).text("Loading...");
                        }
                    });

                    // Simulate an API call or asynchronous task to fetch new numbers
                    setTimeout(function() {
                        // Replace the "Loading..." text with new numbers for the specified indexes
                        $(".card-title").eq(0).text("70,102");
                        $(".card-title").eq(1).text("102");
                        $(".card-title").eq(2).text("$23,100");
                        $(".card-title").eq(3).text("+2542");
                    }, 10000); // Simulate a 4-second delay for the API call
                }

                function showAllSalesRecords() {
                    // Implement this function if you need to show all sales records when no date range is selected.
                }

            });

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
            }
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


        });
    </script>
</body>

</html>