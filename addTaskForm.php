<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>

<body>
    <header>
        <h1>Task Manager</h1>
    </header>
    <nav>
        <a href="#logout">Logout</a>
    </nav>
    <main>
        <h2>Add a Task</h2>
        <form id="addTaskForm" action="addTask.php" method="POST">
            <label for="title">Title: </label>
            <input type="text" id="title" name="title" required>
            <label for="description">Description: </label>
            <input type="textarea" id="description" name="description">
            <button type="submit">Add</button>
        </form>
    </main>
</body>

</html>