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
        <button onclick="window.location.href = 'addTaskForm.php'">Add Tasks</button>
        <?php include 'getTasks.php'; ?>
    </main>
</body>
</html>
