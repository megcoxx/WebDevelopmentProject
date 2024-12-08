<?php

session_start();
$conn = new mysqli("localhost", "root", "newpassword", "task_manager");

$title = $_POST["title"];
$description = $_POST["description"];
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO tasks (user_id, title, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user_id, $title, $description);

    if ($stmt->execute()) {
        header("Location: viewTasks.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

?>