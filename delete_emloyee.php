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
    if (isset($_POST['employeeId'])) {
        $employeeId = $_POST['employeeId'];

        // Prepare the DELETE statement using a prepared statement
        $stmt = $conn->prepare("DELETE FROM employees WHERE id = ?");
        $stmt->bind_param("i", $employeeId);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Return success response
            header('Content-Type: application/json');
            echo json_encode(array('success' => true));
        } else {
            // Return an error response
            header('Content-Type: application/json');
            echo json_encode(array('success' => false));
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();

?>
