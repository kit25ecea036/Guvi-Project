<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guvi";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("SELECT * FROM registration WHERE email = ?");
$stmt->bind_param("s", $email);
$email = $_POST['email'];
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if (password_verify($_POST['password'], $user['password'])) {
        echo json_encode(array('success' => true, 'message' => 'Login successful!'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Invalid email or password!'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid email or password!'));
}

$stmt->close();
$conn->close();
?>