<?php
// Connect to your database
$mysqli = new mysqli("localhost", "root", "newpassword", "task_manager");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = intval($_POST['task_id']); // Get the task ID from the hidden input
    $is_done = isset($_POST['is_done']) ? 1 : 0; // Check if the checkbox was checked

    // Update the database
    $stmt = $mysqli->prepare("UPDATE tasks SET is_done = ? WHERE id = ?");
    $stmt->bind_param("ii", $is_done, $task_id);

    if ($stmt->execute()) {
        header("Location: viewTasks.php");
        exit();
    } else {
        echo "Error updating task: " . $mysqli->error;
    }

    $stmt->close();
}

exit;
?>