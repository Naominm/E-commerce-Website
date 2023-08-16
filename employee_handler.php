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
    // Return an error response
    header('Content-Type: application/json');
    echo json_encode(array('success' => false, 'message' => 'Database connection failed'));
    exit();
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            // Return the inserted employee data
            header('Content-Type: application/json');
            echo json_encode(array('success' => true, 'employee' => $employee));
        } else {
            // Return an error response
            header('Content-Type: application/json');
            echo json_encode(array('success' => false, 'message' => 'Employee not found after insert'));
        }
        $selectStmt->close();
    } else {
        // Return an error response
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Failed to add employee'));
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
