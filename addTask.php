<?php

session_start();
$conn = new mysqli("localhost", "root", "newpassword", "task_manager");

$title = $_POST["title"];
$description = $_POST["description"];
$user_id = $_SESSION['user_id'];
$priority = $_POST["priority"];

$stmt = $conn->prepare("INSERT INTO tasks (user_id, title, description, priority) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $user_id, $title, $description, $priority);

    if ($stmt->execute()) {
        header("Location: viewTasks.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

?>