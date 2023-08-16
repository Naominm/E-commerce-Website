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
                // Return the updated employee data
                header('Content-Type: application/json');
                echo json_encode(array('success' => true, 'employee' => $employee));
            } else {
                // Return an error response
                header('Content-Type: application/json');
                echo json_encode(array('success' => false, 'message' => 'Employee not found after update'));
            }
            $selectStmt->close();
        } else {
            // Return an error response
            header('Content-Type: application/json');
            echo json_encode(array('success' => false, 'message' => 'Failed to update employee'));
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
