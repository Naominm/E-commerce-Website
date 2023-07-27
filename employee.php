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
    // Assuming you are adding an employee to a manually created table named "employees"
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
        $selectStmt->bind_param("s", $employeeId);
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

// Close the connection
$conn->close();
?>
