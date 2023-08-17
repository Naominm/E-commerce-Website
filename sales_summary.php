<?php

// Replace the database credentials with your actual values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tracking-web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a date is provided in the URL
if (isset($_GET['sales_date'])) {
    $sales_date = $_GET['sales_date'];
    // Query to fetch sales data based on the selected date
    $sql = "SELECT description, group_name, unit_price, qty_sold, gross_sales, tax_total, net_sales
            FROM items_sales_summary
            WHERE sales_date = '$sales_date'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch data and store it in an array
        $sales_data = array();
        while ($row = $result->fetch_assoc()) {
            $sales_data[] = $row;
        }
    }
}

$conn->close();
?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">


    <style>
        /* Hide the menu bar on larger screens */
        @media (min-width: 768px) {
            .menu-bar {
                display: none;
            }

            .breadcrumb-date {
                margin-top: 0px;
            }
        }

        /* Custom CSS for pushing the input down on medium and small screens */
        @media (max-width: 991px) {
            .date-input {
                margin-top: 10px;
                /* Adjust the value as needed */
            }
        }


        /* Apply styles for screens from 577px to 1199px width (medium devices) */
        @media (min-width: 577px) and (max-width: 1199px) {
            .breadcrumb-date {
                margin-top: 10px;
            }

            .card .card-stats {
                margin-top: 10px;
            }

            .form-group label {
                margin-top: 5px;
                margin-left: 0px;
                font-size: 15px;
                /* Add padding to the top of the label */
            }

        }

        /* Apply styles for screens up to 576px width (small devices) */
        @media (max-width: 576px) {
            .breadcrumb-date {
                margin-top: 0px;
            }

            .d-md-none {
                display: none;
            }

            .card .card-stats {
                margin-top: 10px;
            }

            .form-group label {
                margin-top: 5px;
                margin-left: 0px;
                font-size: 15px;
                /* Add padding to the top of the label */
            }

        }

        /* Custom CSS for more spacing between date input and first card on smaller screens */
        @media (max-width: 592px) {
            .input-group {
                margin-bottom: -10px;
                /* Adjust the value as needed */
            }
        }
    </style>
</head>

<body>
    <!-- loader Start -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="preloader.png" alt="Logo" height="60" width="60" style="border-radius: 50%;">
    </div>
    <div class="content-container">

        <!-- loader END -->
        <div class="wrapper">
            <div class="row mb-2">
                <div class="body-overlay"></div>
                <!--sidebar-->
                <div id="sidebar">
                    <div class="sidebar-header">
                        <h3><img src="image/av1.png" alt="" class="img-fluid  "><span>Admin</span></h3>
                    </div>
                    <ul class="list-unstyled components m-0">
                        <li class="active">
                            <a href="#" class="dashboard"> <i class="material-icons"> dashboard</i>dashboard</a>
                        </li>


                        </li>
                        <li class="dropdown">
                            <a href="#pagesubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="material-icons">apps</i><span>widgets</span> </a>
                            <ul class=" collapse list-unstyled menu" id="pagesubmenu2">
                                <li><a href="#">Apps1</a></li>
                                <li><a href="#">Apps2</a></li>
                                <li><a href="#">Apps3</a></li>
                            </ul>

                        </li>
                        <li class="dropdown">
                            <a href="#pagesubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="material-icons">equalizer</i><span>charts</span></a>
                            <ul class=" collapse list-unstyled menu" id="pagesubmenu3">
                                <li><a href="#">pages1</a></li>
                                <li><a href="#">pages2</a></li>
                                <li><a href="#">pages3</a></li>
                            </ul>

                        </li>
                        <li class="dropdown">
                            <a href="#pagesubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="material-icons">extension</i><span>ui element</span></a>
                            <ul class=" collapse list-unstyled menu" id="pagesubmenu4">
                                <li><a href="#">Home1</a></li>
                                <li><a href="#">Home2</a></li>
                                <li><a href="#">Home3</a></li>
                            </ul>

                        </li>
                        <li class="dropdown">
                            <a href="#pagesubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="material-icons">border_color</i><span>form</span> </a>
                            <ul class="collapse list-unstyled menu" id="pageSubmenu5">
                                <li><a href="#">Home1</a></li>
                                <li><a href="#">Home2</a></li>
                                <li><a href="#">Home3</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#pagesubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="material-icons">grid_on</i><span>table</span></a>
                            <ul class=" collapse list-unstyled menu" id="pagesubmenu6 ">
                                <li><a href="#">table1</a></li>
                                <li><a href="#">table2</a></li>
                                <li><a href="#">table3</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#pagesubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="material-icons">date_range</i><span>copy</span></a>
                            <ul class=" collapse list-unstyled menu" id="pagesubmenu7 ">
                                <li><a href="#">copy1</a></li>
                                <li><a href="#">copy2</a></li>
                                <li><a href="#">copy3</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#pagesubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="material-icons">content_copy</i><span>pages</span></a>
                            <ul class=" collapse list-unstyled menu" id="pagesubmenu7">
                                <li><a href="#">pages1</a></li>
                                <li><a href="#">pages2</a></li>
                                <li><a href="#">pages3</a></li>
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
                                                    <li><a href="#" id="logout"><span class="material-icons">logout</span>Logout</a></li>

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
                                    <input type="text" class="form-control float-right " id="salesdate" value="02 Apr 22 - 02 May 22" readonly>

                                </div>

                            </div>
                        </div>
                        <!-- Empty column for spacing (small and medium screens) -->
                        <div class="col-12 col-md-6 col-lg-3 mt-4 "></div>
                        <!-- Empty column for spacing (small and medium screens) -->
                        <div class="col-12 col-md-6 col-lg-3 mt-4 "></div>
                        <!--                           
                      <h4 class="page-title">Dashboard</h4> -->
                        <ol class="breadcrumb  d-none d-md-flex justify-content-center " style="margin-top: -9px;">
                            <li class="breadcrumb-item"><a href="#">Nashchiq</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>


                    </div>


                </div>
                </nav>
                <!-- Empty column for spacing (small and medium screens) -->
                <div class="col-12 col-md-6 col-lg-3 mt-3 mt-md-0 d-md-none"></div>
                <!--top-navbar-end-->
                <!--main-content-->
                <div class="main-content">
                    <div class="container mt-3 mt-md-0">
                        <div class="row my-2">
                          

                            <!-- New columns -->
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="card card-stats">
                                    <div class="card-header bg-info">
                                        <div class="icon icon-info bg-info elevation-1">
                                            <i class="fas fa-coins" style="color: white;"></i>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <p class="category"><strong>Gross Sales</strong></p>
                                        <h3 class="card-title" id="gross">
                                            <small>Loading....</small>
                                        </h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons text-info">info</i>
                                            <a href="#">see detailed report</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="card card-stats">
                                    <div class="card-header bg-danger">
                                        <div class="icon icon-danger bg-danger elevation-1">
                                            <i class="fas fa-percentage" style="color: white;"></i>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <p class="category"><strong>Tax Total</strong></p>
                                        <h3 class="card-title" id="tax">
                                            <small>Loading....</small>
                                        </h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons text-info">local_offer</i>
                                            product-wise sales
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix hidden-md-up"></div>

                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="card card-stats">
                                    <div class="card-header bg-success">
                                        <div class="icon icon-success bg-success elevation-1">
                                            <i class="fas fa-shopping-cart" style="color: white;"></i>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <p class="category"><strong>Net Sales</strong></p>
                                        <h3 class="card-title" id="net">
                                            <small>Loading....</small>
                                        </h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">date_range</i> weekly sales
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- New columns -->
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="card card-stats">
                                    <div class="card-header bg-warning">
                                        <div class="icon icon-info bg-warning elevation-1">
                                            <i class="fas fa-barcode" style="color: black;"></i>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <p class="category"><strong>Number of Bills</strong></p>
                                        <h3 class="card-title" id="gross">
                                            <small>Loading....</small>
                                        </h3>
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
                    </div>
                </div>





                <div class=" col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chicken Products Sales Summary</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="GET">
                                <label for="sales_date">Select a date:</label>
                                <input type="date" id="sales_date" name="sales_date">
                                <button type="submit">Show Sales Data</button>
                            </form>
                            <?php
                            if (isset($sales_data) && !empty($sales_data)) {
                            ?>
                                <table id="sales" class="table table-bordered table-striped table-striped">
                                    <thead>
                                        <tr>
                                            <th>Item Description:</th>
                                            <th>Group:</th>
                                            <th>Unit Price:</th>
                                            <th>Qty Sold:</th>
                                            <th>Gross Sales:</th>
                                            <th>Tax Total:</th>
                                            <th>Net Sales:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($sales_data as $data) {
                                            echo "<tr>";
                                            echo "<td>{$data['description']}</td>";
                                            echo "<td>{$data['group_name']}</td>";
                                            echo "<td>{$data['unit_price']}</td>";
                                            echo "<td>{$data['qty_sold']}</td>";
                                            echo "<td>{$data['gross_sales']}</td>";
                                            echo "<td>{$data['tax_total']}</td>";
                                            echo "<td>{$data['net_sales']}</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                                echo "<p>No sales data available for the selected date.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>



            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> <b>out of</b> <b>25</b></div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#">Next</a></li>
                </ul>
            </div>

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
            $("#menu-icon").click(function() {
                $("#sidebar").toggleClass("active");
            });
        });

        $(document).ready(function() {
            showPreloader();

            // Set the timeout for 5 seconds (5000 milliseconds)
            setTimeout(function() {
                hidePreloader();
                showContent();
            }, 3000);
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

            // Define an array to hold the default numbers for each card
            const defaultNumbers = [
                "70,102", // Tax Total
                "102", // Net Sales
                "$23,100", // Number of Bills
                "+2542" // Placeholder
            ];

            // Initialize card titles with default numbers
            $(".card-title").each(function(index) {
                $(this).text(defaultNumbers[index]);
            });

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
        $("#logout").click(function() {
            $.ajax({
                type: "POST",
                url: "logout.php", // Update this with the correct path
                cache: false,
                beforeSend: function() {
                    // Code to show a loading spinner or message, if desired
                },
                success: function(response) {
                    // Handle the response from the server, if needed
                    // For a logout action, you may not need to do anything here
                    // The redirect should be handled on the server-side script
                },
                error: function() {
                    // Handle any AJAX request errors, if necessary
                    alert("An error occurred during logout. Please try again.");
                },
                complete: function() {
                    // Code to hide the loading spinner or message, if shown
                }
            });
            // Function to generate the table data based on the selected date
            function generateSalesSummary(date) {
                // Show "Loading..." on the table while fetching data
                $("#sales tbody").html('<tr><td colspan="7">Loading...</td></tr>');

                // Simulate an API call or asynchronous task to fetch the data for all 25 items
                setTimeout(function() {
                    // Replace the "Loading..." text with actual data
                    // You can populate this data based on the selected date
                    var salesData = [{
                            description: "Whole Chicken",
                            group: "Chicken",
                            unitPrice: "$10",
                            qtySold: 200,
                            grossSales: "$2,000",
                            taxTotal: "$200",
                            netSales: "$1,800"
                        },
                        {
                            description: "Chicken Wings",
                            group: "Chicken",
                            unitPrice: "$5",
                            qtySold: 150,
                            grossSales: "$750",
                            taxTotal: "$75",
                            netSales: "$675"
                        },
                        {
                            description: "Chicken Drumsticks",
                            group: "Chicken",
                            unitPrice: "$8",
                            qtySold: 100,
                            grossSales: "$800",
                            taxTotal: "$80",
                            netSales: "$720"
                        },
                        // Add more data here for other items
                    ];

                    // Clear the table body
                    $("#sales tbody").html('');

                    // Populate the table with the data for all 25 items
                    for (var i = 0; i < salesData.length; i++) {
                        var item = salesData[i];
                        var row = '<tr>' +
                            '<td>' + item.description + '</td>' +
                            '<td>' + item.group + '</td>' +
                            '<td>' + item.unitPrice + '</td>' +
                            '<td>' + item.qtySold + '</td>' +
                            '<td>' + item.grossSales + '</td>' +
                            '<td>' + item.taxTotal + '</td>' +
                            '<td>' + item.netSales + '</td>' +
                            '</tr>';
                        $("#sales tbody").append(row);
                    }
                }, 2000); // Simulate a 2-second delay for the API call
            }

            // Show loader when the page is loading
            $(document).ready(function() {
                $("#salesdate").datepicker({
                    // Your datepicker options here...
                });

                // Event listener to detect date selection
                $("#salesdate").on("change", function() {
                    var selectedDate = $(this).val();
                    generateSalesSummary(selectedDate);
                });
            });
            // Function to update the values when a date is picked
            function updateSalesData() {
                const selectedDate = document.getElementById('sales_date').value;
                // Make an AJAX request to fetch sales data for the selected date
                // Replace 'sales_data.php' with the correct PHP file that fetches data from the database
                const url = `sales_data.php?sales_date=${selectedDate}`;
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // Update the values in the HTML elements
                        document.getElementById('gross').innerHTML = `<small>$</small>${data.gross_sales}`;
                        document.getElementById('tax').innerHTML = `<small>$</small>${data.tax_total}`;
                        document.getElementById('net').innerHTML = `<small>$</small>${data.net_sales}`;
                        document.getElementById('bills').textContent = data.number_of_bills;
                    })
                    .catch(error => {
                        console.error('Error fetching sales data:', error);
                    });
            }

            // Event listener for the form submission
            document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission
                updateSalesData();
            });

            // Initial loading of data when the page loads
            document.addEventListener('DOMContentLoaded', updateSalesData);
        });
    </script>
</body>

</html>