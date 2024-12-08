<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to delete tasks.");
}

// Get the task ID from the POST request
if (isset($_POST['task_id'])) {
    $task_id = intval($_POST['task_id']);
    $user_id = $_SESSION['user_id']; // Ensure the logged-in user owns the task

    $conn = new mysqli("localhost", "root", "newpassword", "task_manager");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the task owned by the logged-in user
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $task_id, $user_id);

    if ($stmt->execute()) {
        header("Location: viewTasks.php"); // Redirect back to the main page
        exit;
    } else {
        echo "Error deleting task: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No task ID provided.";
}
?>