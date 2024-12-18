<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'assignment');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            if ($user['role'] == 'admin') {
                header('Location: admin_dashboard.php');
            } else {
                header('Location: user_dashboard.php');
            }
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}
?>
