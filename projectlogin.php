<?php
session_start(); // Start session at the top of the file

$conn = new mysqli("localhost", "root", "newpassword", "task_manager");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Fetch id and hashed password of the user
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($userId, $hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        // Store user id in the sessio
        $_SESSION['user_id'] = $userId;

        // Redirect to viewTasks.php
        header("Location: viewTasks.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
