<?php
session_start();
if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $var) {
            var_dump($var); // Or print_r($var) for a cleaner output
        }
        die(); // Stop script execution
    }
}




// Check if the user is logged in (assuming `user_id` is stored in the session)
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to view tasks.");
}

// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

$conn = new mysqli("localhost", "root", "newpassword", "task_manager");

$stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo '<form method="post" action="updateTaskIsDone.php" id="form_' . $row['id'] . '">';
    echo "<h1>" . htmlspecialchars($row['title']) . "</h1>";
    if ($row['description'] != null) {
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
    }
    echo '<label>';
    echo '<input type="checkbox" name="is_done" value="1" ' . ($row['is_done'] ? 'checked' : '') . ' 
          onchange="document.getElementById(\'form_' . $row['id'] . '\').submit();">';
    echo ' Mark as Done';
    echo '</label>';
    // Add a hidden input to identify the task being updated
    echo '<input type="hidden" name="task_id" value="' . $row['id'] . '">';
    echo '</form>';
}

$stmt->close();
$conn->close();
