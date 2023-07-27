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