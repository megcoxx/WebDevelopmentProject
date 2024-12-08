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

$stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id = ? ORDER BY FIELD(priority, 'high','medium', 'low')");
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
echo '<style>
    .task-container {
        display: flex;
        justify-content: space-between; /* Push elements to their respective ends */
        align-items: center; /* Vertically align items */
        margin-bottom: 20px; /* Add spacing between tasks */
        width: 250%; /* Matches the extended line width */
        position: relative;
    }
    .task-info {
        flex: 1; /* Allow the title and description to take up remaining space */
        padding-right: 20px; /* Add space between task info and checkbox */
    }
    .task-checkbox {
        display: flex;
        align-items: center; /* Vertically align the checkbox */
        margin-right: 20px; /* Space between checkbox and trash button */
    }
    .task-checkbox input[type="checkbox"] {
        transform: scale(1.5); /* Make the checkbox larger for better visibility */
    }
    .trash-button {
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-size: 1.5em;
        color: red;
    }
    .trash-button:hover {
        color: darkred;
    }
    .extended-line {
        border: 1px solid #ccc;
        width: 250%; /* Extend the line to 250% width */
        margin: 20px 0;
        position: relative;
         /* Center the line relative to the container */
    }
</style>';

while ($row = $result->fetch_assoc()) {
    echo '<div class="task-container">';

    // Task information
    echo '<div class="task-info">';
    if ($row['priority'] == 'low') {
        echo '<h1 style="color: #007bff;">' . htmlspecialchars($row['title']) . "</h1>";
    }
    if ($row['priority'] == 'medium') {
        echo '<h1 style="color: #ffdab9;">' . htmlspecialchars($row['title']) . "</h1>";
    }
    if ($row['priority'] == 'high') {
        echo '<h1 style="color: #ff0000;">' . htmlspecialchars($row['title']) . "</h1>";
    }

    if ($row['description'] != null) {
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
    }
    echo '</div>';

    // Checkbox
    echo '<div class="task-checkbox">';
    echo '<form method="post" action="updateTaskIsDone.php" id="form_' . $row['id'] . '">';
    echo '<input type="checkbox" name="is_done" value="1" ' . ($row['is_done'] ? 'checked' : '') . ' 
          onchange="document.getElementById(\'form_' . $row['id'] . '\').submit();">';
    echo '</form>';
    echo '</div>';

    // Trash button
    echo '<form method="post" action="deleteTask.php" style="margin: 0;">';
    echo '<input type="hidden" name="task_id" value="' . $row['id'] . '">';
    echo '<button type="submit" class="trash-button">
            <i class="fas fa-trash"></i>
          </button>';
    echo '</form>';

    echo '</div>';
    echo '<hr class="extended-line">';
}

$stmt->close();
$conn->close();
