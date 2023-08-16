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

$response = array();

if (isset($_POST['admin_id'], $_POST['username'], $_POST['password'])) {
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

            $response['success'] = true;
            $response['redirect'] = "admin_dashboard.php";
        } else {
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = true;

            $response['success'] = true;
            $response['redirect'] = "html.php";
        }
    } else {
        $response['success'] = false;
        $response['redirect'] = "error.php";
    }

    echo json_encode($response);
    exit();
}
?>
